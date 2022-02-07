@extends($layout)

@section('content')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative"  data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="mt-2 mb-4 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(255, 255, 255); background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                            @if (!$loop->last)
                                                <li class="breadcrumb-item">
                                                    <a href="{{ $breadcrumb['link'] }}" style="color: rgb(102, 100, 100) !important;"
                                                        onMouseOver="this.style.color='lightblue'"
                                                        onMouseOut="this.style.color='rgb(102, 100, 100)'">
                                                        {{ $breadcrumb['name'] }}
                                                    </a>
                                                </li>
                                            @else
                                                <li class="breadcrumb-item active" aria-current="page"
                                                    style="color: #e8d255  !important;">
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
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h4 style="color: rgb(39, 80, 71); margin-bottom:1%">Daftar Pelesen Baru</h4>
                                        {{-- <h5 style="color: rgb(39, 80, 71); font-size:14px">Maklumat Asas Pelesen
                                        </h5> --}}
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>

                                    <div class="container center mt-5" >

                                        <div class="row" style="margin-top:-2%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Jenis Kilang</label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect">
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
                                                Status E-Kilang </label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect">
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
                                                        <select class="form-select" id="basicSelect">
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
                                                        <select class="form-select" id="basicSelect">
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
                                                        <select class="form-select" id="basicSelect">
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
                                                <input type="text" id="company-column" class="form-control" placeholder="Nombor Siri"
                                                            name="company-column">
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
                                                Nombor Lesen</label>
                                            <div class="col-md-6">
                                                <input type="text" id="company-column" class="form-control" placeholder="Nombor Lesen"
                                                            name="company-column">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>

                                        <div class="row" style="margin-bottom:2.5%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                               Nama Premis</label>
                                            <div class="col-md-6">
                                                <input type="text" id="company-column" class="form-control" placeholder="Nama Premis"
                                                            name="company-column">
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
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 1"
                                                            name="lname-column">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                            <div class="col-md-6" style="margin-left: 41.6%">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 2"
                                                            name="lname-column">
                                            </div>
                                            <div class="col-md-6" style="margin-left: 41.6%">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 3"
                                                            name="lname-column">
                                            </div>
                                        </div>

                                        <div class="row" style="margin-bottom:2.5%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Alamat Surat Menyurat</label>
                                            <div class="col-md-6">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 1"
                                                            name="lname-column">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                            <div class="col-md-6" style="margin-left: 41.6%">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 2"
                                                            name="lname-column">
                                            </div>
                                            <div class="col-md-6" style="margin-left: 41.6%">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="Alamat Surat Menyurat 3"
                                                            name="lname-column">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                No. Telefon Kilang</label>
                                            <div class="col-md-6">
                                                <input type="text" id="company-column" class="form-control" placeholder="No. Telefon Kilang"
                                                            name="company-column">
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
                                                <input type="email" id="email-id-column" class="form-control" placeholder="No. Faks Kilang"
                                                            name="email-id-column">
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
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Alamat Emel Kilang"
                                                            name="email-id-column">
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
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Nama Pegawai Melapor"
                                                            name="email-id-column">
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
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Jawatan Pegawai Melapor"
                                                            name="email-id-column">
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
                                                <input type="email" id="email-id-column" class="form-control" placeholder="No. Telefon Pegawai Melapor"
                                                            name="email-id-column">
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
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Nama Pegawai Bertanggungjawab"
                                                            name="email-id-column">
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
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Jawatan Pegawai Bertanggungjawab"
                                                            name="email-id-column">
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
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Alamat Emel Pengurus"
                                                            name="email-id-column">
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
                                                    <select class="form-select" id="negeri_id" onchange="ajax_daerah(this)">
                                                        <option selected hidden disabled>Sila Pilih</option>
                                                        @foreach (App\Models\Negeri::distinct()->orderBy('kod_negeri')->get() as $data)
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
                                            <div class="col-md-6">
                                                <select class="form-control" id="daerah_id" name='daerah_id'
                                                    placeholder="Daerah">
                                                    <option value="" selected hidden disabled>Sila Pilih
                                                        Daerah Hutan</option>

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
                                                        <select class="form-select" id="basicSelect">
                                                            <option selected hidden disabled>Sila Pilih</option>
                                                            <option>Sabah</option>
                                                            <option>Sarawak</option>
                                                            <option>Selatan</option>
                                                            <option>Tengah</option>
                                                            <option>Timur</option>
                                                            <option>Utara</option>
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
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Syarikat Induk"
                                                            name="email-id-column">
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
                                                <input type="email" id="email-id-column" class="form-control" placeholder="Tahun Mula Beroperasi"
                                                            name="email-id-column">
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
                                                        <select class="form-select" id="basicSelect">
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
                                                        <select class="form-select" id="basicSelect">
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


                                        {{-- <div class="text-left col-md-5">
                                            <a href="{{ route('buah.bahagiani') }}" class="btn btn-primary"
                                                style="float: left">Sebelumnya</a>
                                        </div> --}}
                                        <div class="text-right col-md-12 mb-4 ">
                                            <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                style="float: right" data-bs-target="#exampleModalCenter">Tambah</button>
                                        </div>

                                    </div>

                                        <!-- Vertically Centered modal Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true">
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
                                                        <button type="button" class="btn btn-primary ml-1"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Ya</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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



    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>



    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>



    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" /></script>

    {{-- <script src="jquery-3.5.1.min.js"></script> --}}

    <script src="assets/js/main.js"></script>

    <script>
        var form = $(".validation-wizard").show();

        $(".validation-wizard").steps({
                headerTag: "h6",
                bodyTag: "section",
                transitionEffect: "fade",
                titleTemplate: '<span class="step">#index#</span> #title#',
                labels: {
                    finish: "Hantar",
                    next: "Seterusnya",
                    previous: "Sebelumnya",
                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (
                        currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error")
                            .remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")),
                        form
                        .validate().settings.ignore = ":disabled,:hidden", form.valid())
                },
                onFinishing: function(event, currentIndex) {
                    return form.validate().settings.ignore = ":disabled", form.valid()
                },
                onFinished: function(event, currentIndex) {
                    // swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
                    form.submit();
                }
            }),

            $(".validation-wizard").validate({
                ignore: "input[type=hidden]",
                errorClass: "text-danger",
                successClass: "text-success",
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass)
                },
                unhighlight: function(element, errorClass) {
                    $(element).removeClass(errorClass)
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element)
                },
                rules: {
                    email: {
                        email: !0
                    }
                }
            })
    </script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

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
            // url:"/permohonan/fetchSenaraiHargaIdByTahun/jenisDokumen/"+jenis_dokumen+"/jenisData/"+jenis_data+"/tahun/"+tahun+"/negeri/" + negeri + "/jenisKertas/" + jenis_kertas,
            url: "/ajax/fetch-daerah/" + negeri, //penting

            //url:"/JPSM/permohonan/fetchSenaraiHargaIdByTahun/jenisDokumen/"+jenis_dokumen+"/jenisData/"+jenis_data+"/tahun/"+tahun+"/negeri/" + negeri,
            success: function(respond) {
                //fetch data (id) from DB Senarai Harga
                //   var data = JSON.parse(respond);
                console.log(respond);
                //loop for data
                var x = 0;

                respond.forEach(function() { //penting

                    // console.log(respond[x]);
                    $("#daerah_id").append('<option value="' + respond[x].list_daerah + '">' +
                        respond[x]
                        .list_daerah + '</option>');
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





    </body>

    </html>

@endsection

