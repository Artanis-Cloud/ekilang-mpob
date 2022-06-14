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
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <form action="{{ route('admin.1daftarpelesen.proses') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class=" text-center">
                                    <h3 style="color: rgb(39, 80, 71);">Daftar Pelesen Baru</h3><br>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        {{-- @if ($errors->any())
                                        {{ implode('', $errors->all('<div>:message</div>')) }}
                                        @endif --}}
                                        <label for="fname" class="control-label col-form-label required">
                                            Jenis Kilang</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" name="e_kat" id="e_kat" required
                                                onchange="showDetail()"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih Kilang</option>
                                                @if (auth()->user()->sub_cat)
                                                    @foreach (json_decode(auth()->user()->sub_cat) as $cat)
                                                        @if ($cat == 'PL91')
                                                            <option value="PL91">Kilang Buah</option>
                                                        @endif
                                                        @if ($cat == 'PL101')
                                                            <option value="PL101">Kilang Penapis</option>
                                                        @endif
                                                        @if ($cat == 'PL102')
                                                            <option value="PL102">Kilang Isirung</option>
                                                        @endif
                                                        @if ($cat == 'PL104')
                                                            <option value="PL104">Kilang Oleokimia</option>
                                                        @endif
                                                        @if ($cat == 'PL111')
                                                            <option value="PL111">Pusat Simpanan</option>
                                                        @endif
                                                        @if ($cat == 'PLBIO')
                                                            <option value="PLBIO">Kilang Biodiesel</option>
                                                        @endif
                                                        @if ($cat == null)
                                                            <option value="PL91">Kilang Buah</option>
                                                            <option value="PL101">Kilang Penapis</option>
                                                            <option value="PL102">Kilang Isirung</option>
                                                            <option value="PL104">Kilang Oleokimia</option>
                                                            <option value="PL111">Pusat Simpanan</option>
                                                            <option value="PL102">Kilang Biodiesel</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="PL91">Kilang Buah</option>
                                                    <option value="PL101">Kilang Penapis</option>
                                                    <option value="PL102">Kilang Isirung</option>
                                                    <option value="PL104">Kilang Oleokimia</option>
                                                    <option value="PL111">Pusat Simpanan</option>
                                                    <option value="PL102">Kilang Biodiesel</option>
                                                @endif

                                            </select>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label class="control-label col-form-label required">Status e-Kilang</label>
                                            <select class="form-control" name="e_status" required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih</option>
                                                <option value="1">Aktif</option>
                                                <option value="2">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label class="control-label col-form-label required">Status e-Mingguan</label>
                                            <select class="form-control" name="e_stock" required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih</option>
                                                <option value="1">Aktif</option>
                                                <option value="2">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label class="control-label col-form-label required">Status Direktori</label>
                                            <select class="form-control" name="directory" required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih</option>
                                                <option value="Y">Ya</option>
                                                <option value="N">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label class="control-label col-form-label required">Kod Negeri </label>
                                            <select class="form-control" name="kodpgw" required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih</option>
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
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">Nombor
                                                Siri</label>
                                            <input type="text" id="nombor_siri" class="form-control" required
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="4"
                                                oninput="setCustomValidity('')" placeholder="Nombor Siri" name="nosiri"
                                                value="{{ old('nombor_siri') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">Nombor
                                                Lesen</label>
                                            <input type="text" id="nombor_lesen" class="form-control" required
                                                oninvalid="setCustomValidity('Sila isi butiran ini')" maxlength="12"
                                                oninput="setCustomValidity('')" placeholder="Nombor Lesen" name="e_nl"
                                                value="{{ old('nombor_lesen') }}">
                                            @error('e_nl')
                                                <div class="col-12 alert alert-danger">
                                                    <strong>No. lesen sudah wujud!</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">Nama
                                                Premis</label>
                                            <input type="text" id="nama_premis" class="form-control" required
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Nama Premis" name="e_np"
                                                value="{{ old('nama_premis') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">Alamat
                                                Premis
                                                Berlesen</label>
                                            <input type="text" id="alamat_premis_1" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Alamat Premis 1" name="e_ap1"
                                                required value="{{ old('alamat_premis_1') }}">
                                        </div>
                                        <div class="form-group">
                                            {{-- <label for="inputcom" class="control-label col-form-label">Alamat Premis Berlesen</label> --}}
                                            <input type="text" id="alamat_premis_1" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Alamat Premis 2" name="e_ap2"
                                                required value="{{ old('alamat_premis_1') }}">
                                        </div>
                                        <div class="form-group">
                                            {{-- <label for="inputcom" class="control-label col-form-label">Alamat Premis Berlesen</label> --}}
                                            <input type="text" id="alamat_premis_1" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Alamat Premis 3" name="e_ap3"
                                                required value="{{ old('alamat_premis_1') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">Alamat Surat
                                                Menyurat</label>
                                            <input type="text" id="alamat_surat_1" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Alamat Surat Menyurat 1"
                                                name="e_as1" required value="{{ old('alamat_surat_1') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            {{-- <label for="inputcom" class="control-label col-form-label">Alamat Surat Menyurat</label> --}}
                                            <input type="text" id="alamat_surat_1" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Alamat Surat Menyurat 2"
                                                name="e_as2" required value="{{ old('alamat_surat_1') }}">
                                        </div>

                                        <div class="form-group">
                                            {{-- <label for="inputcom" class="control-label col-form-label">Alamat Surat Menyurat</label> --}}
                                            <input type="text" id="alamat_surat_1" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Alamat Surat Menyurat 3"
                                                name="e_as3" required value="{{ old('alamat_surat_1') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">No. Telefon
                                                Kilang</label>
                                            <input type="text" id="no_tel_kilang" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="No. Telefon Kilang"
                                                name="e_notel" required value="{{ old('no_tel_kilang') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">No. Faks
                                                Kilang</label>
                                            <input type="text" id="no_faks_kilang" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="No. Faks Kilang" name="e_nofax"
                                                required value="{{ old('no_faks_kilang') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">Alamat Emel
                                                Kilang</label>
                                            <input type="text" id="emel_kilang" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Alamat Emel Kilang"
                                                name="e_email" required value="{{ old('emel_kilang') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">Nama Pegawai
                                                Melapor</label>
                                            <input type="text" id="nama_pegawai_lapor" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Nama Pegawai Melapor"
                                                name="e_npg" required value="{{ old('nama_pegawai_lapor') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">Jawatan
                                                Pegawai
                                                Melapor</label>
                                            <input type="text" id="jawatan_pegawai_lapor" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Jawatan Pegawai Melapor"
                                                name="e_jpg" required value="{{ old('jawatan_pegawai_lapor') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">No. Telefon
                                                Pegawai
                                                Melapor</label>
                                            <input type="text" id="email-id-column" class="form-control" required
                                                placeholder="No. Telefon Pegawai Melapor" name='e_notel_pg'
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" value="{{ old('e_notel_pg') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">Nama
                                                Pegawai
                                                Bertanggungjawab</label>
                                            <input type="text" id="enama_pegawai_jawab" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Nama Pegawai Bertanggungjawab"
                                                name="e_npgtg" required value="{{ old('nama_pegawai_jawab') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">Jawatan
                                                Pegawai
                                                Bertanggungjawab</label>
                                            <input type="text" id="jawatan_pegawai_jawab" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')"
                                                placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg" required
                                                value="{{ old('jawatan_pegawai_jawab') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">Alamat Emel
                                                Pengurus</label>
                                            <input type="text" id="emel_pengurus" class="form-control"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Alamat Emel Pengurus"
                                                name="e_email_pengurus" required value="{{ old('eemel_pengurus') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">
                                                Negeri</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="negeri_id" name="e_negeri"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')"
                                                    onchange="ajax_daerah(this);ajax_kawasan(this)" required>
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($negeri as $data)
                                                        <option value="{{ $data->kod_negeri }}">
                                                            {{ $data->nama_negeri }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <label for="inputcom" class="control-label col-form-label required">
                                            Daerah</label>
                                        <fieldset class="form-group">

                                            <select class="form-control" id="daerah_id" name='e_daerah' required
                                                placeholder="Daerah"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih Negeri Terlebih Dahulu
                                                </option>
                                            </select>
                                        </fieldset>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <label for="inputcom" class="control-label col-form-label required">
                                            Kawasan</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" id="kawasan_id" name='e_kawasan' required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option value="" selected hidden disabled>Sila Pilih
                                                    Daerah Terlebih Dahulu</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">
                                                Syarikat Induk</label>
                                            <input type="text" id="syarikat_induk" class="form-control" required
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                oninput="setCustomValidity('')" placeholder="Syarikat Induk"
                                                name="e_syktinduk">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <label for="inputcom" class="control-label col-form-label required">
                                            Tahun Mula Beroperasi</label>
                                        <input type="text" id="tahun_operasi" class="form-control" required
                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            oninput="setCustomValidity('')" placeholder="Tahun Mula Beroperasi"
                                            name="e_year">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label required">
                                                Kumpulan</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" name="e_group" required
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    <option value="GOV">Kerajaan</option>
                                                    <option value="IND">Swasta</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 ml-auto mr-auto">
                                        <label for="inputcom" class="control-label col-form-label required">
                                            POMA</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" name="e_poma" required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih</option>
                                                <option value="poma">Ya</option>
                                                <option value="NULL">Tidak</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-8 ml-auto mr-auto">
                                        <label for="inputcom" class="control-label col-form-label required">
                                            Kapasiti Pemprosesan / Tahun</label>

                                        <input type="text" id="kap_proses" class="form-control"
                                            placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses"
                                            oninvalid="setCustomValidity('Sila isi butiran ini')"
                                            onkeypress="return isNumberKey(event)"
                                            oninput="validate_two_decimal(this);setCustomValidity('')" required>

                                    </div>
                                </div>

                                <br><br>
                                <div class="row form-group" style="padding-top: 10px; ">
                                    <div class="text-right col-1 ml-auto mr-auto">
                                        <button type="button" class="btn btn-primary " data-toggle="modal"
                                            data-target="#myModal">Tambah</button>
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
                                                <button type="button" class="close" ata-bs-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Anda pasti mahu menambah pelesen ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1" ata-bs-dismiss="modal">
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
        <!-- End row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
@endsection

@section('scripts')
    {{-- ajax daerah --}}
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

    <script type="text/javascript">
        function showDetail() {
            var cat = $('#e_kat').val();
            // console.log(oer);

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
    </script>
    {{-- <script>
        function validation_jumlah() {
            var bil_tangki_cpo = $("#bil_tangki_cpo").val();
            var bil_tangki_ppo = $("#bil_tangki_ppo").val();
            var bil_tangki_cpko = $("#bil_tangki_cpko").val();
            var bil_tangki_ppko = $("#bil_tangki_ppko").val();
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
    </script> --}}


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
@endsection
