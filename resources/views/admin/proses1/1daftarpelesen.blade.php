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
                                        <h4 style="color: rgb(39, 80, 71); margin-bottom:1%">Daftar Pelesen Baru</h4>
                                    </div>
                                    <hr>
                                    <form action="{{ route('admin.1daftarpelesen.proses') }}" method="post">
                                        @csrf
                                        <div class="container center mt-5">

                                            <div class="row" style="margin-top:-2%">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Jenis Kilang</label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="jenis_kilang">
                                                            <option selected hidden disabled>Sila Pilih Kilang</option>
                                                            <option>Kilang Buah</option>
                                                            <option>Kilang Penapis</option>
                                                            <option>Kilang Isirung</option>
                                                            <option>Kilang Oleokimia</option>
                                                            <option>Pusat Simpanan</option>
                                                            <option>E-Biodiesel</option>
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
                                                            <option selected hidden disabled>Sila Pilih</option>
                                                            <option>Aktif</option>
                                                            <option>Tidak Aktif</option>
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
                                                            <option selected hidden disabled>Sila Pilih</option>
                                                            <option>Aktif</option>
                                                            <option>Tidak Aktif</option>
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

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Kod Negeri </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect" name="kod_negeri">
                                                            <option selected hidden disabled>Sila Pilih</option>
                                                            <option>JJ</option>
                                                            <option>KB</option>
                                                            <option>KK</option>
                                                            <option>MM</option>
                                                            <option>NS</option>
                                                            <option>PH</option>
                                                            <option>PK</option>
                                                            <option>PP</option>
                                                            <option>SA</option>
                                                            <option>SS</option>
                                                            <option>SW</option>
                                                            <option>TT</option>
                                                            <option>WP</option>
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
                                                    <input type="text" id="nombor_siri" class="form-control"
                                                        placeholder="Nombor Siri" name="nombor_siri"
                                                        value="{{ old('nombor_siri') }}">
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
                                                    <input type="text" id="nombor_lesen" class="form-control"
                                                        placeholder="Nombor Lesen" name="nombor_lesen"
                                                        value="{{ old('nombor_siri') }}">
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
                                                    <input type="text" id="nama_premis" class="form-control"
                                                        placeholder="Nama Premis" name="nama_premis">
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
                                                    <input type="text" id="alamat_premis_1" class="form-control"
                                                        placeholder="Alamat Premis 1" name="alamat_premis_1">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div class="col-md-6" style="margin-left: 41.6%">
                                                    <input type="text" id="alamat_premis_2" class="form-control"
                                                        placeholder="Alamat Premis 2" name="alamat_premis_2">
                                                </div>
                                                <div class="col-md-6" style="margin-left: 41.6%">
                                                    <input type="text" id="alamat_premis_3" class="form-control"
                                                        placeholder="Alamat Premis 3" name="alamat_premis_3">
                                                </div>
                                            </div>

                                            <div class="row" style="margin-bottom:2.5%">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Alamat Surat Menyurat</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="alamat_surat_1" class="form-control"
                                                        placeholder="Alamat Surat Menyurat 1" name="alamat_surat_1">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div>
                                                <div class="col-md-6" style="margin-left: 41.6%">
                                                    <input type="text" id="alamat_surat_2" class="form-control"
                                                        placeholder="Alamat Surat Menyurat 2" name="alamat_surat_2">
                                                </div>
                                                <div class="col-md-6" style="margin-left: 41.6%">
                                                    <input type="text" id="alamat_surat_3" class="form-control"
                                                        placeholder="Alamat Surat Menyurat 3" name="alamat_surat_3">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    No. Telefon Kilang</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="no_tel_kilang" class="form-control"
                                                        placeholder="No. Telefon Kilang" name="no_tel_kilang">
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
                                                    <input type="text" id="no_faks_kilang" class="form-control"
                                                        placeholder="No. Faks Kilang" name="no_faks_kilang">
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
                                                    <input type="text" id="emel_kilang" class="form-control"
                                                        placeholder="Alamat Emel Kilang" name="emel_kilang">
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
                                                    <input type="text" id="nama_pegawai_lapor" class="form-control"
                                                        placeholder="Nama Pegawai Melapor" name="nama_pegawai_lapor">
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
                                                    <input type="text" id="jawatan_pegawai_lapor" class="form-control"
                                                        placeholder="Jawatan Pegawai Melapor" name="jawatan_pegawai_lapor">
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
                                                    <input type="text" id="email-id-column" class="form-control"
                                                        placeholder="No. Telefon Pegawai Melapor" name="email-id-column">
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
                                                    <input type="text" id="enama_pegawai_jawab" class="form-control"
                                                        placeholder="Nama Pegawai Bertanggungjawab" name="nama_pegawai_jawab">
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
                                                    <input type="text" id="jawatan_pegawai_jawab" class="form-control"
                                                        placeholder="Jawatan Pegawai Bertanggungjawab"
                                                        name="jawatan_pegawai_jawab">
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
                                                    <input type="text" id="emel_pengurus" class="form-control"
                                                        placeholder="Alamat Emel Pengurus" name="eemel_pengurus">
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
                                                    <input type="text" id="syarikat_induk" class="form-control"
                                                        placeholder="Syarikat Induk" name="syarikat_induk">
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
                                                    <input type="text" id="tahun_operasi" class="form-control"
                                                        placeholder="Tahun Mula Beroperasi" name="tahun_operasi">
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
                                                        <select class="form-select" id="basicSelect" name="kumpulan">
                                                            <option selected hidden disabled>Sila Pilih</option>
                                                            <option>Kerajaan</option>
                                                            <option>Swasta</option>
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
