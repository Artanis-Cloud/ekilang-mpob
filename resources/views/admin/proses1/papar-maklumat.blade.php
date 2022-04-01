@extends($layout)

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos-delay="100">


            <div class="mt-2 mb-4 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="margin-left:25%; color:rgb(255, 255, 255); background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-6 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: rgb(64, 69, 68) !important;"
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
                    <div class="card" style="margin-right:10%; margin-left:10%">
                        {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">

                                    <div class=" text-center">
                                        <h4 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h4>
                                    </div>
                                    <hr>
                                    {{-- <form action="{{ route('admin.1daftarpelesen.proses') }}" method="post">
                                        @csrf --}}
                                        <div class="container center mt-5">

                                            <div class="row" style="margin-top:-2%">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Jenis Kilang</label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="jenis_kilang">
                                                            <option selected hidden disabled>Sila Pilih Kilang</option>
                                                            <option value="PL91">Kilang Buah</option>
                                                            <option value="PL101">Kilang Penapis</option>
                                                            <option value="PL102">Kilang Isirung</option>
                                                            <option value="PL104">Kilang Oleokimia</option>
                                                            <option value="PL111">Pusat Simpanan</option>
                                                            <option value="PLBIO">Kilang Biodiesel</option>
                                                        </select>
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                                <div class="alert alert-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Status e-Kilang </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect"
                                                            name="status_ekilang">
                                                            <option selected hidden disabled>Aktif</option>
                                                            <option value="1">Aktif</option>
                                                            <option value="2">Tidak Aktif</option>
                                                        </select>
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                                <div class="alert alert-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror --}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label align-items-center">
                                                    Status E-Mingguan </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect"
                                                            name="status_emingguan">
                                                            <option selected hidden disabled>Aktif</option>
                                                            <option value="1">Aktif</option>
                                                            <option value="2">Tidak Aktif</option>
                                                        </select>
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                                <div class="alert alert-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror --}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Status Direktori </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect"
                                                            name="status_direktori">
                                                            <option selected hidden disabled>Ya</option>
                                                            <option value="Y">Ya</option>
                                                            <option value="N">Tidak</option>
                                                        </select>
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                                <div class="alert alert-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror --}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Kod Negeri </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="kodpgw">
                                                            <option selected hidden disabled>{{ $pelesen->kodpgw }}</option>
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
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                                <div class="alert alert-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror --}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Nombor Siri</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="nosiri" class="form-control"
                                                        placeholder="Nombor Siri" name="nosiri"
                                                        value="{{ $pelesen->nosiri ?? '' }}">
                                                    @error('nombor_siri')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Nombor Lesen</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_nl" class="form-control"
                                                        placeholder="Nombor Lesen" name="e_nl"
                                                        value="{{ $pelesen->e_nl }}">
                                                    @error('nombor_lesen')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row" style="margin-bottom:2.5%">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Nama Premis</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_np" class="form-control"
                                                        placeholder="Nama Premis" name="e_np"
                                                        value="{{ $pelesen->e_np }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>


                                            <div class="row" style="margin-bottom:2.5%;">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label align-items-center">
                                                    Alamat Premis Berlesen</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_ap1" class="form-control"
                                                        placeholder="Alamat Premis 1" name="e_ap1"
                                                        value="{{ $pelesen->e_ap1 }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div class="col-md-6" style="margin-left: 41.6%">
                                                    <input type="text" id="e_ap2" class="form-control"
                                                        placeholder="Alamat Premis 2" name="e_ap2"
                                                        value="{{ $pelesen->e_ap2 }}">
                                                </div>
                                                <div class="col-md-6" style="margin-left: 41.6%">
                                                    <input type="text" id="e_ap3" class="form-control"
                                                        placeholder="Alamat Premis 3" name="e_ap3"
                                                        value="{{ $pelesen->e_ap3 }}">
                                                </div>
                                            </div>

                                            <div class="row" style="margin-bottom:2.5%">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Alamat Surat Menyurat</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_as1" class="form-control"
                                                        placeholder="Alamat Surat Menyurat 1" name="e_as1"
                                                        value="{{ $pelesen->e_as1 }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div class="col-md-6" style="margin-left: 41.6%">
                                                    <input type="text" id="e_as2" class="form-control"
                                                        placeholder="Alamat Surat Menyurat 2" name="e_as2"
                                                        value="{{ $pelesen->e_as2 }}">
                                                </div>
                                                <div class="col-md-6" style="margin-left: 41.6%">
                                                    <input type="text" id="e_as3" class="form-control"
                                                        placeholder="Alamat Surat Menyurat 3" name="e_as3"
                                                        value="{{ $pelesen->e_as3 }}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    No. Telefon Kilang</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_notel" class="form-control"
                                                        placeholder="No. Telefon Kilang" name="e_notel"
                                                        value="{{ $pelesen->e_notel }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    No. Faks Kilang</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_nofax" class="form-control"
                                                        placeholder="No. Faks Kilang" name="e_nofax"
                                                        value="{{ $pelesen->nofax ?? ''}}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Alamat Emel Kilang</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_email" class="form-control"
                                                        placeholder="Alamat Emel Kilang" name="e_email"
                                                        value="{{ $pelesen->e_email }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Nama Pegawai Melapor</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_npg" class="form-control"
                                                        placeholder="Nama Pegawai Melapor" name="e_npg"
                                                        value="{{ $pelesen->e_npg }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Jawatan Pegawai Melapor</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_jpg" class="form-control"
                                                        placeholder="Jawatan Pegawai Melapor" name="e_jpg"
                                                        value="{{ $pelesen->e_jpg }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    No. Telefon Pegawai Melapor</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_notel_pg" class="form-control"
                                                        placeholder="No. Telefon Pegawai Melapor" name="e_notel_pg"
                                                        value="{{ $pelesen->e_notel_pg }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Nama Pegawai Bertanggungjawab</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_npgtg" class="form-control"
                                                        placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                                        value="{{ $pelesen->e_npgtg }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Jawatan Pegawai Bertanggungjawab</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_jpgtg" class="form-control"
                                                        placeholder="Jawatan Pegawai Bertanggungjawab"
                                                        name="e_jpgtg"
                                                        value="{{ $pelesen->e_jpgtg }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Alamat Emel Pengurus</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_email_pengurus" class="form-control"
                                                        placeholder="Alamat Emel Pengurus" name="e_email_pengurus"
                                                        value="{{ $pelesen->e_email_pengurus }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Negeri</label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="negeri_id"
                                                            onchange="ajax_daerah(this);ajax_kawasan(this)">
                                                            <option selected hidden disabled>Sila Pilih</option>
                                                            @foreach ($negeri as $data)
                                                                <option value="{{ $data->kod_negeri }}">
                                                                    {{ $data->nama_negeri }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                            <div class="alert alert-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror --}}
                                                </div>

                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Daerah</label>
                                                <div class="col-md-6" style="margin-top:3px">
                                                    <select class="form-select" id="daerah_id" name='daerah_id'
                                                        placeholder="Daerah">
                                                        <option selected hidden disabled>Sila Pilih Negeri Terlebih Dahulu
                                                        </option>
                                                    </select>
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Kawasan</label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="kawasan_id">
                                                            <option value="" selected hidden disabled>Sila Pilih
                                                                Daerah Terlebih Dahulu</option>
                                                            {{-- <option selected hidden disabled>Sila Pilih</option>
                                                            <option>Sabah</option>
                                                            <option>Sarawak</option>
                                                            <option>Selatan</option>
                                                            <option>Tengah</option>
                                                            <option>Timur</option>
                                                            <option>Utara</option> --}}
                                                        </select>
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                                <div class="alert alert-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror --}}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Syarikat Induk</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_syktinduk" class="form-control"
                                                        placeholder="Syarikat Induk" name="e_syktinduk"
                                                        value="{{ $pelesen->e_syktinduk }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Tahun Mula Beroperasi</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_year" class="form-control"
                                                        placeholder="Tahun Mula Beroperasi" name="e_year"
                                                        value="{{ $pelesen->e_year }}">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Kumpulan </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="e_group">
                                                            @if ($pelesen->e_group = 'GOV')

                                                                <option selected hidden disabled value="KERAJAAN">Kerajaan</option>
                                                        @elseif ($pelesen->e_group = 'IND')
                                                                <option selected hidden disabled value="SWASTA">Swasta</option>

                                                            @endif

                                                            <option value="KERAJAAN">Kerajaan</option>
                                                            <option value="SWASTA">Swasta</option>
                                                        </select>
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                                <div class="alert alert-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror --}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    POMA </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="poma">
                                                            <option selected hidden disabled>Sila Pilih</option>
                                                            <option>Ya</option>
                                                            <option>Tidak</option>

                                                        </select>
                                                    </fieldset>
                                                    {{-- @error('alamat_kilang_1')
                                                                <div class="alert alert-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group" style="padding-top: 10px; ">
                                            <div class="text-right col-md-12 mb-4 ">
                                                <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                    style="float: right"
                                                    data-bs-target="#exampleModalCenter">Tambah</button>
                                            </div>
                                        </div>
                                        {{-- <div class="row form-group" style="padding-top: 10px; ">
                                            <div class="text-right col-md-12 mb-4 ">
                                                <button type="submit" class="btn btn-primary ">Tambah</button>
                                            </div>
                                        </div> --}}
                                        <!-- Vertically Centered modal Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                                                            Anda pasti mahu menambah pelesen ini?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block"
                                                                style="color:#275047">Tidak</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1"
                                                            data-bs="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Ya</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>


                    </div>
                    <br>


                </div>
            </div>
        </div>
        </div>
        </div>

    </section><!-- End Hero -->

    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

@endsection

@section('javascript')
    {{-- ajax daerah --}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
    <script>
        @if (Session::get('success'))
            toastr.success('{{ session('success') }}', 'Berjaya', { "progressBar": true });
        @elseif ($message = Session::get('error'))
            toastr.error('{{ session('error') }}', 'Ralat', { "progressBar": true });
        @endif
    </script>
@endsection
