@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mt-2">

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
        <div class="container-fluid">
            <div class="card">
                <div class="row" style="padding: 10px">
                    {{-- <div class="col-1 align-self-center">
                        <a href="javascript:history.back()" class="btn" style=" color:rgb(64, 69, 68)"><i
                                class="fa fa-angle-left">&ensp;</i>Kembali</a>
                    </div> --}}
                    <div class="col-1 align-self-center">
                        <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i
                                class="fa fa-angle-left">&ensp;</i>Kembali</a>
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
                        @if ($pelesen)
                            <form action="{{ route('admin.update.maklumat.asas.pelesen', [$pelesen->e_id]) }}"
                                method="post" onsubmit="return check()" novalidate class="sub-form">
                                @csrf
                            @else
                                <form action="{{ route('admin.daftar.maklumat') }}" method="post" onsubmit="return check()"
                                    novalidate class="sub-form">
                                    @csrf
                        @endif

                        <div class="container">
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label  align-items-center">
                                    Jenis Kilang </label>
                                <div class="col-md">
                                    <fieldset class="form-group">
                                        @if ($pelesen)
                                            <select class="form-control" name="e_kat" id="e_kat"
                                                style="text-transform:uppercase" disabled>

                                                <option {{ $reg_pelesen->e_kat == 'PL91' ? 'selected' : '' }}
                                                    value="PL91">KILANG BUAH</option>
                                                <option {{ $reg_pelesen->e_kat == 'PL101' ? 'selected' : '' }}
                                                    value="PL101">KILANG PENAPIS</option>
                                                <option {{ $reg_pelesen->e_kat == 'PL102' ? 'selected' : '' }}
                                                    value="PL102">KILANG ISIRUNG</option>
                                                <option {{ $reg_pelesen->e_kat == 'PL104' ? 'selected' : '' }}
                                                    value="PL104">KILANG OLEOKIMIA</option>
                                                <option {{ $reg_pelesen->e_kat == 'PL111' ? 'selected' : '' }}
                                                    value="PL111">PUSAT SIMPANAN</option>
                                                <option {{ $reg_pelesen->e_kat == 'PLBIO' ? 'selected' : '' }}
                                                    value="PLBIO">KILANG BIODIESEL</option>
                                            </select>
                                        @else
                                            <select class="form-control" name="e_kat" id="e_kat"
                                                style="text-transform:uppercase" >
                                            @if ($reg_pelesen->e_kat == 'PL91')
                                            <option value="PL91">KILANG BUAH</option>
                                            @elseif ($reg_pelesen->e_kat == 'PL101')
                                            <option value="PL101">KILANG PENAPIS</option>
                                            @elseif ($reg_pelesen->e_kat == 'PL102')
                                            <option value="PL102">KILANG ISIRUNG</option>

                                            @elseif ($reg_pelesen->e_kat == 'PL104')
                                            <option value="PL104">KILANG OLEOKIMIA</option>

                                            @elseif ($reg_pelesen->e_kat == 'PL111')
                                            <option value="PL111">PUSAT SIMPANAN</option>

                                            @else
                                            <option value="PLBIO">KILANG BIODIESEL</option>


                                            @endif
                                            </select>
                                        @endif

                                    </fieldset>

                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Status e-Kilang </label>
                                <div class="col-md">
                                    <fieldset class="form-group">
                                        <select class="form-control" name="e_status" id="e_status"
                                            style="text-transform:uppercase" required>
                                            <option selected hidden value="">Sila Pilih</option>

                                            @if ($pelesen)
                                                <option {{ $reg_pelesen->e_status == '1' ? 'selected' : '' }}
                                                    value="1">
                                                    AKTIF</option>
                                                <option {{ $reg_pelesen->e_status == '2' ? 'selected' : '' }}
                                                    value="2">
                                                    TIDAK AKTIF</option>
                                            @else
                                                <option value="1"> AKTIF</option>
                                                <option value="2">TIDAK AKTIF</option>
                                            @endif

                                        </select>
                                    </fieldset>

                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Status e-Mingguan </label>
                                <div class="col-md">
                                    <fieldset class="form-group">
                                        <select class="form-control" name="e_stock" id="e_stock"
                                            style="text-transform:uppercase" required>
                                            <option selected hidden value="">Sila Pilih</option>

                                            @if ($pelesen)
                                                <option {{ $reg_pelesen->e_stock == '1' ? 'selected' : '' }}
                                                    value="1">
                                                    AKTIF</option>
                                                <option {{ $reg_pelesen->e_stock == '2' ? 'selected' : '' }}
                                                    value="2">
                                                    TIDAK AKTIF</option>
                                            @else
                                                <option value="1"> AKTIF</option>
                                                <option value="2">TIDAK AKTIF</option>
                                            @endif

                                        </select>
                                    </fieldset>

                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Status Direktori </label>
                                <div class="col-md">
                                    <fieldset class="form-group">
                                        <select class="form-control" name="directory" id="directory"
                                            style="text-transform:uppercase" required>
                                            <option selected hidden value="">Sila Pilih</option>

                                            @if ($pelesen)
                                                <option {{ $reg_pelesen->directory == 'Y' ? 'selected' : '' }}
                                                    value="Y">
                                                    YA</option>
                                                <option {{ $reg_pelesen->directory == 'N' ? 'selected' : '' }}
                                                    value="N">
                                                    TIDAK</option>
                                            @else
                                                <option value="Y">YA</option>
                                                <option value="N">TIDAK</option>
                                            @endif

                                        </select>
                                    </fieldset>

                                </div>
                            </div>
                            @if ($reg_pelesen->e_kat != 'PLBIO')
                                <div class="row">
                                    <label for="fname"
                                        class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                        Kod Negeri </label>
                                    <div class="col-md">
                                        <fieldset class="form-group">
                                            <select class="form-control" name="kodpgw" id="kodpgw"
                                                style="text-transform:uppercase" required>
                                                <option selected hidden value="">Sila Pilih</option>

                                                @if ($pelesen)
                                                    @if ($reg_pelesen->e_kat == 'PL101')
                                                        <option
                                                            {{ ($pelesen->kodpgw == 'FA' or $pelesen->kodpgw == 'DD') ? 'selected' : '' }}
                                                            value="FA">FA</option>
                                                        <option
                                                            {{ ($pelesen->kodpgw == 'FB' or $pelesen->kodpgw == 'DD') ? 'selected' : '' }}
                                                            value="FB">FB</option>
                                                        <option
                                                            {{ ($pelesen->kodpgw == 'FC' or $pelesen->kodpgw == 'DD') ? 'selected' : '' }}
                                                            value="FC">FC</option>
                                                        <option
                                                            {{ ($pelesen->kodpgw == 'FD' or $pelesen->kodpgw == 'DD') ? 'selected' : '' }}
                                                            value="FD">FD</option>
                                                        <option {{ $pelesen->kodpgw == 'FJ' ? 'selected' : '' }}
                                                            value="FJ">FJ</option>
                                                        <option {{ $pelesen->kodpgw == 'FP' ? 'selected' : '' }}
                                                            value="FP">FP</option>
                                                        <option {{ $pelesen->kodpgw == 'FQ' ? 'selected' : '' }}
                                                            value="FQ">FQ</option>
                                                        <option {{ $pelesen->kodpgw == 'FS' ? 'selected' : '' }}
                                                            value="FS">FS</option>
                                                    @elseif ($reg_pelesen->e_kat == 'PL104')
                                                        <option {{ $pelesen->kodpgw == 'CA' ? 'selected' : '' }}
                                                            value="CA">CA</option>
                                                        <option {{ $pelesen->kodpgw == 'CC' ? 'selected' : '' }}
                                                            value="CC">CC</option>
                                                        <option {{ $pelesen->kodpgw == 'CJ' ? 'selected' : '' }}
                                                            value="CJ">CJ</option>
                                                        <option {{ $pelesen->kodpgw == 'CP' ? 'selected' : '' }}
                                                            value="CP">CP</option>
                                                        <option {{ $pelesen->kodpgw == 'CS' ? 'selected' : '' }}
                                                            value="CS">CS</option>
                                                    @elseif ($reg_pelesen->e_kat == 'PL111')
                                                        <option {{ $pelesen->kodpgw == 'BB' ? 'selected' : '' }}
                                                            value="BB">BB</option>
                                                        <option {{ $pelesen->kodpgw == 'BC' ? 'selected' : '' }}
                                                            value="BC">BC</option>
                                                        <option {{ $pelesen->kodpgw == 'BJ' ? 'selected' : '' }}
                                                            value="BJ">BJ</option>
                                                        <option {{ $pelesen->kodpgw == 'BP' ? 'selected' : '' }}
                                                            value="BP">BP</option>
                                                        <option {{ $pelesen->kodpgw == 'BQ' ? 'selected' : '' }}
                                                            value="BQ">BQ</option>
                                                        <option {{ $pelesen->kodpgw == 'BS' ? 'selected' : '' }}
                                                            value="BS">BS</option>
                                                    @elseif ($reg_pelesen->e_kat == 'PL102')
                                                        <option {{ $pelesen->kodpgw == 'JJ' ? 'selected' : '' }}
                                                            value="JJ">JJ</option>
                                                        <option {{ $pelesen->kodpgw == 'NS' ? 'selected' : '' }}
                                                            value="NS">NS</option>
                                                        <option {{ $pelesen->kodpgw == 'PH' ? 'selected' : '' }}
                                                            value="PH">PH</option>
                                                        <option {{ $pelesen->kodpgw == 'PK' ? 'selected' : '' }}
                                                            value="PK">PK</option>
                                                        <option {{ $pelesen->kodpgw == 'PP' ? 'selected' : '' }}
                                                            value="PP">BQ</option>
                                                        <option {{ $pelesen->kodpgw == 'SA' ? 'selected' : '' }}
                                                            value="SA">SA</option>
                                                        <option {{ $pelesen->kodpgw == 'SS' ? 'selected' : '' }}
                                                            value="SS">SS</option>
                                                        <option {{ $pelesen->kodpgw == 'SW' ? 'selected' : '' }}
                                                            value="SW">SW</option>
                                                        <option {{ $pelesen->kodpgw == 'WP' ? 'selected' : '' }}
                                                            value="WP">WP</option>
                                                    @else
                                                        <option {{ $pelesen->kodpgw == 'JJ' ? 'selected' : '' }}
                                                            value="JJ">JJ</option>
                                                        <option {{ $pelesen->kodpgw == 'KB' ? 'selected' : '' }}
                                                            value="KB">KB</option>
                                                        <option {{ $pelesen->kodpgw == 'KK' ? 'selected' : '' }}
                                                            value="KK">KK</option>
                                                        <option {{ $pelesen->kodpgw == 'MM' ? 'selected' : '' }}
                                                            value="MM">MM</option>
                                                        <option {{ $pelesen->kodpgw == 'NS' ? 'selected' : '' }}
                                                            value="NS">NS</option>
                                                        <option {{ $pelesen->kodpgw == 'PH' ? 'selected' : '' }}
                                                            value="PH">PH</option>
                                                        <option {{ $pelesen->kodpgw == 'PK' ? 'selected' : '' }}
                                                            value="PK">PK</option>
                                                        <option {{ $pelesen->kodpgw == 'PP' ? 'selected' : '' }}
                                                            value="PP">PP</option>
                                                        <option {{ $pelesen->kodpgw == 'SA' ? 'selected' : '' }}
                                                            value="SA">SA</option>
                                                        <option {{ $pelesen->kodpgw == 'SS' ? 'selected' : '' }}
                                                            value="SS">SS</option>
                                                        <option {{ $pelesen->kodpgw == 'SW' ? 'selected' : '' }}
                                                            value="SW">SW</option>
                                                        <option {{ $pelesen->kodpgw == 'WP' ? 'selected' : '' }}
                                                            value="WP">WP</option>
                                                    @endif
                                                @else
                                                    @if ($reg_pelesen->e_kat == 'PL101')
                                                        <option value="FA">FA</option>
                                                        <option value="FB">FB</option>
                                                        <option value="FC">FC</option>
                                                        <option value="FD">FD</option>
                                                        <option value="FJ">FJ</option>
                                                        <option value="FP">FP</option>
                                                        <option value="FQ">FQ</option>
                                                        <option value="FS">FS</option>
                                                    @elseif ($reg_pelesen->e_kat == 'PL104')
                                                        <option value="CA">CA</option>
                                                        <option value="CC">CC</option>
                                                        <option value="CJ">CJ</option>
                                                        <option value="CP">CP</option>
                                                        <option value="CS">CS</option>
                                                    @elseif ($reg_pelesen->e_kat == 'PL111')
                                                        <option value="BB">BB</option>
                                                        <option value="BC">BC</option>
                                                        <option value="BJ">BJ</option>
                                                        <option value="BP">BP</option>
                                                        <option value="BQ">BQ</option>
                                                        <option value="BS">BS</option>
                                                    @elseif ($reg_pelesen->e_kat == 'PL102')
                                                        <option value="JJ">JJ</option>
                                                        <option value="NS">NS</option>
                                                        <option value="PH">PH</option>
                                                        <option value="PK">PK</option>
                                                        <option value="PP">BQ</option>
                                                        <option value="SA">SA</option>
                                                        <option value="SS">SS</option>
                                                        <option value="SW">SW</option>
                                                        <option value="WP">WP</option>
                                                    @else
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
                                                        <option value="WP">WP</option>
                                                    @endif
                                                @endif


                                            </select>
                                        </fieldset>

                                    </div>
                                </div>
                                <div class="row">
                                    <label for="fname"
                                        class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                        Nombor Siri </label>
                                    <div class="col-md">
                                        <fieldset class="form-group">
                                            <input type="text" id="nosiri" class="form-control" required
                                                style="text-transform:uppercase" placeholder="Nombor Siri" name="nosiri"
                                                maxlength="4" minlength="4" value="{{ $pelesen->nosiri ?? '' }}"
                                                oninput="valid_siri()" onkeypress="return isNumberKey(event)">
                                            <p type="hidden" id="err_nosiri" style="color: red; display:none">
                                                <i>Sila isi butiran di bahagian ini!</i>
                                            </p>
                                        </fieldset>


                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Nombor Lesen </label>
                                <div class="col-md">
                                    <fieldset class="form-group">
                                        <input type="text" id="e_nl" readonly class="form-control" required
                                            minlength="12" maxlength="12" style="text-transform:uppercase"
                                            placeholder="Nombor Lesen" name="e_nl"
                                            value="{{ $reg_pelesen->e_nl }}">

                                    </fieldset>

                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Nama Premis </label>
                                <div class="col-md">
                                    <fieldset class="form-group">
                                        <input type="text" id="e_np" class="form-control" required
                                            maxlength="60" style="text-transform:uppercase"
                                            oninput=" this.value = this.value.toUpperCase(); valid_np()"
                                            placeholder="Nama Premis" name="e_np" value="{{ $pelesen->e_np ?? '' }}">
                                        <p type="hidden" id="err_np" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i>
                                        </p>
                                    </fieldset>

                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label required col-form-label align-items-center">
                                    Alamat Premis Berlesen</label>
                                <div class="col-md-8">
                                    <input type="text" id="e_ap1" class="form-control" maxlength="60"
                                        oninput=" this.value = this.value.toUpperCase(); valid_ap()"
                                        placeholder="Alamat Premis Berlesen 1" name="e_ap1"
                                        style="text-transform:uppercase" value="{{ $pelesen->e_ap1 ?? '' }}" required>
                                    <p type="hidden" id="err_ap" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>
                                    @error('e_ap1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <label for="fname" class="text-left col-sm-4">
                                </label>
                                <div class="col-md-8" style="padding-top: 10px;">
                                    <input type="text" id="e_ap2" class="form-control" maxlength="60"
                                        oninput=" this.value = this.value.toUpperCase()"
                                        placeholder="Alamat Premis Berlesen 2" name="e_ap2"
                                        style="text-transform:uppercase" value="{{ $pelesen->e_ap2 ?? '' }}">
                                    @error('e_ap2')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <label for="fname" class="text-left col-sm-4">
                                </label>
                                <div class="col-md-8" style="padding-top: 10px;">
                                    <input type="text" id="e_ap3" class="form-control" maxlength="60"
                                        oninput=" this.value = this.value.toUpperCase()"
                                        placeholder="Alamat Premis Berlesen 3" name="e_ap3"
                                        style="text-transform:uppercase" value="{{ $pelesen->e_ap3 ?? '' }}">
                                    @error('e_ap3')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Alamat Surat Menyurat</label>
                                <div class="col-md-8" style="padding-top: 10px;">
                                    <input type="text" id="e_as1" class="form-control" required maxlength="60"
                                        oninput=" this.value = this.value.toUpperCase(); valid_as()"
                                        placeholder="Alamat Surat Menyurat 1" name="e_as1"
                                        style="text-transform:uppercase" value="{{ $pelesen->e_as1 ?? '' }}">
                                    <p type="hidden" id="err_as" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>
                                    @error('e_as1')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <label for="fname" class="text-left col-sm-4">
                                </label>
                                <div class="col-md-8" style="padding-top: 10px;">
                                    <input type="text" id="e_as2" class="form-control" maxlength="60"
                                        oninput=" this.value = this.value.toUpperCase()"
                                        placeholder="Alamat Surat Menyurat 2" name="e_as2"
                                        style="text-transform:uppercase" value="{{ $pelesen->e_as2 ?? '' }}">
                                    @error('e_as2')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <label for="fname" class="text-left col-sm-4">
                                </label>
                                <div class="col-md-8" style="padding-top: 10px;">
                                    <input type="text" id="e_as3" class="form-control" maxlength="60"
                                        oninput=" this.value = this.value.toUpperCase()"
                                        placeholder="Alamat Surat Menyurat 3" name="e_as3"
                                        style="text-transform:uppercase" value="{{ $pelesen->e_as3 ?? '' }}">
                                    @error('e_as3')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    No. Telefon (Pejabat / Kilang)</label>
                                <div class="col-md-8" style="padding-top: 10px;">
                                    <input type="text" id="e_notel" class="form-control" maxlength="40"
                                        oninput="valid_notel()" placeholder="No. Telefon Pejabat / Kilang" name="e_notel"
                                        style="text-transform:uppercase" value="{{ $pelesen->e_notel ?? '' }}" required>
                                    <p type="hidden" id="err_notel" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>
                                    @error('e_notel')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label align-items-center">
                                    No. Faks</label>
                                <div class="col-md" style="padding-top: 10px;">
                                    <input type="text" id="e_nofax" class="form-control" maxlength="40"
                                        placeholder="No. Faks" name="e_nofax" style="text-transform:uppercase"
                                        value="{{ $pelesen->e_nofax ?? '' }}">
                                    @error('e_nofax')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Alamat Emel Kilang</label>
                                <div class="col-md" style="padding-top: 10px;">
                                    <input type="email" id="e_email" class="form-control"
                                        placeholder="ALAMAT EMEL KILANG" name="e_email" required maxlength="40"
                                        value="{{ $pelesen->e_email ?? '' }}" oninput="valid_email(); ValidateEmail()">

                                    <p type="hidden" id="err_email" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>
                                    <p type="hidden" id="err_email2" style="color: red; display:none"><i>Sila
                                            masukkan
                                            alamat emel yang betul!</i></p>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label  align-items-center">
                                    Nama Pegawai Melapor</label>
                                <div class="col-md" style="padding-top: 10px;">
                                    <input type="text" id="e_npg" class="form-control" maxlength="60"
                                        oninput=" this.value = this.value.toUpperCase()"
                                        placeholder="Nama Pegawai Melapor" name="e_npg"
                                        style="text-transform:uppercase" value="{{ $pelesen->e_npg ?? '' }}"
                                        oninput="valid_npg()">

                                    <p type="hidden" id="err_npg" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label  align-items-center">
                                    Jawatan Pegawai Melapor</label>
                                <div class="col-md" style="padding-top: 10px;">
                                    <input type="text" id="e_jpg" class="form-control" maxlength="60"
                                        oninput=" this.value = this.value.toUpperCase()"
                                        placeholder="Jawatan Pegawai Melapor" name="e_jpg"
                                        style="text-transform:uppercase" value="{{ $pelesen->e_jpg ?? '' }}"
                                        oninput="valid_jpg()">

                                    <p type="hidden" id="err_jpg" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label  align-items-center">
                                    No. Telefon Pegawai Melapor</label>
                                <div class="col-md" style="padding-top: 10px;">
                                    <input type="text" id="e_notel_pg" class="form-control"
                                        placeholder="No. Telefon Pegawai Melapor" style="text-transform:uppercase"
                                        name="e_notel_pg" maxlength="40" value="{{ $pelesen->e_notel_pg ?? '' }}"
                                        oninput="valid_notel_pg()">

                                    <p type="hidden" id="err_notel_pg" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label  align-items-center">
                                    Alamat Emel Pegawai Melapor</label>
                                <div class="col-md" style="padding-top: 10px;">
                                    <input type="email" id="e_email_pg" class="form-control"
                                        placeholder="ALAMAT EMEL PEGAWAI MELAPOR" maxlength="40" name="e_email_pg"
                                        value="{{ $pelesen->e_email_pg ?? '' }}" oninput="valid_email_pg()">

                                    <p type="hidden" id="err_email_pg" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label  align-items-center">
                                    Nama Pegawai Bertanggungjawab</label>
                                <div class="col-md" style="padding-top: 10px;">
                                    <input type="text" id="e_npgtg" class="form-control" maxlength="60"
                                        oninput=" this.value = this.value.toUpperCase()"
                                        placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                        style="text-transform:uppercase" value="{{ $pelesen->e_npgtg ?? '' }}"
                                        oninput="valid_npgtg()">

                                    <p type="hidden" id="err_npgtg" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>
                                </div>
                                {{-- </div> --}}
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label  align-items-center">
                                    Jawatan Pegawai
                                    Bertanggungjawab</label>
                                <div class="col-md" style="padding-top: 10px;">
                                    <input type="text" id="e_jpgtg" class="form-control" maxlength="60"
                                        oninput=" this.value = this.value.toUpperCase()"
                                        placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
                                        style="text-transform:uppercase" value="{{ $pelesen->e_jpgtg ?? '' }}"
                                        oninput="valid_jpgtg()">

                                    <p type="hidden" id="err_jpgtg" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>

                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label  align-items-center">
                                    Alamat Emel Pengurus</label>
                                <div class="col-md" style="padding-top: 10px;">
                                    <input type="email" id="e_email_pengurus" class="form-control" maxlength="40"
                                        placeholder="ALAMAT EMEL PENGURUS" name="e_email_pengurus"
                                        value="{{ $pelesen->e_email_pengurus ?? '' }}" oninput="valid_email_pengurus()">

                                    <p type="hidden" id="err_email_pengurus" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Negeri </label>
                                <div class="col-md" style="padding-top: 10px;">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="negeri_id" name='e_negeri' required
                                            style="text-transform:uppercase"
                                            onchange="ajax_daerah(this);ajax_kawasan(this)">
                                            <option selected hidden disabled value="">Sila Pilih</option>

                                            @if ($pelesen)
                                                @if ($pelesen->negeri)
                                                    @foreach ($negeri as $data)
                                                        <option value="{{ $data->kod_negeri }}"
                                                            {{ $pelesen->negeri->kod_negeri == $data->kod_negeri ? 'selected' : '' }}>
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
                                            @else
                                                @foreach ($negeri as $data)
                                                    <option value="{{ $data->kod_negeri }}">
                                                        {{ $data->nama_negeri }}
                                                    </option>
                                                @endforeach
                                            @endif


                                        </select>
                                    </fieldset>

                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Daerah </label>
                                <div class="col-md">
                                    <fieldset class="form-group">


                                        @if ($pelesen)
                                            <select class="form-control" id="daerah_id" name='e_daerah' required
                                                style="text-transform:uppercase" placeholder="Daerah">
                                                @if ($pelesen->negeri)
                                                    @foreach ($pelesen->negeri->daerahs as $daerah)
                                                        <option value="{{ $daerah->kod_daerah }}"
                                                            {{ $daerah->kod_daerah == $pelesen->e_daerah ? 'selected' : '' }}>
                                                            {{ $daerah->nama_daerah ?? 'Sila Pilih Negeri Terlebih Dahulu' }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option selected hidden disabled> Sila Pilih Daerah</option>
                                                @endif
                                            </select>
                                        @else
                                            <select class="form-control" id="daerah_id" name='e_daerah' required
                                                placeholder="Daerah" style="text-transform:uppercase"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity(''); invokeFunc21(); valid_daerah()">
                                                <option selected hidden disabled value="">Sila Pilih Negeri Terlebih
                                                    Dahulu
                                                </option>
                                            </select>
                                        @endif

                                        {{-- <option selected hidden disabled value="">POMA</option>
                                            <option {{ $pelesen->e_daerah == 'Ya' ? 'selected' : '' }} value="Ya">
                                                Ya</option>
                                            <option {{ $pelesen->e_poma == 'Tidak' ? 'selected' : '' }} value="Tidak">
                                                Tidak</option> --}}
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Kawasan </label>
                                <div class="col-md">
                                    <fieldset class="form-group">
                                        @if ($pelesen)
                                        <select class="form-control" id="kawasan_id" style="text-transform:uppercase"
                                        name='e_kawasan' required>
                                        @if ($pelesen->negeri)
                                            <option value="{{ $pelesen->negeri->kod_region }}" selected hidden
                                                disabled>
                                                {{ $pelesen->negeri->nama_region ?? 'Sila Pilih Daerah Terlebih Dahulu' }}
                                            </option>
                                        @else
                                            <option selected hidden disabled> Sila Pilih Kawasan</option>
                                        @endif
                                    </select>
                                    @else
                                    <select class="form-control" id="kawasan_id" name='e_kawasan' required style="text-transform:uppercase"
                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                    oninput="setCustomValidity(''); invokeFunc22(); valid_kawasan()">
                                    <option value="" selected hidden disabled>Sila Pilih
                                        Daerah Terlebih Dahulu</option>
                                </select>
                                    @endif

                                    </fieldset>

                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Syarikat Induk</label>
                                <div class="col-md">
                                    <input type="text" id="e_syktinduk" class="form-control" required maxlength="60"
                                        placeholder="Syarikat Induk" name="e_syktinduk" style="text-transform:uppercase"
                                        value="{{ $pelesen->e_syktinduk ?? '' }}"
                                        oninput="valid_syktinduk(); this.value = this.value.toUpperCase()"">

                                    <p type="hidden" id="err_syktinduk" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Tahun Mula Beroperasi</label>
                                <div class="col-md">
                                    <input type="text" id="e_year" class="form-control" required
                                        onkeypress="return isNumberKey(event)" placeholder="Tahun Mula Beroperasi"
                                        name="e_year" maxlength="4" minlength="4" style="text-transform:uppercase"
                                        value="{{ $pelesen->e_year ?? '' }}" oninput="valid_year()">

                                    <p type="hidden" id="err_year" style="color: red; display:none">
                                        <i>Sila isi butiran di bahagian ini!</i>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <label for="fname"
                                    class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                    Kumpulan </label>
                                <div class="col-md">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="e_group" name="e_group"
                                            style="text-transform:uppercase" required oninput="valid_group()">
                                            @if ($pelesen)
                                                <option selected hidden value="">Sila Pilih Kumpulan</option>

                                                <option {{ $pelesen->e_group == 'GOV' ? 'selected' : '' }} value="GOV">
                                                    KERAJAAN</option>
                                                <option {{ $pelesen->e_group == 'IND' ? 'selected' : '' }} value="IND">
                                                    SWASTA</option>
                                            @else
                                                <option selected hidden value="">Sila Pilih Kumpulan</option>

                                                <option value="GOV"> KERAJAAN</option>
                                                <option value="IND">SWASTA</option>
                                            @endif

                                        </select>

                                        <p type="hidden" id="err_group" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i>
                                        </p>

                                    </fieldset>

                                </div>
                            </div>
                            @if ($reg_pelesen->e_kat == 'PL91')
                                <div class="row">

                                    <label for="fname"
                                        class="text-left col-sm-4 control-label col-form-label required align-items-center">
                                        POMA </label>
                                    <div class="col-md">
                                        <fieldset class="form-group">
                                            <select class="form-control" id="e_poma" style="text-transform:uppercase"
                                                name="e_poma" required>
                                                @if ($pelesen)
                                                    <option {{ $pelesen->e_poma == 'Ya' ? 'selected' : '' }}
                                                        value="Ya">
                                                        YA</option>
                                                    <option {{ $pelesen->e_poma == 'Tidak' ? 'selected' : '' }}
                                                        value="Tidak">
                                                        TIDAK</option>
                                                @else
                                                    <option value="Ya">YA</option>
                                                    <option value="Tidak">TIDAK</option>
                                                @endif

                                            </select>
                                        </fieldset>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label for="fname" class=" control-label col-form-label required">
                                            Adakah terdapat kemudahan loji biogas di tapak kilang? </label>
                                    </div>
                                    <div class="col-md">
                                        <fieldset class="form-group">
                                            <select class="form-control" id="e_biogas" name="e_biogas" required
                                                oninput="setCustomValidity(''); valid_biogas()" onchange="biogas()"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')">
                                                <option selected hidden value="">SILA PILIH</option>
                                                @if ($pelesen)
                                                    <option {{ $pelesen->e_biogas == '1' ? 'selected' : '' }}
                                                        value="1">
                                                        YA</option>
                                                    <option {{ $pelesen->e_biogas == '2' ? 'selected' : '' }}
                                                        value="2">
                                                        TIDAK</option>
                                                @else
                                                    <option value="1">YA</option>
                                                    <option value="2">TIDAK</option>
                                                @endif

                                            </select>
                                            <p type="hidden" id="err_biogas" style="color: red; display:none">
                                                <i>Sila buat
                                                    pilihan di bahagian ini!</i>
                                            </p>
                                        </fieldset>
                                    </div>
                                </div>
                                <div id="biogas" style="display: none">
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label for="fname" class=" control-label col-form-label required">
                                                Apakah status loji biogas tersebut? </label>
                                        </div>
                                        <div class="col-md">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="e_status_biogas" name="e_status_biogas"
                                                    oninput="setCustomValidity(''); valid_statusbiogas()"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')">
                                                    <option selected hidden value="">SILA PILIH</option>
                                                    @if ($pelesen)
                                                        <option {{ $pelesen->e_status_biogas == '3' ? 'selected' : '' }}
                                                            value="3">
                                                            TELAH SIAP</option>
                                                        <option {{ $pelesen->e_status_biogas == '2' ? 'selected' : '' }}
                                                            value="2">
                                                            DALAM PEMBINAAN</option>
                                                        <option {{ $pelesen->e_status_biogas == '1' ? 'selected' : '' }}
                                                            value="1">
                                                            DALAM PERANCANGAN</option>
                                                    @else
                                                        <option value="3">TELAH SIAP</option>
                                                        <option value="2">DALAM PEMBINAAN</option>
                                                        <option value="1">DALAM PERANCANGAN</option>
                                                    @endif

                                                </select>
                                                <p type="hidden" id="err_biogas2" style="color: red; display:none">
                                                    <i>Sila buat
                                                        pilihan di bahagian ini!</i>
                                                </p>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($reg_pelesen->e_kat != 'PL111')
                                <div class="row">
                                    <label for="fname"
                                        class="text-left col-sm-4 control-label col-form-label  align-items-center">
                                        Kapasiti Pemprosesan / Tahun</label>
                                    <div class="col-md">
                                        <input type="text" id="kap_proses" class="form-control" maxlength="10"
                                            placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses"
                                            style="text-transform:uppercase" onkeypress="return point(event)"
                                            value="{{ number_format($pelesen->kap_proses ?? 0) }}"
                                            oninput=" FormatCurrency(this)">

                                        <p type="hidden" id="err_proses" style="color: red; display:none">
                                            <i>Sila isi butiran di bahagian ini!</i>
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div class="row noScreen">
                                    <label for="fname"
                                        class="text-left col-sm-4 control-label col-form-label  align-items-center">
                                        Kapasiti Pemprosesan / Tahun</label>
                                    <div class="col-md">
                                        <input type="text" id="kap_proses" class="form-control" maxlength="10"
                                            placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses"
                                            style="text-transform:uppercase" value="0">

                                    </div>
                                </div>
                            @endif

                            <div class="col-12">
                                @if ($reg_pelesen->e_kat == 'PL91')
                                    <div style="margin-left:-2%">

                                        <div class="row mr-auto" style="margin:20px 0px">
                                            <div class="col-sm-4 form-group" style="margin: 0px">
                                                <span></span>
                                            </div>
                                            <div class="col-md" style="text-align: centerS">
                                                <span>CPO</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4 form-group" style="margin: 0px">
                                                <label for="fname" class="control-label col-form-label ">
                                                    Bilangan Tangki</label>
                                            </div>

                                            <div class="col-md">
                                                <input type="text" class="form-control" name='bil_tangki_cpo'
                                                    style="width:20%" id="bil_tangki_cpo91"
                                                    title="Sila isikan butiran ini."
                                                    oninput="this.setCustomValidity(''); FormatCurrency(this)"
                                                    onkeypress="return point(event)"
                                                    value="{{ number_format($pelesen->bil_tangki_cpo ?? 0) }}"
                                                    onClick="this.select();">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 form-group" style="margin: 0px">
                                                <label for="fname" class="control-label col-form-label">
                                                    Kapasiti Tangki Simpanan (Tan)</label>
                                            </div>
                                            <div class="col-md">
                                                <input type="text" class="form-control" name='kap_tangki_cpo'
                                                    style="width:20%" id="kap_tangki_cpo91"
                                                    oninput="this.setCustomValidity(''); validate_two_decimal(this); FormatCurrency(this)"
                                                    title="Sila isikan butiran ini." onkeypress="return point(event)"
                                                    value="{{ number_format($pelesen->kap_tangki_cpo ?? 0) }}"
                                                    onClick="this.select();">
                                                <p type="hidden" id="err_kcpko" style="color: red; display:none">
                                                    <i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i>
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mx-3" style="margin-left:14%">
                                        <i>Nota: Sekiranya kilang/pelesen tiada tangki simpanan
                                            khusus untuk sesuatu produk. Sila campurkan kesemua
                                            bilangan dan kapasiti tangki dan lapor dalam kategori Others
                                        </i>
                                    </div>
                                @elseif ($reg_pelesen->e_kat == 'PL101')
                                    <br>

                                    <div class="row mr-auto" style="margin-left:-2%">
                                        <div class="col-sm-4 form-group" style="margin: 0px">
                                            <span><br></span><label for="fname" class="control-label col-form-label ">
                                                Bilangan Tangki</label><br>
                                            <label for="fname" class="control-label col-form-label ">
                                                Kapasiti Tangki Simpanan (Tan)</label>
                                        </div>
                                        <div class="col-md-7">
                                            <table style="width:100%; text-align: center; font-size: 10px">
                                                <tr>
                                                    <th>CPO</th>
                                                    <th>PPO</th>
                                                    <th>CPKO</th>
                                                    <th>PPKO</th>
                                                    <th>OTHERS</th>
                                                    <th>JUMLAH</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" name='bil_tangki_cpo'
                                                            min="0" onClick="this.select();" style="width:100%"
                                                            oninput="this.setCustomValidity(''); FormatCurrency(this)"
                                                            size="15" id="bil_tangki_cpo101"
                                                            onkeypress="return point(event)"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            title="Sila isikan butiran ini."
                                                            value="{{ number_format($pelesen->bil_tangki_cpo ?? 0) }}"
                                                            onchange="validation_jumlah()">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name='bil_tangki_ppo'
                                                            onClick="this.select();" style="width:100%"
                                                            oninput="this.setCustomValidity(''); FormatCurrency(this)"
                                                            size="15" id="bil_tangki_ppo101"
                                                            onkeypress="return point(event)"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            title="Sila isikan butiran ini."
                                                            value="{{ number_format($pelesen->bil_tangki_ppo ?? 0) }}"
                                                            onchange="validation_jumlah()">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name='bil_tangki_cpko'
                                                            onClick="this.select();" style="width:100%"
                                                            oninput="this.setCustomValidity(''); FormatCurrency(this)"
                                                            size="15" id="bil_tangki_cpko101"
                                                            onkeypress="return point(event)"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            title="Sila isikan butiran ini."
                                                            value="{{ number_format($pelesen->bil_tangki_cpko ?? 0) }}"
                                                            onchange="validation_jumlah()">
                                                    </td>
                                                    <td> <input type="text" class="form-control"
                                                            name='bil_tangki_ppko' onClick="this.select();"
                                                            style="width:100%"
                                                            oninput="this.setCustomValidity(''); FormatCurrency(this)"
                                                            size="15" id="bil_tangki_ppko101"
                                                            onkeypress="return point(event)"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            title="Sila isikan butiran ini."
                                                            value="{{ number_format($pelesen->bil_tangki_ppko ?? 0) }}"
                                                            onchange="validation_jumlah()">
                                                    </td>
                                                    <td><input type="text" class="form-control"
                                                            name='bil_tangki_others' onClick="this.select();"
                                                            style="width:100%"
                                                            oninput="this.setCustomValidity(''); FormatCurrency(this)"
                                                            size="15" id="bil_tangki_others101"
                                                            onkeypress="return point(event)"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            title="Sila isikan butiran ini."
                                                            value="{{ number_format($pelesen->bil_tangki_others ?? 0) }}"
                                                            onchange="validation_jumlah()">
                                                    </td>
                                                    <td style="font-size: 10pt; padding-top: 8px; padding-left: 8px">
                                                        <b><span
                                                                id="bil_tangki_jumlah">{{ old('bil_tangki_jumlah') ?? number_format($jumlah) }}</span></b>
                                                    </td>
                                                </tr>
                                                <tr style="vertical-align: top">
                                                    <td><input type="text" class="form-control" name='kap_tangki_cpo'
                                                            onClick="this.select();" style="width:100%"
                                                            oninput=" validate_two_decimal(this);FormatCurrency(this)"
                                                            id="kap_tangki_cpo101" onkeypress="return point(event)"
                                                            title="Sila isikan butiran ini."
                                                            value="{{ number_format($pelesen->kap_tangki_cpo ?? 0) }}"
                                                            onchange="validation_jumlah2()">
                                                        <p type="hidden" id="err_kcpo"
                                                            style="color: red; display:none"><i>Sila isi
                                                                butiran di
                                                                bahagian ini!</i></p>
                                                    </td>
                                                    <td> <input type="text" class="form-control" name='kap_tangki_ppo'
                                                            onClick="this.select();" style="width:100%"
                                                            oninput="this.setCustomValidity(''); validate_two_decimal(this); FormatCurrency(this)"
                                                            id="kap_tangki_ppo101" onkeypress="return point(event)"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            title="Sila isikan butiran ini."
                                                            value="{{ number_format($pelesen->kap_tangki_ppo ?? 0) }}"
                                                            onchange="validation_jumlah2()">
                                                        <p type="hidden" id="err_kppo"
                                                            style="color: red; display:none"><i>Sila isi
                                                                butiran di
                                                                bahagian ini!</i></p>
                                                    </td>
                                                    <td> <input type="text" class="form-control"
                                                            name='kap_tangki_cpko' onClick="this.select();"
                                                            style="width:100%"
                                                            oninput="this.setCustomValidity(''); validate_two_decimal(this); FormatCurrency(this)"
                                                            id="kap_tangki_cpko101" onkeypress="return point(event)"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            title="Sila isikan butiran ini."
                                                            value="{{ number_format($pelesen->kap_tangki_cpko ?? 0) }}"
                                                            onchange="validation_jumlah2()">
                                                        <p type="hidden" id="err_kcpko"
                                                            style="color: red; display:none"><i>Sila isi
                                                                butiran di
                                                                bahagian ini!</i></p>
                                                    </td>
                                                    <td> <input type="text" class="form-control"
                                                            name='kap_tangki_ppko' onClick="this.select();"
                                                            style="width:100%"
                                                            oninput="this.setCustomValidity(''); validate_two_decimal(this); FormatCurrency(this)"
                                                            id="kap_tangki_ppko101" onkeypress="return point(event)"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            title="Sila isikan butiran ini."
                                                            value="{{ number_format($pelesen->kap_tangki_ppko ?? 0) }}"
                                                            onchange="validation_jumlah2()">
                                                        <p type="hidden" id="err_kppko"
                                                            style="color: red; display:none"><i>Sila isi
                                                                butiran di
                                                                bahagian ini!</i></p>
                                                    </td>
                                                    <td> <input type="text" class="form-control"
                                                            name='kap_tangki_others' min=0 onClick="this.select();"
                                                            style="width:100%"
                                                            oninput="this.setCustomValidity(''); validate_two_decimal(this); FormatCurrency(this)"
                                                            id="kap_tangki_others" onkeypress="return point(event)"
                                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                            title="Sila isikan butiran ini."
                                                            value="{{ number_format($pelesen->kap_tangki_others ?? 0) }}"
                                                            onchange="validation_jumlah2()">
                                                        <p type="hidden" id="err_others"
                                                            style="color: red; display:none"><i>Sila isi
                                                                butiran di
                                                                bahagian ini!</i></p>
                                                    </td>
                                                    <td style="font-size: 10pt; padding-top: 8px; padding-left: 8px">
                                                        <b><span id="kap_tangki_jumlah">
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
                                        <i style="margin-right:7%">Nota: Sekiranya kilang/pelesen tiada
                                            tangki simpanan khusus untuk sesuatu produk. Sila campurkan kesemua
                                            bilangan dan kapasiti tangki dan lapor dalam kategori Others
                                        </i>
                                    </div>

                            </div>
                        @elseif ($reg_pelesen->e_kat == 'PL102')
                            <div style="margin-left:-2%">

                                <div class="row mr-auto" style="margin:20px 0px">
                                    <div class="col-sm-4 form-group" style="margin: 0px">
                                        <span></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>CPKO</span>
                                    </div>
                                </div>

                                <div class="row mr-auto" style="margin:20px 0px">
                                    <div class="col-sm-4 form-group" style="margin: 0px">
                                        <label for="fname" class="control-label col-form-label ">
                                            Bilangan Tangki</label>
                                    </div>

                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name='bil_tangki_cpko'
                                            style="width:20%" onClick="this.select();" id="bil_tangki_cpko102"
                                            title="Sila isikan butiran ini."
                                            oninput="this.setCustomValidity(''); FormatCurrency(this)"
                                            onkeypress="return point(event)"
                                            value="{{ number_format($pelesen->bil_tangki_cpko ?? 0) }}">
                                        @error('bil_tangki_cpko')
                                            <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mr-auto" style="margin:20px 0px">
                                    <div class="col-sm-4 form-group" style="margin: 0px">
                                        <label for="fname" class="control-label col-form-label">
                                            Kapasiti Tangki Simpanan (Tan)</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name='kap_tangki_cpko'
                                            style="width:20%" id="kap_tangki_cpko102"
                                            oninput="this.setCustomValidity(''); validate_two_decimal(this);  FormatCurrency(this)"
                                            onClick="this.select();" title="Sila isikan butiran ini."
                                            onkeypress="return point(event)"
                                            value="{{ number_format($pelesen->kap_tangki_cpko ?? 0) }}" reuired>
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
                            </div>

                            <div class="row mx-3" style="margin-left:14%">
                                <i>Nota: Sekiranya kilang/pelesen tiada tangki simpanan
                                    khusus untuk sesuatu produk. Sila campurkan kesemua
                                    bilangan dan kapasiti tangki dan lapor dalam kategori Others
                                </i>
                            </div>
                            {{-- </div> --}}
                        @elseif ($reg_pelesen->e_kat == 'PL111' || $reg_pelesen->e_kat == 'PL104' || $reg_pelesen->e_kat == 'PLBIO')
                            <br>
                            <div class="row mr-auto" style="margin-left:-2%">
                                <div class="col-sm-4 form-group" style="margin: 0px">
                                    <span><br></span><label for="fname" class="control-label col-form-label ">
                                        Bilangan Tangki</label><br>
                                    <label for="fname" class="control-label col-form-label">
                                        Kapasiti Tangki Simpanan (Tan)</label>
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
                                                    style="width:100%" size="15" id="bil_tangki_cpo111"
                                                    title="Sila isikan butiran ini." onkeypress="return point(event)"
                                                    onClick="this.select();"
                                                    value="{{ number_format($pelesen->bil_tangki_cpo ?? 0) }}"
                                                    onchange="validation_jumlah3()"
                                                    oninput="this.setCustomValidity(''); FormatCurrency(this)">
                                                @error('bil_tangki_cpo')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name='bil_tangki_ppo'
                                                    size="15" onkeypress="return point(event)" style="width:100%"
                                                    id="bil_tangki_ppo111" title="Sila isikan butiran ini."
                                                    onClick="this.select();"
                                                    value="{{ number_format($pelesen->bil_tangki_ppo ?? 0) }}"
                                                    onchange="validation_jumlah3()"
                                                    oninput="this.setCustomValidity('');  FormatCurrency(this)">
                                                @error('bil_tangki_ppo')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name='bil_tangki_cpko'
                                                    size="15" onkeypress="return point(event)" style="width:100%"
                                                    id="bil_tangki_cpko111" title="Sila isikan butiran ini."
                                                    onClick="this.select();"
                                                    value="{{ number_format($pelesen->bil_tangki_cpko ?? 0) }}"
                                                    onchange="validation_jumlah3()"
                                                    oninput="this.setCustomValidity('');FormatCurrency(this)">
                                                @error('bil_tangki_cpko')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td> <input type="text" class="form-control" name='bil_tangki_ppko'
                                                    size="15" onkeypress="return point(event)" style="width:100%"
                                                    id="bil_tangki_ppko111" title="Sila isikan butiran ini."
                                                    onClick="this.select();"
                                                    value="{{ number_format($pelesen->bil_tangki_ppko ?? 0) }}"
                                                    onchange="validation_jumlah3()"
                                                    oninput="this.setCustomValidity(''); FormatCurrency(this)">
                                                @error('bil_tangki_ppko')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td><input type="text" class="form-control" name='bil_tangki_oleo'
                                                    size="15" onkeypress="return point(event)" style="width:100%"
                                                    id="bil_tangki_oleo111" title="Sila isikan butiran ini."
                                                    onClick="this.select();"
                                                    value="{{ number_format($pelesen->bil_tangki_oleo ?? 0) }}"
                                                    onchange="validation_jumlah3()"
                                                    oninput="this.setCustomValidity(''); FormatCurrency(this)">
                                                @error('bil_tangki_oleo')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td><input type="text" class="form-control" name='bil_tangki_others'
                                                    size="15" onkeypress="return point(event)" style="width:100%"
                                                    id="bil_tangki_others111" title="Sila isikan butiran ini."
                                                    onClick="this.select();"
                                                    value="{{ number_format($pelesen->bil_tangki_others ?? 0) }}"
                                                    onchange="validation_jumlah3()"
                                                    oninput="this.setCustomValidity('');FormatCurrency(this)">
                                                @error('bil_tangki_others')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td style="font-size: 10pt; padding-top: 8px; padding-left: 8px">
                                                <b>
                                                    <span id="bil_tangki_jumlah"
                                                        style="font-size: 10pt">{{ old('bil_tangki_jumlah') ?? number_format($jumlah3) }}</span>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr style="vertical-align: top">
                                            <td><input type="text" class="form-control" name='kap_tangki_cpo'
                                                    onkeypress="return point(event)" style="width:100%"
                                                    oninput="this.setCustomValidity(''); validate_two_decimal(this); FormatCurrency(this)"
                                                    onClick="this.select();" id="kap_tangki_cpo111"
                                                    onchange="validation_jumlah4()" title="Sila isikan butiran ini."
                                                    value="{{ number_format($pelesen->kap_tangki_cpo ?? 0) }}">
                                                <p type="hidden" id="err_kcpo" style="color: red; display:none">
                                                    <i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i>
                                                </p>
                                                @error('kap_tangki_cpo')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td> <input type="text" class="form-control" name='kap_tangki_ppo'
                                                    onkeypress="return point(event)"
                                                    oninput="this.setCustomValidity(''); validate_two_decimal(this); FormatCurrency(this)"
                                                    style="width:100%" id="kap_tangki_ppo111"
                                                    onchange="validation_jumlah4()" onClick="this.select();"
                                                    title="Sila isikan butiran ini."
                                                    value="{{ number_format($pelesen->kap_tangki_ppo ?? 0) }}">
                                                <p type="hidden" id="err_kppo" style="color: red; display:none">
                                                    <i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i>
                                                </p>
                                                @error('kap_tangki_ppo')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td> <input type="text" class="form-control" name='kap_tangki_cpko'
                                                    onkeypress="return point(event)" style="width:100%"
                                                    oninput="this.setCustomValidity(''); validate_two_decimal(this);FormatCurrency(this)"
                                                    onClick="this.select();" id="kap_tangki_cpko111"
                                                    onchange="validation_jumlah4()" title="Sila isikan butiran ini."
                                                    value="{{ number_format($pelesen->kap_tangki_cpko ?? 0) }}">
                                                <p type="hidden" id="err_kcpko" style="color: red; display:none">
                                                    <i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i>
                                                </p>
                                                @error('kap_tangki_cpko')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td> <input type="text" class="form-control" name='kap_tangki_ppko'
                                                    onkeypress="return point(event)" style="width:100%"
                                                    oninput="this.setCustomValidity(''); validate_two_decimal(this);FormatCurrency(this)"
                                                    id="kap_tangki_ppko111" onchange="validation_jumlah4()"
                                                    onClick="this.select();" title="Sila isikan butiran ini."
                                                    value="{{ number_format($pelesen->kap_tangki_ppko ?? 0) }}">
                                                <p type="hidden" id="err_kppko" style="color: red; display:none">
                                                    <i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i>
                                                </p>
                                                @error('kap_tangki_ppko')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td> <input type="text" class="form-control" name='kap_tangki_oleo'
                                                    onkeypress="return point(event)" style="width:100%"
                                                    oninput="this.setCustomValidity(''); validate_two_decimal(this); FormatCurrency(this)"
                                                    id="kap_tangki_oleo111" onchange="validation_jumlah4()"
                                                    onClick="this.select();" title="Sila isikan butiran ini."
                                                    value="{{ number_format($pelesen->kap_tangki_oleo ?? 0) }}">
                                                <p type="hidden" id="err_koleo" style="color: red; display:none">
                                                    <i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i>
                                                </p>
                                                @error('kap_tangki_oleo')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td><input type="text" class="form-control" name='kap_tangki_others'
                                                    onkeypress="return point(event)" style="width:100%"
                                                    oninput="this.setCustomValidity(''); validate_two_decimal(this); FormatCurrency(this)"
                                                    id="kap_tangki_others111" onchange="validation_jumlah4()"
                                                    onClick="this.select();" title="Sila isikan butiran ini."
                                                    value="{{ number_format($pelesen->kap_tangki_others ?? 0) }}">
                                                <p type="hidden" id="err_others" style="color: red; display:none">
                                                    <i>Sila isi
                                                        butiran di
                                                        bahagian ini!</i>
                                                </p>
                                                @error('kap_tangki_others')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td style="font-size: 10pt; padding-top: 8px; padding-left: 8px"> <b><span
                                                        id="kap_tangki_jumlah">
                                                        {{ old('kap_tangki_jumlah') ?? number_format($jumlah4) }}
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
                            @endif



                        </div>

                        <div class="button-group text-center" style="margin-top: 2%;">
                            <button type="button" class="btn btn-primary" id="checkBtn" onclick="check();">Simpan
                            </button>

                            <a href="{{ route('admin.cetak.surat', $reg_pelesen->e_id) }}"
                                class="btn btn-primary">Cetak Surat
                            </a>
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
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    {{-- ajax daerah --}}

    <script>
        function point(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            console.log(charCode);
            if (charCode == 46)
                return false;

            else if (charCode != 45 && charCode > 31 && charCode > 57)
                return false;

            return true;


        }
    </script>
    <script>
        function nodecimal(data) {
            // let decimal = ".00"
            var x = data.value;
            if (isNaN(x)) {
                x = 0;
            }
            const removedDecimal = Math.round(x);
            data.value = removedDecimal;
            console.log(removedDecimal);
        }
    </script>
    <script>
        $(document).ready(function() {
            var biogas = document.getElementById('e_biogas');

            if (biogas.value == '1') {
                document.getElementById('biogas').style.display = "block";

            } else {
                document.getElementById('biogas').style.display = "none";

            }
        });
    </script>
    <script>
        function biogas() {
            var biogas = document.getElementById('e_biogas');

            if (biogas.value == '1') {
                document.getElementById('biogas').style.display = "block";

            } else {
                document.getElementById('biogas').style.display = "none";
                document.getElementById('e_status_biogas').value = null;


            }

        }
    </script>
    <script>
        $('.sub-form').submit(function() {

            var x = $('#kap_proses').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_proses').val(x);

            var x = $('#kap_tangki_cpo91').val();
            x = x.replace(/,/g, '');

            var x = $('#bil_tangki_cpo91').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_cpo91').val(x);

            var x = $('#kap_tangki_cpo91').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_cpo91').val(x);


            var x = $('#bil_tangki_cpko102').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_cpko102').val(x);

            var x = $('#kap_tangki_cpko102').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_cpko102').val(x);


            var x = $('#bil_tangki_cpo101').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_cpo101').val(x);

            var x = $('#kap_tangki_cpo101').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_cpo101').val(x);



            var x = $('#bil_tangki_ppo101').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_ppo101').val(x);

            var x = $('#kap_tangki_ppo101').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_ppo101').val(x);



            var x = $('#bil_tangki_cpko101').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_cpko101').val(x);

            var x = $('#kap_tangki_cpko101').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_cpko101').val(x);



            var x = $('#bil_tangki_ppko101').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_ppko101').val(x);

            var x = $('#kap_tangki_ppko101').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_ppko101').val(x);



            var x = $('#bil_tangki_others101').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_others101').val(x);

            var x = $('#kap_tangki_others101').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_others101').val(x);




            var x = $('#bil_tangki_cpo111').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_cpo111').val(x);

            var x = $('#kap_tangki_cpo111').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_cpo111').val(x);



            var x = $('#bil_tangki_ppo111').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_ppo111').val(x);

            var x = $('#kap_tangki_ppo111').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_ppo111').val(x);



            var x = $('#bil_tangki_cpko111').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_cpko111').val(x);

            var x = $('#kap_tangki_cpko111').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_cpko111').val(x);



            var x = $('#bil_tangki_ppko111').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_ppko111').val(x);

            var x = $('#kap_tangki_ppko111').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_ppko111').val(x);



            var x = $('#bil_tangki_oleo111').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_oleo111').val(x);

            var x = $('#kap_tangki_oleo111').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_oleo111').val(x);

            var x = $('#bil_tangki_others111').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#bil_tangki_others111').val(x);

            var x = $('#kap_tangki_others111').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#kap_tangki_others111').val(x);



            return true;

        });
    </script>
    <script>
        $("#e_year").keypress(function(event) {
            if (event.which == 45) {
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
    {{--
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
    </script> --}}

    <script>
        function validation_jumlah() {
            var bil_tangki_cpo = document.getElementById('bil_tangki_cpo101');
            var bcpo = bil_tangki_cpo.value.replace(/,/g, '');
            var bil_tangki_ppo = document.getElementById('bil_tangki_ppo101');
            var bppo = bil_tangki_ppo.value.replace(/,/g, '');
            var bil_tangki_cpko = document.getElementById('bil_tangki_cpko101');
            var bcpko = bil_tangki_cpko.value.replace(/,/g, '');
            var bil_tangki_ppko = document.getElementById('bil_tangki_ppko101');
            var bppko = bil_tangki_ppko.value.replace(/,/g, '');
            // var bil_tangki_ppko = document.getElementById('bil_tangki_oleo');
            // var boleo = bil_tangki_oleo.value.replace(/,/g, '');
            var bil_tangki_others = document.getElementById('bil_tangki_others101');
            var bothers = bil_tangki_others.value.replace(/,/g, '');


            var jumlah = $("#jumlah").val();
            var jumlah_input = 0;

            jumlah_input = parseFloat(Number(bcpo)) + parseFloat(Number(bppo)) +
                parseFloat(Number(bcpko)) + parseFloat(Number(bppko)) + parseFloat(Number(bothers));

            document.getElementById('bil_tangki_jumlah').innerHTML = (jumlah_input).toString().replace(
                /\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
    <script>
        function validation_jumlah2() {
            var kap_tangki_cpo = document.getElementById('kap_tangki_cpo101');
            var kcpo = kap_tangki_cpo.value.replace(/,/g, '');

            var kap_tangki_ppo = document.getElementById('kap_tangki_ppo101');
            var kppo = kap_tangki_ppo.value.replace(/,/g, '');

            var kap_tangki_cpko = document.getElementById('kap_tangki_cpko101');
            var kcpko = kap_tangki_cpko.value.replace(/,/g, '');

            var kap_tangki_ppko = document.getElementById('kap_tangki_ppko101');
            var kppko = kap_tangki_ppko.value.replace(/,/g, '');

            // var kap_tangki_oleo = document.getElementById('kap_tangki_oleo');
            // var koleo = kap_tangki_oleo.value.replace(/,/g, '');

            var kap_tangki_others = document.getElementById('kap_tangki_others');
            var kothers = kap_tangki_others.value.replace(/,/g, '');


            var jumlah = $("#jumlah2").val();
            var jumlah_input = 0;

            jumlah_input = parseFloat(Number(kcpo)) + parseFloat(Number(kppo)) +
                parseFloat(Number(kcpko)) + parseFloat(Number(kppko)) + parseFloat(Number(kothers));

            document.getElementById('kap_tangki_jumlah').innerHTML = (jumlah_input).toString().replace(
                /\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
    {{-- <script>
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
    </script> --}}

    <script>
        function validation_jumlah3() {
            var bil_tangki_cpo = document.getElementById('bil_tangki_cpo111');
            var bcpo = bil_tangki_cpo.value.replace(/,/g, '');
            var bil_tangki_ppo = document.getElementById('bil_tangki_ppo111');
            var bppo = bil_tangki_ppo.value.replace(/,/g, '');
            var bil_tangki_cpko = document.getElementById('bil_tangki_cpko111');
            var bcpko = bil_tangki_cpko.value.replace(/,/g, '');
            var bil_tangki_ppko = document.getElementById('bil_tangki_ppko111');
            var bppko = bil_tangki_ppko.value.replace(/,/g, '');
            var bil_tangki_oleo = document.getElementById('bil_tangki_oleo111');
            var boleo = bil_tangki_oleo.value.replace(/,/g, '');
            var bil_tangki_others = document.getElementById('bil_tangki_others111');
            var bothers = bil_tangki_others.value.replace(/,/g, '');


            var jumlah = $("#jumlah3").val();
            var jumlah_input = 0;

            jumlah_input = parseFloat(Number(bcpo)) + parseFloat(Number(bppo)) + parseFloat(Number(boleo)) +
                parseFloat(Number(bcpko)) + parseFloat(Number(bppko)) + parseFloat(Number(bothers));

            document.getElementById('bil_tangki_jumlah').innerHTML = (jumlah_input).toString().replace(
                /\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>

    <script>
        function validation_jumlah4() {
            var kap_tangki_cpo = document.getElementById('kap_tangki_cpo111');
            var kcpo = kap_tangki_cpo.value.replace(/,/g, '');

            var kap_tangki_ppo = document.getElementById('kap_tangki_ppo111');
            var kppo = kap_tangki_ppo.value.replace(/,/g, '');

            var kap_tangki_cpko = document.getElementById('kap_tangki_cpko111');
            var kcpko = kap_tangki_cpko.value.replace(/,/g, '');

            var kap_tangki_ppko = document.getElementById('kap_tangki_ppko111');
            var kppko = kap_tangki_ppko.value.replace(/,/g, '');

            var kap_tangki_oleo = document.getElementById('kap_tangki_oleo111');
            var koleo = kap_tangki_oleo.value.replace(/,/g, '');

            var kap_tangki_others = document.getElementById('kap_tangki_others111');
            var kothers = kap_tangki_others.value.replace(/,/g, '');


            var jumlah = $("#jumlah4").val();
            var jumlah_input = 0;

            jumlah_input = parseFloat(Number(kcpo)) + parseFloat(Number(kppo)) + parseFloat(Number(koleo)) +
                parseFloat(Number(kcpko)) + parseFloat(Number(kppko)) + parseFloat(Number(kothers));

            document.getElementById('kap_tangki_jumlah').innerHTML = (jumlah_input).toString().replace(
                /\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>

    <script>
        function valid_siri() {

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
        function valid_biogas() {

            if ($('#e_biogas').val() == '') {
                $('#e_biogas').css('border-color', 'red');
                document.getElementById('err_biogas').style.display = "block";


            } else {
                $('#e_biogas').css('border-color', '');
                document.getElementById('err_biogas').style.display = "none";

            }

        }
    </script>
    <script>
        function biogas() {
            var biogas = document.getElementById('e_biogas');
            console.log(biogas.value);

            if (biogas.value == '1') {
                document.getElementById('biogas').style.display = "block";

            } else {
                document.getElementById('biogas').style.display = "none";
                document.getElementById('e_status_biogas').value = null;


            }

        }
    </script>
    <script>
        function valid_statusbiogas() {
            var biogas = document.getElementById('e_biogas');
            console.log(biogas.value);

            if (biogas.value == '1') {
                if ($('#e_status_biogas').val() == '') {
                    $('#e_status_biogas').css('border-color', 'red');
                    document.getElementById('err_biogas2').style.display = "block";


                } else {
                    $('#e_status_biogas').css('border-color', '');
                    document.getElementById('err_biogas2').style.display = "none";

                }

            }
        }
    </script>
    {{-- <script>
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
    </script> --}}

    {{-- <script>
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
    </script> --}}

    {{-- <script>
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
    </script> --}}

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

    {{-- <script>
        function valid_proses() {

            if ($('#kap_proses').val() == '') {
                $('#kap_proses').css('border-color', 'red');
                document.getElementById('err_proses').style.display = "block";


            } else {
                $('#kap_proses').css('border-color', '');
                document.getElementById('err_proses').style.display = "none";

            }

        }
    </script> --}}
    {{-- <script>
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
    </script> --}}


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


            @if ($reg_pelesen->e_kat == 'PL91')
                //    POMA
                field = document.getElementById("e_poma");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters e_poma\r\n";
                    $('#e_poma').css('border-color', 'red');
                    document.getElementById('err_poma').style.display = "block";
                }
                field = document.getElementById("e_biogas");
                if (!field.checkValidity()) {
                    error += "Name must be 2-4 characters e_poma\r\n";
                    $('#e_biogas').css('border-color', 'red');
                    document.getElementById('err_biogas').style.display = "block";
                }

                var biogas = document.getElementById('e_biogas');
                console.log(biogas.value);

                if (biogas.value == '1') {
                    if ($('#e_status_biogas').val() == '') {
                        error += "Name must be 2-4 characters e_poma\r\n";

                        $('#e_status_biogas').css('border-color', 'red');
                        document.getElementById('err_biogas2').style.display = "block";


                    }
                }
            @endif

            //     cpo = $('#bil_tangki_cpo').val();
            //     kcpo = $('#kap_tangki_cpo').val();

            //     if (cpo != 0 && kcpo == 0) {
            //         // $('#next').modal('hide');
            //         error += "Name must be 2-4 characters\r\n";
            //         $('#kap_tangki_cpo').css('border-color', 'red');
            //         document.getElementById('err_kcpo').style.display = "block";
            //     }
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
    @if ($reg_pelesen->e_kat == 'PL111' || $reg_pelesen->e_kat == 'PL104' || $reg_pelesen->e_kat == 'PLBIO')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#checkBtn').click(function() {
                    b5 = $('#kap_proses').val();
                    bcpo111 = $('#bil_tangki_cpo111').val();
                    kcpo111 = $('#kap_tangki_cpo111').val();

                    bppo111 = $('#bil_tangki_ppo111').val();
                    kppo111 = $('#kap_tangki_ppo111').val();

                    bcpko111 = $('#bil_tangki_cpko111').val();
                    kcpko111 = $('#kap_tangki_cpko111').val();

                    bppko111 = $('#bil_tangki_ppko111').val();
                    kppko111 = $('#kap_tangki_ppko111').val();

                    boleo111 = $('#bil_tangki_oleo111').val();
                    koleo111 = $('#kap_tangki_oleo111').val();

                    bothers111 = $('#bil_tangki_others111').val();
                    kothers111 = $('#kap_tangki_others111').val();



                    let x5 = b5;
                    if (x5 == '') {
                        x5 = x5 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }


                    let xbcpo111 = bcpo111;
                    if (xbcpo111 == '') {
                        xbcpo111 = xbcpo111 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xkcpo111 = kcpo111;
                    if (xkcpo111 == '') {
                        xkcpo111 = xkcpo111 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xbppo111 = bppo111;
                    if (xbppo111 == '') {
                        xbppo111 = xbppo111 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xkppo111 = kppo111;
                    if (xkppo111 == '') {
                        xkppo111 = xkppo111 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }

                    let xbcpko111 = bcpko111;
                    if (xbcpko111 == '') {
                        xbcpko111 = xbcpko111 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xkcpko111 = kcpko111;
                    if (xkcpko111 == '') {
                        xkcpko111 = xkcpko111 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xbppko111 = bppko111;
                    if (xbppko111 == '') {
                        xbppko111 = xbppko111 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xkppko111 = kppko111;
                    if (xkppko111 == '') {
                        xkppko111 = xkppko111 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xbothers111 = bothers111;
                    if (xbothers111 == '') {
                        xbothers111 = xbothers111 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xkothers111 = kothers111;
                    if (xkothers111 == '') {
                        xkothers111 = xkothers111 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xboleo111 = boleo111;
                    if (xboleo111 == '') {
                        xboleo111 = xboleo111 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xkoleo111 = koleo111;
                    if (xkoleo111 == '') {
                        xkoleo111 = xkoleo111 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }


                    document.getElementById("kap_proses").value = x5;
                    document.getElementById("bil_tangki_cpo111").value = xbcpo111;
                    document.getElementById("kap_tangki_cpo111").value = xkcpo111;
                    document.getElementById("bil_tangki_ppo111").value = xbppo111;
                    document.getElementById("kap_tangki_ppo111").value = xkppo111;
                    document.getElementById("bil_tangki_cpko111").value = xbcpko111;
                    document.getElementById("kap_tangki_cpko111").value = xkcpko111;
                    document.getElementById("bil_tangki_ppko111").value = xbppko111;
                    document.getElementById("kap_tangki_ppko111").value = xkppko111;
                    document.getElementById("bil_tangki_others111").value = xbothers111;
                    document.getElementById("kap_tangki_others111").value = xkothers111;
                    document.getElementById("bil_tangki_oleo111").value = xboleo111;
                    document.getElementById("kap_tangki_oleo111").value = xkoleo111;


                });
            });
        </script>
    @elseif ($reg_pelesen->e_kat == 'PL102')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#checkBtn').click(function() {
                    b5 = $('#kap_proses').val();
                    kcpko102 = $('#kap_tangki_cpko102').val();
                    bcpko102 = $('#bil_tangki_cpko102').val();

                    let x5 = b5;
                    if (x5 == '') {
                        x5 = x5 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xkcpko102 = kcpko102;
                    if (xkcpko102 == '') {
                        xkcpko102 = xkcpko102 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xbcpko102 = bcpko102;
                    if (xbcpko102 == '') {
                        xbcpko102 = xbcpko102 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }


                    document.getElementById("kap_proses").value = x5;
                    document.getElementById("kap_tangki_cpko102").value = xkcpko102;
                    document.getElementById("bil_tangki_cpko102").value = xbcpko102;

                });
            });
        </script>
    @elseif ($reg_pelesen->e_kat == 'PL101')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#checkBtn').click(function() {
                    b5 = $('#kap_proses').val();
                    bcpo101 = $('#bil_tangki_cpo101').val();
                    kcpo101 = $('#kap_tangki_cpo101').val();
                    bppo101 = $('#bil_tangki_ppo101').val();
                    kppo101 = $('#kap_tangki_ppo101').val();
                    bcpko101 = $('#bil_tangki_cpko101').val();
                    kcpko101 = $('#kap_tangki_cpko101').val();
                    bcpko101 = $('#bil_tangki_ppko101').val();
                    kcpko101 = $('#kap_tangki_ppko101').val();
                    bothers101 = $('#bil_tangki_others101').val();
                    kothers101 = $('#kap_tangki_others101').val();


                    let x5 = b5;
                    if (x5 == '') {
                        x5 = x5 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }

                    let xbcpo101 = bcpo101;
                    if (xbcpo101 == '') {
                        xbcpo101 = xbcpo101 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xkcpo101 = kcpo101;
                    if (xkcpo101 == '') {
                        xkcpo101 = xkcpo101 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xbppo101 = bppo101;
                    if (xbppo101 == '') {
                        xbppo101 = xbppo101 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xkppo101 = kppo101;
                    if (xkppo101 == '') {
                        xkppo101 = xkppo101 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }

                    let xbcpko101 = bcpko101;
                    if (xbcpko101 == '') {
                        xbcpko101 = xbcpko101 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xkcpko101 = kcpko101;
                    if (xkcpko101 == '') {
                        xkcpko101 = xkcpko101 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xbppko101 = bppko101;
                    if (xbppko101 == '') {
                        xbppko101 = xbppko101 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xkppko101 = kppko101;
                    if (xkppko101 == '') {
                        xkppko101 = xkppko101 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xbothers101 = bothers101;
                    if (xbothers101 == '') {
                        xbothers101 = xbothers101 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let xkothers101 = kothers101;
                    if (xkothers101 == '') {
                        xkothers101 = xkothers101 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }


                    document.getElementById("kap_proses").value = x5;
                    document.getElementById("bil_tangki_cpo101").value = xbcpo101;
                    document.getElementById("kap_tangki_cpo101").value = xkcpo101;
                    document.getElementById("bil_tangki_ppo101").value = xbppo101;
                    document.getElementById("kap_tangki_ppo101").value = xkppo101;
                    document.getElementById("bil_tangki_cpko101").value = xbcpko101;
                    document.getElementById("kap_tangki_cpko101").value = xkcpko101;
                    document.getElementById("bil_tangki_ppko101").value = xbppko101;
                    document.getElementById("kap_tangki_ppko101").value = xkppko101;
                    document.getElementById("bil_tangki_others101").value = xbothers101;
                    document.getElementById("kap_tangki_others101").value = xkothers101;

                });
            });
        </script>
    @elseif ($reg_pelesen->e_kat == 'PL91')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#checkBtn').click(function() {
                    b5 = $('#kap_proses').val();
                    b6 = $('#kap_tangki_cpo91').val();
                    b7 = $('#bil_tangki_cpo91').val();


                    let x5 = b5;
                    if (x5 == '') {
                        x5 = x5 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let x6 = b6;
                    if (x6 == '') {
                        x6 = x6 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }
                    let x7 = b7;
                    if (x7 == '') {
                        x7 = x7 || 0;
                        // document.getElementById("ebio_b5").value = x;
                    }



                    document.getElementById("kap_proses").value = x5;
                    document.getElementById("kap_tangki_cpo91").value = x6;
                    document.getElementById("bil_tangki_cpo91").value = x7;


                });
            });
        </script>
    @endif
    {{-- <script type="text/javascript">
    $(document).ready(function() {
        $('#checkBtn').click(function() {
            b5 = $('#kap_proses').val();
            b6 = $('#kap_tangki_cpo91').val();
            b7 = $('#bil_tangki_cpo91').val();

            kcpko102 = $('#kap_tangki_cpko102').val();
            bcpko102 = $('#bil_tangki_cpko102').val();


            bcpo101 = $('#bil_tangki_cpo101').val();
            kcpo101 = $('#kap_tangki_cpo101').val();
            bppo101 = $('#bil_tangki_ppo101').val();
            kppo101 = $('#kap_tangki_ppo101').val();
            bcpko101 = $('#bil_tangki_cpko101').val();
            kcpko101 = $('#kap_tangki_cpko101').val();
            bcpko101 = $('#bil_tangki_ppko101').val();
            kcpko101 = $('#kap_tangki_ppko101').val();
            bothers101 = $('#bil_tangki_others101').val();
            kothers101 = $('#kap_tangki_others101').val();

            bcpo111 = $('#bil_tangki_cpo111').val();
            kcpo111 = $('#kap_tangki_cpo111').val();
            bppo111 = $('#bil_tangki_ppo111').val();
            kppo111 = $('#kap_tangki_ppo111').val();
            bcpko111 = $('#bil_tangki_cpko111').val();
            kcpko111 = $('#kap_tangki_cpko111').val();
            bcpko111 = $('#bil_tangki_ppko111').val();
            kcpko111 = $('#kap_tangki_ppko111').val();
            boleo111 = $('#bil_tangki_oleo111').val();
            koleo111 = $('#kap_tangki_oleo111').val();
            bothers111 = $('#bil_tangki_others111').val();
            kothers111 = $('#kap_tangki_others111').val();



            let x5 = b5;
            if (x5 == '') {
                x5 = x5 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let x6 = b6;
            if (x6 == '') {
                x6 = x6 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let x7 = b7;
            if (x7 == '') {
                x7 = x7 || 0;
                // document.getElementById("ebio_b5").value = x;
            }


            let xkcpko102 = kcpko102;
            if (xkcpko102 == '') {
                xkcpko102 = xkcpko102 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xbcpko102 = bcpko102;
            if (xbcpko102 == '') {
                xbcpko102 = xbcpko102 || 0;
                // document.getElementById("ebio_b5").value = x;
            }

            let xbcpo101 = bcpo101;
            if (xbcpo101 == '') {
                xbcpo101 = xbcpo101 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xkcpo101 = kcpo101;
            if (xkcpo101 == '') {
                xkcpo101 = xkcpo101 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xbppo101 = bppo101;
            if (xbppo101 == '') {
                xbppo101 = xbppo101 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xkppo101 = kppo101;
            if (xkppo101 == '') {
                xkppo101 = xkppo101 || 0;
                // document.getElementById("ebio_b5").value = x;
            }

            let xbcpko101 = bcpko101;
            if (xbcpko101 == '') {
                xbcpko101 = xbcpko101 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xkcpko101 = kcpko101;
            if (xkcpko101 == '') {
                xkcpko101 = xkcpko101 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xbppko101 = bppko101;
            if (xbppko101 == '') {
                xbppko101 = xbppko101 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xkppko101 = kppko101;
            if (xkppko101 == '') {
                xkppko101 = xkppko101 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xbothers101 = bothers101;
            if (xbothers101 == '') {
                xbothers101 = xbothers101 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xkothers101 = kothers101;
            if (xkothers101 == '') {
                xkothers101 = xkothers101 || 0;
                // document.getElementById("ebio_b5").value = x;
            }

            let xbcpo111 = bcpo111;
            if (xbcpo111 == '') {
                xbcpo111 = xbcpo111 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xkcpo111 = kcpo111;
            if (xkcpo111 == '') {
                xkcpo111 = xkcpo111 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xbppo111 = bppo111;
            if (xbppo111 == '') {
                xbppo111 = xbppo111 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xkppo111 = kppo111;
            if (xkppo111 == '') {
                xkppo111 = xkppo111 || 0;
                // document.getElementById("ebio_b5").value = x;
            }

            let xbcpko111 = bcpko111;
            if (xbcpko111 == '') {
                xbcpko111 = xbcpko111 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xkcpko111 = kcpko111;
            if (xkcpko111 == '') {
                xkcpko111 = xkcpko111 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xbppko111 = bppko111;
            if (xbppko111 == '') {
                xbppko111 = xbppko111 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xkppko111 = kppko111;
            if (xkppko111 == '') {
                xkppko111 = xkppko111 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xbothers111 = bothers111;
            if (xbothers111 == '') {
                xbothers111 = xbothers111 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xkothers111 = kothers111;
            if (xkothers111 == '') {
                xkothers111 = xkothers111 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xboleo111 = boleo111;
            if (xboleo111 == '') {
                xboleo111 = xboleo111 || 0;
                // document.getElementById("ebio_b5").value = x;
            }
            let xkoleo111 = koleo111;
            if (xkoleo111 == '') {
                xkoleo111 = xkoleo111 || 0;
                // document.getElementById("ebio_b5").value = x;
            }


            document.getElementById("kap_proses").value = x5;
            document.getElementById("kap_tangki_cpo91").value = x6;
            document.getElementById("bil_tangki_cpo91").value = x7;

            document.getElementById("kap_tangki_cpko102").value = xkcpko102;
            document.getElementById("bil_tangki_cpko102").value = xbcpko102;

            document.getElementById("bil_tangki_cpo101").value = xbcpo101;
            document.getElementById("kap_tangki_cpo101").value = xkcpo101;
            document.getElementById("bil_tangki_ppo101").value = xbppo101;
            document.getElementById("kap_tangki_ppo101").value = xkppo101;
            document.getElementById("bil_tangki_cpko101").value = xbcpko101;
            document.getElementById("kap_tangki_cpko101").value = xkcpko101;
            document.getElementById("bil_tangki_ppko101").value = xbppko101;
            document.getElementById("kap_tangki_ppko101").value = xkppko101;
            document.getElementById("bil_tangki_others101").value = xbothers101;
            document.getElementById("kap_tangki_others101").value = xkothers101;

            document.getElementById("bil_tangki_cpo111").value = xbcpo111;
            document.getElementById("kap_tangki_cpo111").value = xkcpo111;
            document.getElementById("bil_tangki_ppo111").value = xbppo111;
            document.getElementById("kap_tangki_ppo111").value = xkppo111;
            document.getElementById("bil_tangki_cpko111").value = xbcpko111;
            document.getElementById("kap_tangki_cpko111").value = xkcpko111;
            document.getElementById("bil_tangki_ppko111").value = xbppko111;
            document.getElementById("kap_tangki_ppko111").value = xkppko111;
            document.getElementById("bil_tangki_others111").value = xbothers111;
            document.getElementById("kap_tangki_others111").value = xkothers111;
            document.getElementById("bil_tangki_oleo111").value = xboleo111;
            document.getElementById("kap_tangki_oleo111").value = xkoleo111;


        });
    });
</script> --}}

    <script>
        $("#kap_proses").keypress(function(event) {
            if (event.which == 45) {
                event.preventDefault();
            }
        });

        $("#bil_tangki_cpo").keypress(function(event) {
            if (event.which == 45) {
                event.preventDefault();
            }
        });

        $("#kap_tangki_cpo").keypress(function(event) {
            if (event.which == 45) {
                event.preventDefault();
            }
        });

        $("#bil_tangki_ppo").keypress(function(event) {
            if (event.which == 45) {
                event.preventDefault();
            }
        });

        $("#kap_tangki_ppo").keypress(function(event) {
            if (event.which == 45) {
                event.preventDefault();
            }
        });

        $("#bil_tangki_cpko").keypress(function(event) {
            if (event.which == 45) {
                event.preventDefault();
            }
        });

        $("#kap_tangki_cpko").keypress(function(event) {
            if (event.which == 45) {
                event.preventDefault();
            }
        });

        $("#bil_tangki_ppko").keypress(function(event) {
            if (event.which == 45) {
                event.preventDefault();
            }
        });

        $("#kap_tangki_ppko").keypress(function(event) {
            if (event.which == 45) {
                event.preventDefault();
            }
        });

        $("#bil_tangki_oleo").keypress(function(event) {
            if (event.which == 45) {
                event.preventDefault();
            }
        });

        $("#kap_tangki_oleo").keypress(function(event) {
            if (event.which == 45) {
                event.preventDefault();
            }
        });

        $("#bil_tangki_others").keypress(function(event) {
            if (event.which == 45) {
                event.preventDefault();
            }
        });

        $("#kap_tangki_others").keypress(function(event) {
            if (event.which == 45) {
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
