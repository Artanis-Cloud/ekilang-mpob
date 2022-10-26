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
        <div class="card">
            <div class="row" style="padding: 10px">
                <div class="col-1 align-self-center">
                    <a href="javascript:history.back()"  class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                </div>
            </div>
            <!-- row -->
            <div class="card-body">
                <div class="pl-3">

                    <div class=" text-center">
                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h3>
                        <h5 style="color: rgb(39, 80, 71); "><i> Nota : Sila kemaskini jika ada perubahan
                            </i>
                        </h5>
                    </div>
                    <hr>
                    <form action="{{ route('admin.update.maklumat.asas.pelesen', [$pelesen->e_id] ) }}" method="post"  onsubmit="return check()" novalidate>
                        @csrf
                        <div class="container center" style="margin-left: 14%">
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label  align-items-center">
                                    Jenis Kilang </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" name="e_kat" id="e_kat"
                                        disabled>

                                            <option {{ ($reg_pelesen->e_kat == 'PL91') ? 'selected' : '' }} value="PL91">Kilang Buah</option>
                                            <option {{ ($reg_pelesen->e_kat == 'PL101') ? 'selected' : '' }} value="PL101">Kilang Penapis</option>
                                            <option {{ ($reg_pelesen->e_kat == 'PL102') ? 'selected' : '' }} value="PL102">Kilang Isirung</option>
                                            <option {{ ($reg_pelesen->e_kat == 'PL104') ? 'selected' : '' }} value="PL104">Kilang Oleokimia</option>
                                            <option {{ ($reg_pelesen->e_kat == 'PL111') ? 'selected' : '' }} value="PL111">Pusat Simpanan</option>
                                            <option {{ ($reg_pelesen->e_kat == 'PLBIO') ? 'selected' : '' }} value="PLBIO">Kilang Biodiesel</option>
                                        </select>
                                    </fieldset>

                                </div>
                            </div>
                            <div class="row" style="margin-top: -7px">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Status e-Kilang </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" name="e_status" id="e_status"  required>

                                            <option {{ ($reg_pelesen->e_status == '1') ? 'selected' : '' }} value="1">Aktif</option>
                                            <option {{ ($reg_pelesen->e_status == '2') ? 'selected' : '' }} value="2">Tidak Aktif</option>
                                        </select>
                                    </fieldset>

                                </div>
                            </div>
                            <div class="row"  style="margin-top: -7px">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Status e-Mingguan </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" name="e_stock" id="e_stock" required>
                                            <option {{ ($reg_pelesen->e_stock == '1') ? 'selected' : '' }} value="1">Aktif</option>
                                            <option {{ ($reg_pelesen->e_stock == '2') ? 'selected' : '' }} value="2">Tidak Aktif</option>
                                        </select>
                                    </fieldset>

                                </div>
                            </div>
                            <div class="row" style="margin-top: -7px">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Status Direktori </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" name="directory" id="directory" required>
                                            <option {{ ($reg_pelesen->directory == 'Y') ? 'selected' : '' }} value="Y">Ya</option>
                                            <option {{ ($reg_pelesen->directory == 'N') ? 'selected' : '' }}value="N">Tidak</option>
                                        </select>
                                    </fieldset>

                                </div>
                            </div>
                            @if ($reg_pelesen->e_kat != 'PLBIO')

                                <div class="row" style="margin-top: -7px">
                                    <label for="fname"
                                        class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                        Kod Negeri </label>
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <select class="form-control" name="kodpgw" id="kodpgw" required>
                                                @if ($reg_pelesen->e_kat == 'PL101')
                                                    <option {{ ($pelesen->kodpgw == 'FA' or $pelesen->kodpgw == 'DD' ) ? 'selected' : '' }} value="FA">FA</option>
                                                    <option {{ ($pelesen->kodpgw == 'FB' or $pelesen->kodpgw == 'DD' ) ? 'selected' : '' }} value="FB">FB</option>
                                                    <option {{ ($pelesen->kodpgw == 'FC' or $pelesen->kodpgw == 'DD' ) ? 'selected' : '' }} value="FC">FC</option>
                                                    <option {{ ($pelesen->kodpgw == 'FD' or $pelesen->kodpgw == 'DD' ) ? 'selected' : '' }} value="FD">FD</option>
                                                    <option {{ ($pelesen->kodpgw == 'FJ') ? 'selected' : '' }} value="FJ">FJ</option>
                                                    <option {{ ($pelesen->kodpgw == 'FP') ? 'selected' : '' }} value="FP">FP</option>
                                                    <option {{ ($pelesen->kodpgw == 'FQ') ? 'selected' : '' }} value="FQ">FQ</option>
                                                    <option {{ ($pelesen->kodpgw == 'FS') ? 'selected' : '' }} value="FS">FS</option>

                                                @elseif ($reg_pelesen->e_kat == 'PL104')
                                                    <option {{ ($pelesen->kodpgw == 'CA') ? 'selected' : '' }} value="CA">CA</option>
                                                    <option {{ ($pelesen->kodpgw == 'CC') ? 'selected' : '' }} value="CC">CC</option>
                                                    <option {{ ($pelesen->kodpgw == 'CJ') ? 'selected' : '' }} value="CJ">CJ</option>
                                                    <option {{ ($pelesen->kodpgw == 'CP') ? 'selected' : '' }} value="CP">CP</option>
                                                    <option {{ ($pelesen->kodpgw == 'CS') ? 'selected' : '' }} value="CS">CS</option>

                                                @elseif ($reg_pelesen->e_kat == 'PL111')
                                                    <option {{ ($pelesen->kodpgw == 'BB') ? 'selected' : '' }} value="BB">BB</option>
                                                    <option {{ ($pelesen->kodpgw == 'BC') ? 'selected' : '' }} value="BC">BC</option>
                                                    <option {{ ($pelesen->kodpgw == 'BJ') ? 'selected' : '' }} value="BJ">BJ</option>
                                                    <option {{ ($pelesen->kodpgw == 'BP') ? 'selected' : '' }} value="BP">BP</option>
                                                    <option {{ ($pelesen->kodpgw == 'BQ') ? 'selected' : '' }} value="BQ">BQ</option>
                                                    <option {{ ($pelesen->kodpgw == 'BS') ? 'selected' : '' }} value="BS">BS</option>

                                                @elseif ($reg_pelesen->e_kat == 'PL102')
                                                    <option {{ ($pelesen->kodpgw == 'JJ') ? 'selected' : '' }} value="JJ">JJ</option>
                                                    <option {{ ($pelesen->kodpgw == 'NS') ? 'selected' : '' }} value="NS">NS</option>
                                                    <option {{ ($pelesen->kodpgw == 'PH') ? 'selected' : '' }} value="PH">PH</option>
                                                    <option {{ ($pelesen->kodpgw == 'PK') ? 'selected' : '' }} value="PK">PK</option>
                                                    <option {{ ($pelesen->kodpgw == 'PP') ? 'selected' : '' }} value="PP">BQ</option>
                                                    <option {{ ($pelesen->kodpgw == 'SA') ? 'selected' : '' }} value="SA">SA</option>
                                                    <option {{ ($pelesen->kodpgw == 'SS') ? 'selected' : '' }} value="SS">SS</option>
                                                    <option {{ ($pelesen->kodpgw == 'SW') ? 'selected' : '' }} value="SW">SW</option>
                                                    <option {{ ($pelesen->kodpgw == 'WP') ? 'selected' : '' }} value="WP">WP</option>

                                                @else
                                                    <option {{ ($pelesen->kodpgw == 'JJ') ? 'selected' : '' }} value="JJ">JJ</option>
                                                    <option {{ ($pelesen->kodpgw == 'KB') ? 'selected' : '' }} value="KB">KB</option>
                                                    <option {{ ($pelesen->kodpgw == 'KK') ? 'selected' : '' }} value="KK">KK</option>
                                                    <option {{ ($pelesen->kodpgw == 'MM') ? 'selected' : '' }} value="MM">MM</option>
                                                    <option {{ ($pelesen->kodpgw == 'NS') ? 'selected' : '' }} value="NS">NS</option>
                                                    <option {{ ($pelesen->kodpgw == 'PH') ? 'selected' : '' }} value="PH">PH</option>
                                                    <option {{ ($pelesen->kodpgw == 'PK') ? 'selected' : '' }} value="PK">PK</option>
                                                    <option {{ ($pelesen->kodpgw == 'PP') ? 'selected' : '' }} value="PP">PP</option>
                                                    <option {{ ($pelesen->kodpgw == 'SA') ? 'selected' : '' }} value="SA">SA</option>
                                                    <option {{ ($pelesen->kodpgw == 'SS') ? 'selected' : '' }} value="SS">SS</option>
                                                    <option {{ ($pelesen->kodpgw == 'WP') ? 'selected' : '' }} value="WP">WP</option>

                                                @endif

                                            </select>
                                        </fieldset>

                                    </div>
                                </div>
                                <div class="row" style="margin-top: -7px">
                                    <label for="fname"
                                        class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                        Nombor Siri </label>
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <input type="text" id="nosiri" class="form-control" required
                                            placeholder="Nombor Siri" name="nosiri" maxlength="4" minlength="4"
                                            value="{{ $pelesen->nosiri ?? '' }}">
                                        </fieldset>

                                    </div>
                                </div>

                            @endif

                            <div class="row" style="margin-top: -7px">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Nombor Lesen </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                            <input type="text" id="e_nl" readonly class="form-control" required minlength="12" maxlength="12"
                                                placeholder="Nombor Lesen" name="e_nl" value="{{ $pelesen->e_nl ?? '-' }}">

                                    </fieldset>

                                </div>
                            </div>
                            <div class="row" style="margin-top: -7px">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Nama Premis </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <input type="text" id="e_np" class="form-control" required maxlength="60"
                                        placeholder="Nama Premis" name="e_np" value="{{ $pelesen->e_np ?? '-' }}">
                                    </fieldset>

                                </div>
                            </div>
                            <div class="row" style="margin-bottom:2.5%; ">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label required col-form-label align-items-center">
                                    Alamat Premis Berlesen</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_ap1" class="form-control" maxlength="60"
                                        placeholder="Alamat Premis Berlesen 1" name="e_ap1"
                                        value="{{ $pelesen->e_ap1 }}" required>
                                    @error('e_ap1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6" style="margin-left: 25%; ">
                                    <input type="text" id="e_ap2" class="form-control" maxlength="60"
                                        placeholder="Alamat Premis Berlesen 2" name="e_ap2"
                                        value="{{ $pelesen->e_ap2 }}">
                                        @error('e_ap2')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6" style="margin-left: 25%;">
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

                            <div class="row" style="margin-bottom:2.5%">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Alamat Surat Menyurat</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_as1" class="form-control" required maxlength="60"
                                        placeholder="Alamat Surat Menyurat 1" name="e_as1"
                                        value="{{ $pelesen->e_as1 }}">
                                    @error('e_as1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6" style="margin-left: 25%">
                                    <input type="text" id="e_as2" class="form-control" maxlength="60"
                                        placeholder="Alamat Surat Menyurat 2" name="e_as2"
                                        value="{{ $pelesen->e_as2 }}">
                                        @error('e_as2')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6" style="margin-left: 25%">
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

                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    No. Telefon (Pejabat / Kilang)</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_notel" class="form-control" maxlength="40"
                                        placeholder="No. Telefon Pejabat / Kilang" name="e_notel"
                                        value="{{ $pelesen->e_notel }}" required
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
                                    class="text-left col-sm-3 control-label col-form-label align-items-center">
                                    No. Faks</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_nofax" class="form-control" maxlength="40"
                                        placeholder="No. Faks" name="e_nofax"
                                        value="{{ $pelesen->e_nofax }}" >
                                    @error('e_nofax')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Alamat Emel Kilang</label>
                                <div class="col-md-6">
                                    <input type="email" id="e_email" class="form-control"
                                        placeholder="Alamat Emel" name="e_email" required maxlength="40"
                                        value="{{ $pelesen->e_email }}" oninput="valid_email()">

                                        <p type="hidden" id="err_email" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i></p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Nama Pegawai Melapor</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_npg" class="form-control" required maxlength="60"
                                        placeholder="Nama Pegawai Melapor" name="e_npg"
                                        value="{{ $pelesen->e_npg }}" oninput="valid_npg()">

                                        <p type="hidden" id="err_npg" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i></p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Jawatan Pegawai Melapor</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_jpg" class="form-control" required maxlength="60"
                                        placeholder="Jawatan Pegawai Melapor" name="e_jpg"
                                        value="{{ $pelesen->e_jpg }}" oninput="valid_jpg()">

                                        <p type="hidden" id="err_jpg" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i></p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    No. Telefon Pegawai Melapor</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_notel_pg" class="form-control"
                                        placeholder="No. Telefon Pegawai Melapor"
                                        name="e_notel_pg" required maxlength="40"
                                        onkeypress="return isNumberKey(event)"  value="{{ $pelesen->e_notel_pg }}"
                                        oninput="valid_notel_pg()">

                                        <p type="hidden" id="err_notel_pg" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i></p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Alamat Emel Pegawai Melapor</label>
                                <div class="col-md-6">
                                    <input type="email" id="e_email_pg" class="form-control"
                                        placeholder="Alamat Emel Pegawai Melapor" required maxlength="40"
                                        name="e_email_pg" value="{{ $pelesen->e_email_pg }}" oninput="valid_email_pg()">

                                        <p type="hidden" id="err_email_pg" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i></p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Nama Pegawai Bertanggungjawab</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_npgtg" class="form-control" required maxlength="60"
                                        placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                        value="{{ $pelesen->e_npgtg }}" oninput="valid_npgtg()" >

                                        <p type="hidden" id="err_npgtg" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i></p>
                                </div>
                                {{-- </div> --}}
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Jawatan Pegawai
                                    Bertanggungjawab</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_jpgtg" class="form-control" required maxlength="60"
                                        placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
                                        value="{{ $pelesen->e_jpgtg }}" oninput="valid_jpgtg()">

                                        <p type="hidden" id="err_jpgtg" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i></p>

                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Alamat Emel Pengurus</label>
                                <div class="col-md-6">
                                    <input type="email" id="e_email_pengurus" class="form-control" required maxlength="40"
                                        placeholder="Alamat Emel Pengurus" name="e_email_pengurus"
                                        value="{{ $pelesen->e_email_pengurus }}" oninput="valid_email_pengurus()">

                                        <p type="hidden" id="err_email_pengurus" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i></p>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Negeri </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="negeri_id" name='e_negeri' required
                                            onchange="ajax_daerah(this);ajax_kawasan(this)">
                                            @if($pelesen->negeri)
                                                @foreach ($negeri as $data)
                                                <option value="{{ $data->kod_negeri }}" {{ $pelesen->negeri->kod_negeri == $data->kod_negeri ? 'selected': '' }}>
                                                    {{ $data->nama_negeri }}
                                                </option>
                                                @endforeach
                                            @else
                                                @foreach ($negeri as $data)
                                                <option selected hidden disabled> Sila Pilih Negeri</option>
                                                <option value="{{ $data->kod_negeri }}">
                                                    {{ $data->nama_negeri }}
                                                </option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </fieldset>

                                </div>
                            </div>
                            <div class="row"  style="margin-top: -7px">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Daerah </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="daerah_id" name='e_daerah' required
                                            placeholder="Daerah">
                                            @if($pelesen->negeri)
                                                @foreach ($pelesen->negeri->daerahs as $daerah)
                                                    <option value="{{$daerah->kod_daerah }}" {{ $daerah->kod_daerah == $pelesen->e_daerah ? 'selected' : ''}}>
                                                        {{  $daerah->nama_daerah ?? 'Sila Pilih Negeri Terlebih Dahulu'}}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option selected hidden disabled> Sila Pilih Daerah</option>

                                            @endif

                                                        {{-- <option selected hidden disabled value="">POMA</option>
                                            <option {{ $pelesen->e_daerah == 'Ya' ? 'selected' : '' }} value="Ya">
                                                Ya</option>
                                            <option {{ $pelesen->e_poma == 'Tidak' ? 'selected' : '' }} value="Tidak">
                                                Tidak</option> --}}
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row" style="margin-top: -7px">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Kawasan </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="kawasan_id" name='e_kawasan' required>
                                            @if($pelesen->negeri)
                                                <option value="{{ $pelesen->negeri->kod_region }}" selected hidden disabled>
                                                    {{  $pelesen->negeri->nama_region ?? 'Sila Pilih Daerah Terlebih Dahulu'}}</option>
                                            @else
                                                <option selected hidden disabled> Sila Pilih Kawasan</option>

                                            @endif
                                        </select>
                                    </fieldset>

                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Syarikat Induk</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_syktinduk" class="form-control" required maxlength="60"
                                        placeholder="Syarikat Induk" name="e_syktinduk"
                                        value="{{ $pelesen->e_syktinduk}}" oninput="valid_syktinduk()">

                                        <p type="hidden" id="err_syktinduk" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i></p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Tahun Mula Beroperasi</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_year" class="form-control" required onkeypress="return isNumberKey(event)"
                                    placeholder="Tahun Mula Beroperasi" name="e_year" maxlength="4" minlength="4"
                                    value="{{ $pelesen->e_year ?? '' }}" oninput="valid_year()">

                                    <p type="hidden" id="err_year" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i></p>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Kumpulan </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="e_group" name="e_group" required oninput="valid_group()">
                                            <option selected value="">Sila Pilih Kumpulan</option>

                                            <option {{ $pelesen->e_group == 'GOV' ? 'selected' : '' }} value="GOV">
                                                Kerajaan</option>
                                            <option {{ $pelesen->e_group == 'IND' ? 'selected' : '' }} value="IND">
                                                Swasta</option>
                                        </select>

                                        <p type="hidden" id="err_group" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i></p>

                                    </fieldset>

                                </div>
                            </div>
                            @if ($reg_pelesen->e_kat == 'PL91')

                                <div class="row mb-2" style="margin-top: -7px">

                                    <label for="fname"
                                        class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                        POMA </label>
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <select class="form-control" id="e_poma" name="e_poma" required>
                                                <option {{ $pelesen->e_poma == 'Ya' ? 'selected' : '' }} value="Ya">
                                                    Ya</option>
                                                <option {{ $pelesen->e_poma == 'Tidak' ? 'selected' : '' }} value="Tidak">
                                                    Tidak</option>
                                            </select>
                                        </fieldset>

                                    </div>

                                </div>

                            @endif
                            <div class="row mb-2">
                                <label for="fname"
                                    class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                    Kapasiti Pemprosesan / Tahun</label>
                                <div class="col-md-6">
                                    <input type="text" id="kap_proses" class="form-control" required maxlength="10"
                                        placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses"
                                        onkeypress="return isNumberKey(event)"
                                        value="{{ $pelesen->kap_proses  }}" oninput="valid_proses()">

                                        <p type="hidden" id="err_proses" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i></p>
                                </div>
                            </div>

                            <div class="col-12">
                            @if ($reg_pelesen->e_kat == 'PL91')

                                <div class="row mt-3 " style="text-align: center; font-size: 12px">
                                    <div class="col-md-3">
                                        <span ></span>
                                    </div>


                                    <div class="col-md-1">
                                        <span>CPO</span>
                                    </div>

                                </div>
                                <div class="row mt-3 text-right">
                                    {{-- <div class="col-md-3"> --}}
                                        <label for="fname"
                                        class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                        Bilangan Tangki</label>
                                        {{-- <span class="required">Bilangan Tangki</span> --}}
                                    {{-- </div> --}}
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_cpo'
                                            style="width:100%" id="bil_tangki_cpo" required oninput=" ableInput(); valid_cpo(); FormatCurrency(this); "
                                            title="Sila isikan butiran ini."
                                            onkeypress="return isNumberKey(event)"  value="{{ $pelesen->bil_tangki_cpo }}">

                                            <p type="hidden" id="err_bcpo" style="color: red; display:none"><i>Sila isi
                                                    butiran di bahagian ini!</i></p>
                                    </div>

                                </div>
                                <div class="row mt-3 text-right">
                                    {{-- <div class="col-md-3"> --}}
                                        <label for="fname"
                                        class="text-left col-sm-3 control-label col-form-label required align-items-center">
                                        Kapasiti Tangki Simpanan (Tan)</label>
                                        {{-- <span class="required">Kapasiti Tangki Simpanan (Tan)</span> --}}
                                    {{-- </div> --}}
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_cpo'
                                            style="width:100%" id="kap_tangki_cpo" required  oninput=" valid_cpo(); FormatCurrency(this) "
                                            title="Sila isikan butiran ini."
                                            onkeypress="return isNumberKey(event)" value="{{ $pelesen->kap_tangki_cpo }}">

                                            <p type="hidden" id="err_kcpo" style="color: red; display:none"><i>Sila isi
                                            butiran di bahagian ini!</i></p>
                                    </div>
                                    <br><br>

                                </div>
                                <div class="row col-10">
                                    <i>Nota: Sekiranya kilang/pelesen tiada tangki simpanan
                                        khusus untuk sesuatu produk. Sila campurkan kesemua
                                        bilangan dan kapasiti tangki dan lapor dalam kategori Others
                                    </i>
                                </div>


                            @elseif ($reg_pelesen->e_kat == 'PL101')<br>

                                <div class="row mt-2" style=" font-size: 12px">
                                    <div class="col-md-2" style="margin-left: 1.5%">
                                        <span></span>
                                    </div>
                                    <div class="col-md-1">
                                        <span></span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>CPO</span>
                                    </div>

                                    <div class="col-md-1">
                                        <span>PPO</span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>CPKO</span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>PPKO</span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>OTHERS</span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>JUMLAH</span>
                                    </div>
                                </div>
                                <div class="row mt-2 mb-4">
                                    <label for="fname"
                                        class="text-right control-label col-form-label required align-items-center">
                                        Bilangan Tangki</label>
                                        <div class="col-md-1 " style="margin-left:6%">
                                            {{-- <span></span> --}}
                                        </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_cpo' style="width:100%" oninput="setCustomValidity('')"
                                            size="15" id="bil_tangki_cpo" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_cpo  }}"
                                            onchange="validation_jumlah()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_ppo' style="width:100%" oninput="setCustomValidity('')"
                                            size="15" id="bil_tangki_ppo" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_ppo  }}"
                                            onchange="validation_jumlah()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_cpko' style="width:100%" oninput="setCustomValidity('')"
                                            size="15" id="bil_tangki_cpko" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_cpko  }}"
                                            onchange="validation_jumlah()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_ppko' style="width:100%" oninput="setCustomValidity('')"
                                            size="15" id="bil_tangki_ppko" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_ppko   }}"
                                            onchange="validation_jumlah()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_others' style="width:100%" oninput="setCustomValidity('')"
                                            size="15" id="bil_tangki_others" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_others  }}"
                                            onchange="validation_jumlah()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>



                                    <div class="col-md-1 text-center">
                                        <b><span id="bil_tangki_jumlah">
                                                {{ old('bil_tangki_jumlah') ?? number_format($jumlah, 2) }}
                                            </span>
                                        </b>
                                    </div>

                                </div>

                                <div class="row mt-2 mb-4">
                                    <label for="fname"
                                        class="text-right control-label col-form-label required align-items-center">
                                        Kapasiti Tangki Simpanan (Tan)</label>
                                        <div style="margin-left:5%">
                                            {{-- <span></span> --}}
                                        </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_cpo' style="width:100%" oninput="setCustomValidity('')"
                                            id="kap_tangki_cpo" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_cpo }}"
                                            onchange="validation_jumlah2()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>


                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_ppo' style="width:100%" oninput="setCustomValidity('')"
                                            id="kap_tangki_ppo" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_ppo  }}"
                                            onchange="validation_jumlah2()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_cpko' style="width:100%" oninput="setCustomValidity('')"
                                            id="kap_tangki_cpko" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_cpko  }}"
                                            onchange="validation_jumlah2()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_ppko' style="width:100%" oninput="setCustomValidity('')"
                                            id="kap_tangki_ppko" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_ppko  }}"
                                            onchange="validation_jumlah2()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_others' style="width:100%" oninput="setCustomValidity('')"
                                            id="kap_tangki_others" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_others  }}"
                                            onchange="validation_jumlah2()" required>
                                    </div>
                                    <div class="col-md-1 text-center">
                                            <b><span id="kap_tangki_jumlah">
                                                    {{ old('kap_tangki_jumlah') ?? number_format($jumlah2, 2) }}
                                                </span>
                                            </b>
                                            {{-- <input type="text" name='bil_tangki_jumlah' style="width:100%" size="15" value="{{ $jumlah }}"
                                            id="bil_tangki_jumlah"> --}}

                                    </div>
                                    <br><br>
                                    <div class="row col-10 ">
                                        <i >Nota: Sekiranya kilang/pelesen tiada
                                            tangki simpanan khusus untuk sesuatu produk. Sila campurkan kesemua
                                            bilangan dan kapasiti tangki dan lapor dalam kategori Others
                                        </i>
                                    </div>

                                </div>
                            @elseif ($reg_pelesen->e_kat == 'PL102')

                                <div class="row mt-3 " style="text-align: center; font-size: 12px">
                                    <div class="col-md-3" >
                                        <span></span>
                                    </div>


                                    <div class="col-md-1">
                                        <span>CPO</span>
                                    </div>

                                </div>
                                <div class="row mt-3 text-right">
                                    {{-- <div class="col-md-5"> --}}
                                        <label for="fname"
                                        class="text-right control-label col-form-label required align-items-center">
                                        Bilangan Tangki</label>
                                        {{-- <span class="required">Bilangan Tangki</span> --}}
                                    {{-- </div> --}}
                                    <div class="col-md-1" style="margin-left: 6%">
                                        <span></span>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_cpo'
                                            style="width:100%" id="bil_tangki_cpo" required
                                            title="Sila isikan butiran ini."
                                            onkeypress="return isNumberKey(event)"  value="{{ $pelesen->bil_tangki_cpo }}">
                                        {{-- @error('alamat_kilang_1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror --}}
                                    </div>


                                </div>
                                <div class="row mt-3 text-right">
                                    {{-- <div class="col-md-5"> --}}
                                        <label for="fname"
                                        class="text-right control-label col-form-label required align-items-center">
                                        Kapasiti Tangki Simpanan (Tan)</label>
                                        {{-- <span class="required">Kapasiti Tangki Simpanan (Tan)</span> --}}
                                    {{-- </div> --}}
                                    <div  style="margin-left: 5%">
                                        <span></span>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_cpo'
                                            style="width:100%" id="kap_tangki_cpo" required
                                            title="Sila isikan butiran ini."
                                            onkeypress="return isNumberKey(event)" value="{{ $pelesen->kap_tangki_cpo }}">
                                        {{-- @error('alamat_kilang_1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror --}}
                                    </div><br><br>


                                </div>
                                <div class="row mx-3" style="margin-left:14%">
                                    <i>Nota: Sekiranya kilang/pelesen tiada tangki simpanan
                                        khusus untuk sesuatu produk. Sila campurkan kesemua
                                        bilangan dan kapasiti tangki dan lapor dalam kategori Others
                                    </i>
                                </div>

                            @elseif ($reg_pelesen->e_kat == 'PL111' || $reg_pelesen->e_kat == 'PL104' || $reg_pelesen->e_kat == 'PLBIO')<br>

                                <div class="row mt-2" style="text-align: center; font-size: 12px">
                                    <div class="col-md-2" style="margin-left: -1.2%">
                                        <span></span>
                                    </div>
                                    <div class="col-md-1">
                                        <span></span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>CPO</span>
                                    </div>

                                    <div class="col-md-1">
                                        <span>PPO</span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>CPKO</span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>PPKO</span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>OLEO</span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>OTHERS</span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>JUMLAH</span>
                                    </div>
                                </div>
                                <div class="row mt-2 mb-4">
                                    <label for="fname"
                                        class="text-right  control-label col-form-label required align-items-center">
                                        Bilangan Tangki</label>
                                        <div class="col-md-1 " style="margin-left:5%">
                                            {{-- <span></span> --}}
                                        </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_cpo' style="width:100%" oninput="setCustomValidity('')"
                                            size="15" id="bil_tangki_cpo" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_cpo  }}"
                                            onchange="validation_jumlah3()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>

                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_ppo' style="width:100%" oninput="setCustomValidity('')"
                                            size="15" id="bil_tangki_ppo" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_ppo  }}"
                                            onchange="validation_jumlah3()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_cpko' style="width:100%" oninput="setCustomValidity('')"
                                            size="15" id="bil_tangki_cpko" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_cpko  }}"
                                            onchange="validation_jumlah3()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_ppko' style="width:100%" oninput="setCustomValidity('')"
                                            size="15" id="bil_tangki_ppko" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_ppko   }}"
                                            onchange="validation_jumlah3()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_oleo' style="width:100%" oninput="setCustomValidity('')"
                                            size="15" id="bil_tangki_oleo" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_oleo   }}"
                                            onchange="validation_jumlah3()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_others' style="width:100%" oninput="setCustomValidity('')"
                                            size="15" id="bil_tangki_others" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_others  }}"
                                            onchange="validation_jumlah3()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>



                                    <div class="col-md-1 text-center">
                                        <b><span id="bil_tangki_jumlah">
                                                {{ old('bil_tangki_jumlah') ?? number_format($jumlah3, 2) }}
                                            </span>
                                        </b>
                                    </div>

                                </div>

                                <div class="row mt-2 mb-4">
                                    <label for="fname"
                                        class="text-right  control-label col-form-label required align-items-center">
                                        Kapasiti Tangki Simpanan (Tan)</label>
                                        <div  style="margin-left:4%">
                                            {{-- <span></span> --}}
                                        </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_cpo' style="width:100%" oninput="setCustomValidity('')"
                                            id="kap_tangki_cpo" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_cpo }}"
                                            onchange="validation_jumlah4()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>


                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_ppo' style="width:100%" oninput="setCustomValidity('')"
                                            id="kap_tangki_ppo" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_ppo  }}"
                                            onchange="validation_jumlah4()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_cpko' style="width:100%" oninput="setCustomValidity('')"
                                            id="kap_tangki_cpko" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_cpko  }}"
                                            onchange="validation_jumlah4()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_ppko' style="width:100%" oninput="setCustomValidity('')"
                                            id="kap_tangki_ppko" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_ppko  }}"
                                            onchange="validation_jumlah4()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_oleo' style="width:100%" oninput="setCustomValidity('')"
                                            id="kap_tangki_oleo" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_oleo  }}"
                                            onchange="validation_jumlah4()" required>
                                        {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name='kap_tangki_others' style="width:100%" oninput="setCustomValidity('')"
                                            id="kap_tangki_others" onkeypress="return isNumberKey(event)" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_others  }}"
                                            onchange="validation_jumlah4()" required>
                                    </div>
                                    <div class="col-md-1 text-center">
                                            <b><span id="kap_tangki_jumlah">
                                                    {{ old('kap_tangki_jumlah') ?? number_format($jumlah4, 2) }}
                                                </span>
                                            </b>
                                            {{-- <input type="text" name='bil_tangki_jumlah' style="width:100%" size="15" value="{{ $jumlah }}"
                                            id="bil_tangki_jumlah"> --}}

                                    </div>
                                    <br><br>
                                    <div class="row ">
                                        <i style="margin-left:7%;margin-right:7%">Nota: Sekiranya kilang/pelesen tiada
                                            tangki simpanan khusus untuk sesuatu produk. Sila campurkan kesemua
                                            bilangan dan kapasiti tangki dan lapor dalam kategori Others
                                        </i>
                                    </div>

                                </div>

                            @endif



                        </div>
                        </div>


                        <div class="row form-group" style="margin-top: 2%">
                            <div class="text-right col-md-6">
                                <button type="button" class="btn btn-primary" onclick="check();">Simpan</button>
                            </div>

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
                                            data-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block"
                                                style="color:#275047">Tidak</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1"
                                            data-bs-dismiss="modal">
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
        </div>
        </div>

    </div>
@endsection

@section('scripts')
    {{-- ajax daerah --}}

    <script>
        $('.sub-form').submit(function() {

            var x = $('#bil_tangki_cpo').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_cpo').val(x);

            var x = $('#kap_tangki_cpo').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_cpo').val(x);



            return true;

        });
    </script>
    <script>


        $("#e_year").keypress(function(event) {
        if ( event.which == 45 ) {
            event.preventDefault();
        }
        });
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


    <script type="text/javascript">
        $("document").ready(function() {
            setTimeout(function() {
                $("#message").remove(); //tambah untuk remove flash message
            }, 5000); // 5 secs  (1 sec = 1000)
        });
    </script>

    {{-- toaster --}}
    <script src="{{ asset('theme/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('theme/extra-libs/toastr/toastr-init.js') }}"></script>

    {{-- toaster display --}}
    {{-- <script>
        @if (Session::get('success'))
            toastr.success('{{ session('success') }}', 'Berjaya', { "progressBar": true });
        @elseif ($message = Session::get('error'))
            toastr.error('{{ session('error') }}', 'Ralat', { "progressBar": true });
        @endif
    </script> --}}

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
                    bil_tangki_others));

            document.getElementById('bil_tangki_jumlah').innerHTML = jumlah_input.toFixed(2);
        }
    </script>

    <script>
        function validation_jumlah2() {
            var kap_tangki_cpo = $("#kap_tangki_cpo").val();
            var kap_tangki_ppo = $("#kap_tangki_ppo").val();
            var kap_tangki_cpko = $("#kap_tangki_cpko").val();
            var kap_tangki_ppko = $("#kap_tangki_ppko").val();
            var kap_tangki_others = $("#kap_tangki_others").val();

            var jumlah = $("#jumlah2").val();
            var jumlah_input = 0;

            jumlah_input = parseFloat(Number(kap_tangki_cpo)) + parseFloat(Number(kap_tangki_ppo)) +
                parseFloat(Number(kap_tangki_cpko)) + parseFloat(Number(kap_tangki_ppko)) + parseFloat(Number(
                    kap_tangki_others));

            document.getElementById('kap_tangki_jumlah').innerHTML = jumlah_input.toFixed(2);
        }
    </script>

    <script>
        function validation_jumlah3() {
            var bil_tangki_cpo = $("#bil_tangki_cpo").val();
            var bil_tangki_ppo = $("#bil_tangki_ppo").val();
            var bil_tangki_cpko = $("#bil_tangki_cpko").val();
            var bil_tangki_ppko = $("#bil_tangki_ppko").val();
            var bil_tangki_oleo = $("#bil_tangki_oleo").val();
            var bil_tangki_others = $("#bil_tangki_others").val();

            var jumlah = $("#jumlah3").val();
            var jumlah_input = 0;

            jumlah_input = parseFloat(Number(bil_tangki_cpo)) + parseFloat(Number(bil_tangki_ppo)) +
                parseFloat(Number(bil_tangki_cpko)) + parseFloat(Number(bil_tangki_ppko)) + parseFloat(Number(bil_tangki_oleo)) + parseFloat(Number(
                    bil_tangki_others));

            document.getElementById('bil_tangki_jumlah').innerHTML = jumlah_input.toFixed(2);
        }
    </script>

    <script>
        function validation_jumlah4() {
            var kap_tangki_cpo = $("#kap_tangki_cpo").val();
            var kap_tangki_ppo = $("#kap_tangki_ppo").val();
            var kap_tangki_cpko = $("#kap_tangki_cpko").val();
            var kap_tangki_ppko = $("#kap_tangki_ppko").val();
            var kap_tangki_oleo = $("#kap_tangki_oleo").val();
            var kap_tangki_others = $("#kap_tangki_others").val();

            var jumlah = $("#jumlah4").val();
            var jumlah_input = 0;

            jumlah_input = parseFloat(Number(kap_tangki_cpo)) + parseFloat(Number(kap_tangki_ppo)) +
                parseFloat(Number(kap_tangki_cpko)) + parseFloat(Number(kap_tangki_ppko)) + parseFloat(Number(kap_tangki_oleo)) + parseFloat(Number(
                    kap_tangki_others));

            document.getElementById('kap_tangki_jumlah').innerHTML = jumlah_input.toFixed(2);
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
        function valid_notel_pg() {

            if ($('#e_notel_pg').val() == '') {
                $('#e_notel_pg').css('border-color', 'red');
                document.getElementById('err_notel_pg').style.display = "block";


            } else {
                $('#e_notel_pg').css('border-color', '');
                document.getElementById('err_notel_pg').style.display = "none";

            }

        }
    </script>

    <script>
        function valid_email_pg() {

            if ($('#e_email_pg').val() == '') {
                $('#e_email_pg').css('border-color', 'red');
                document.getElementById('err_email_pg').style.display = "block";


            } else {
                $('#e_email_pg').css('border-color', '');
                document.getElementById('err_email_pg').style.display = "none";

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
        function valid_email_pengurus() {

            if ($('#e_email_pengurus').val() == '') {
                $('#e_email_pengurus').css('border-color', 'red');
                document.getElementById('err_email_pengurus').style.display = "block";


            } else {
                $('#e_email_pengurus').css('border-color', '');
                document.getElementById('err_email_pengurus').style.display = "none";

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
        function valid_group() {

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
                if ($('#kap_tangki_cpo').val() == '' || $('#kap_tangki_cpo').val() == '0') {
                    console.log($('#kap_tangki_cpo').val());
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
        function check() {
            // (B1) INIT
            var error = "",
                field = "";

            // kategori
            field = document.getElementById("e_kat");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_kat\r\n";

            }
            // status e-kilang
            field = document.getElementById("e_status");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_status\r\n";

            }
            // status e-mingguan
            field = document.getElementById("e_stock");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_stock\r\n";
            }
            // directory
            field = document.getElementById("directory");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters directory\r\n";
            }
            // alamat premis 1
            field = document.getElementById("e_ap1");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_ap1\r\n";
            }
            @if ($reg_pelesen->e_kat != 'PLBIO')
                // kod pegawai
                field = document.getElementById("kodpgw");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters kodpgw\r\n";
                }
            // no siri
                field = document.getElementById("nosiri");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters nosiri\r\n";
                }
            @endif
            // no lesen
            field = document.getElementById("e_nl");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_nl\r\n";
            }
            // nama premis
            field = document.getElementById("e_np");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_np\r\n";
            }
            // alamat premis 1
            field = document.getElementById("e_ap1");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_ap1\r\n";
            }

            // alamat surat-menyurat 1
            field = document.getElementById("e_as1");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_as1\r\n";
            }

            // no tel kilang
            field = document.getElementById("e_notel");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_notel\r\n";
            }

            // email kilang
            field = document.getElementById("e_email");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_email\r\n";
                $('#e_email').css('border-color', 'red');
                document.getElementById('err_email').style.display = "block";
            }

            // nama pegawai melapor
            field = document.getElementById("e_npg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_npg\r\n";
                $('#e_npg').css('border-color', 'red');
                document.getElementById('err_npg').style.display = "block";
            }

            // jawatan pegawai melapor
            field = document.getElementById("e_jpg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_jpg\r\n";
                $('#e_jpg').css('border-color', 'red');
                document.getElementById('err_jpg').style.display = "block";
            }

            // no tel pegawai melapor
            field = document.getElementById("e_notel_pg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_notel_pg\r\n";
                $('#e_notel_pg').css('border-color', 'red');
                document.getElementById('err_notel_pg').style.display = "block";
            }

            // email pegawai melapor
            field = document.getElementById("e_email_pg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters\r\n";
                $('#e_email_pg').css('border-color', 'red');
                document.getElementById('err_email_pg').style.display = "block";
            }

            // nama pegawai bertanggungjawab
            field = document.getElementById("e_npgtg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_npgtg\r\n";
                $('#e_npgtg').css('border-color', 'red');
                document.getElementById('err_npgtg').style.display = "block";
            }

            // jawatan pegawai bertanggungjawab
            field = document.getElementById("e_jpgtg");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_jpgtg\r\n";
                $('#e_jpgtg').css('border-color', 'red');
                document.getElementById('err_jpgtg').style.display = "block";
            }

            // emel pengurus
            field = document.getElementById("e_email_pengurus");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_email_pengurus\r\n";
                $('#e_email_pengurus').css('border-color', 'red');
                document.getElementById('err_email_pengurus').style.display = "block";
            }

            // enegeri
            field = document.getElementById("negeri_id");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters negeri_id\r\n";
            }

            // daerah
            field = document.getElementById("daerah_id");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters daerah_id\r\n";
            }

            // kawasan
            field = document.getElementById("kawasan_id");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters kawasan_id\r\n";
            }

            // syarikat induk
            field = document.getElementById("e_syktinduk");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_syktinduk\r\n";
                $('#e_syktinduk').css('border-color', 'red');
                document.getElementById('err_syktinduk').style.display = "block";
            }

            // tahun mula beroperasi
            field = document.getElementById("e_year");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_year\r\n";
                $('#e_year').css('border-color', 'red');
                document.getElementById('err_year').style.display = "block";
            }
            // kumpulan
            field = document.getElementById("e_group");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_group\r\n";
                $('#e_group').css('border-color', 'red');
                document.getElementById('err_group').style.display = "block";
            }
           // kap proses
            field = document.getElementById("kap_proses");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters kap_proses\r\n";
                $('#kap_proses').css('border-color', 'red');
                document.getElementById('err_proses').style.display = "block";
            }

            @if ($reg_pelesen->e_kat == 'PL91')
        //    POMA
            field = document.getElementById("e_poma");
            if (!field.checkValidity()) {
                error += "Name must be 2-4 characters e_poma\r\n";
            }
            @endif

            cpo = $('#bil_tangki_cpo').val();
            kcpo = $('#kap_tangki_cpo').val();

            if (cpo != 0 && kcpo == 0) {
                // $('#next').modal('hide');
                error += "Name must be 2-4 characters\r\n";
                $('#kap_tangki_cpo').css('border-color', 'red');
                document.getElementById('err_kcpo').style.display = "block";
            }
            // else {
            //     $('#kap_tangki_cpo').css('border-color', '');
            //     document.getElementById('err_kcpo').style.display = "none";
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
                    console.log(error);
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

            if (bil_others.value == '' || bil_others.value == '0') {
                kap_others.disabled = true;
                // $('#kap_tangki_cpo').val() == 0;
                document.querySelector("#kap_tangki_others").value = "0";

            } else {
                kap_others.disabled = false;
            }

        };
    </script>

@endsection
