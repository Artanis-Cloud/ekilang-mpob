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
                    <h4 class="page-title">Maklumat Asas Pelesen</h4>
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
                        <form action="{{ route('admin.1daftarpelesen.proses') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="fname" class="control-label col-form-label">
                                            Jenis Kilang</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" name="jenis_kilang">
                                                <option {{ ($reg_pelesen->e_kat == 'PL91') ? 'selected' : '' }}>Kilang Buah</option>
                                                <option {{ ($reg_pelesen->e_kat == 'PL101') ? 'selected' : '' }}>Kilang Penapis</option>
                                                <option {{ ($reg_pelesen->e_kat == 'PL102') ? 'selected' : '' }}>Kilang Isirung</option>
                                                <option {{ ($reg_pelesen->e_kat == 'PL104') ? 'selected' : '' }}>Kilang Oleokimia</option>
                                                <option {{ ($reg_pelesen->e_kat == 'PL111') ? 'selected' : '' }}>Pusat Simpanan</option>
                                                <option {{ ($reg_pelesen->e_kat == 'PLBIO') ? 'selected' : '' }}>Kilang Biodiesel</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Status e-Kilang</label>
                                            <select class="form-control" name="e_status">

                                                <option {{ ($reg_pelesen->e_status == '1') ? 'selected' : '' }} value="1">Aktif</option>
                                                <option {{ ($reg_pelesen->e_status == '2') ? 'selected' : '' }} value="2">Tidak Aktif</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Status e-Mingguan</label>
                                            <select class="form-control" name="e_stock">
                                                <option {{ ($reg_pelesen->e_stock == '1') ? 'selected' : '' }} value="1">Aktif</option>
                                                <option {{ ($reg_pelesen->e_stock == '2') ? 'selected' : '' }} value="2">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Status Direktori</label>
                                            <select class="form-control" name="directory">
                                                <option {{ ($reg_pelesen->directory == 'Y') ? 'selected' : '' }} value="Y">Ya</option>
                                                <option {{ ($reg_pelesen->directory == 'N') ? 'selected' : '' }}value="N">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">Kod Negeri </label>
                                            <select class="form-control" name="kodpgw">
                                                <option selected hidden disabled>{{ $pelesen->kodpgw ?? '' }}
                                                </option>
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
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">Nombor Siri</label>
                                            <input type="text" id="nombor_siri" class="form-control"
                                                placeholder="Nombor Siri" name="nosiri"
                                                value="{{ $pelesen->nosiri ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">Nombor Lesen</label>
                                            <input type="text" id="nombor_lesen" class="form-control"
                                                placeholder="Nombor Lesen" name="e_nl" value="" {{ $pelesen->e_nl ?? '-' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">Nama Premis</label>
                                            <input type="text" id="nama_premis" class="form-control"
                                                placeholder="Nama Premis" name="e_np" value="{{ $pelesen->e_np ?? '-' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">Alamat Premis
                                                Berlesen</label>
                                            <input type="text" id="alamat_premis_1" class="form-control"
                                                placeholder="Alamat Premis 1" name="e_ap1" value="{{ $pelesen->e_ap1 ?? '-' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">Alamat Surat
                                                Menyurat</label>
                                            <input type="text" id="alamat_surat_1" class="form-control"
                                                placeholder="Alamat Surat Menyurat 1" name="e_as1"
                                                value="{{ $pelesen->e_as1 ?? '-' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -1%">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="inputcom" class="control-label col-form-label">Alamat Premis Berlesen</label> --}}
                                            <input type="text" id="alamat_premis_1" class="form-control"
                                                placeholder="Alamat Premis 2" name="e_ap2" value="{{ $pelesen->e_ap2 ?? '-' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="inputcom" class="control-label col-form-label">Alamat Surat Menyurat</label> --}}
                                            <input type="text" id="alamat_surat_1" class="form-control"
                                                placeholder="Alamat Surat Menyurat 2" name="e_as2"
                                                value="{{ $pelesen->e_as2 ?? '-' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -1%">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="inputcom" class="control-label col-form-label">Alamat Premis Berlesen</label> --}}
                                            <input type="text" id="alamat_premis_1" class="form-control"
                                                placeholder="Alamat Premis 3" name="e_ap3" value="{{ $pelesen->e_ap3 ?? '-' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="inputcom" class="control-label col-form-label">Alamat Surat Menyurat</label> --}}
                                            <input type="text" id="alamat_surat_1" class="form-control"
                                                placeholder="Alamat Surat Menyurat 3" name="e_as3"
                                                value="{{ $pelesen->e_as3 ?? '-' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -1%">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">No. Telefon
                                                Kilang</label>
                                            <input type="text" id="no_tel_kilang" class="form-control"
                                                placeholder="No. Telefon Kilang" name="e_notel"
                                                value="{{ $pelesen->e_notel ?? '-' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">No. Faks
                                                Kilang</label>
                                            <input type="text" id="no_faks_kilang" class="form-control"
                                                placeholder="No. Faks Kilang" name="e_nofax"
                                                value="{{ $pelesen->e_nofax ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">Alamat Emel
                                                Kilang</label>
                                            <input type="text" id="emel_kilang" class="form-control"
                                                placeholder="Alamat Emel Kilang" name="e_email"
                                                value="{{ $pelesen->e_email ?? '-' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">Nama Pegawai
                                                Melapor</label>
                                            <input type="text" id="nama_pegawai_lapor" class="form-control"
                                                placeholder="Nama Pegawai Melapor" name="e_npg"
                                                value="{{ $pelesen->e_npg ?? '-' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">Jawatan Pegawai
                                                Melapor</label>
                                            <input type="text" id="jawatan_pegawai_lapor" class="form-control"
                                                placeholder="Jawatan Pegawai Melapor" name="e_jpg"
                                                value="{{ $pelesen->e_jpg ?? '-' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">No. Telefon Pegawai
                                                Melapor</label>
                                            <input type="text" id="email-id-column" class="form-control"
                                                placeholder="No. Telefon Pegawai Melapor" name='e_notel_pg'
                                                value="{{ $pelesen->e_notel_pg ?? '-' }}">'
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">Nama Pegawai
                                                Bertanggungjawab</label>
                                            <input type="text" id="enama_pegawai_jawab" class="form-control"
                                                placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                                value="{{ $pelesen->e_npgtg ?? '-' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">Jawatan Pegawai
                                                Bertanggungjawab</label>
                                            <input type="text" id="jawatan_pegawai_jawab" class="form-control"
                                                placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
                                                value="{{ $pelesen->e_jpgtg ?? '-' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">Alamat Emel
                                                Pengurus</label>
                                            <input type="text" id="emel_pengurus" class="form-control"
                                                placeholder="Alamat Emel Pengurus" name="e_email_pengurus"
                                                value="{{ $pelesen->e_email_pengurus ?? '-' }}">'
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -1%">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">
                                                Negeri</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="negeri_id"
                                                    onchange="ajax_daerah(this);ajax_kawasan(this)">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($negeri as $data)
                                                        <option value="{{ $data->kod_negeri }}">
                                                            {{ $data->nama_negeri }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label for="inputcom" class="control-label col-form-label">
                                            Daerah</label>
                                        <fieldset class="form-group">

                                            <select class="form-control" id="daerah_id" name='daerah_id'
                                                placeholder="Daerah">
                                                <option selected hidden disabled>Sila Pilih Negeri Terlebih Dahulu
                                                </option>
                                            </select>
                                        </fieldset>

                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label for="inputcom" class="control-label col-form-label">
                                            Kawasan</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" id="kawasan_id">
                                                <option value="" selected hidden disabled>Sila Pilih
                                                    Daerah Terlebih Dahulu</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">
                                                Syarikat Induk</label>
                                            <input type="text" id="syarikat_induk" class="form-control"
                                                placeholder="Syarikat Induk" name="e_syktinduk"
                                                value="{{ $pelesen->e_syktinduk ?? '-' }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="inputcom" class="control-label col-form-label">
                                            Tahun Mula Beroperasi</label>
                                        <input type="text" id="tahun_operasi" class="form-control"
                                            placeholder="Tahun Mula Beroperasi" name="e_year"
                                            value="{{ $pelesen->e_year ?? '-' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="inputcom" class="control-label col-form-label">
                                                Kumpulan</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" name="e_group">
                                                    @if ($pelesen->e_group ?? '-' == 'GOV')
                                                        <option selected hidden disabled value="KERAJAAN">Kerajaan
                                                        </option>
                                                    @else
                                                        <option selected hidden disabled value="SWASTA">Swasta</option>
                                                    @endif

                                                    <option value="KERAJAAN">Kerajaan</option>
                                                    <option value="SWASTA">Swasta</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="inputcom" class="control-label col-form-label">
                                            POMA</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" name="e_poma">
                                                @if ($pelesen->e_poma ?? '-' == 'POMA')
                                                    <option selected hidden disabled value="POMA">Ya
                                                    </option>
                                                @else
                                                    <option selected hidden disabled value="-">Tidak</option>
                                                @endif
                                                <option>Ya</option>
                                                <option>Tidak</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>


                                {{-- <div class="row form-group" style="padding-top: 10px; ">
                                    <div class="text-right col-md-12 mb-4 ">
                                        <button type="submit" class="btn btn-primary ">Tambah</button>
                                    </div>
                                </div> --}}




                    </div>

                </div>
                {{-- </form> --}}
            </div>
        </div>
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 align-self-center">
                    <h4 class="page-title">Pertukaran No Lesen Lama Ke
                        No Lesen Baru</h4>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        {{-- <form action="{{ route('admin.1daftarpelesen.proses') }}" method="post">
                            @csrf --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputcom" class="control-label col-form-label">
                                            Nombor Lesen Baru</label>
                                            <input type="text" id="e_year" class="form-control"
                                            placeholder="Nombor Lesen Baru" name="e_year"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="inputcom" class="control-label col-form-label">
                                        Kod Pegawai Baru</label>
                                        <input type="text" id="e_year" class="form-control"
                                        placeholder="Kod Pegawai Baru" name="e_year"
                                        value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputcom" class="control-label col-form-label">
                                            No Siri Baru</label>
                                            <input type="text" id="e_year" class="form-control"
                                                    placeholder="No Siri Baru" name="e_year"
                                                    value="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="inputcom" class="control-label col-form-label">
                                        Status e-Kilang Baru</label>
                                        <fieldset class="form-group">
                                            <select class="form-control"name="status_ekilang">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                <option value="1">Aktif</option>
                                                <option value="2">Tidak Aktif</option>
                                            </select>
                                        </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputcom" class="control-label col-form-label">
                                            Status e-Mingguan Baru</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" name="status_emingguan">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="1">Aktif</option>
                                                    <option value="2">Tidak Aktif</option>
                                                </select>
                                            </fieldset>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="inputcom" class="control-label col-form-label">
                                        Status Direktori Baru</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" name="status_direktori">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                <option value="Y">Ya</option>
                                                <option value="N">Tidak</option>
                                            </select>
                                        </fieldset>
                                </div>

                                <div class="row form-group center-block" style="padding-top: 10px;">
                                    <div class="text-right col-md-12 mb-4 " >
                                        <button type="button" class="btn btn-primary " data-toggle="modal"
                                            data-target="#myModal">Tukar No Lesen</button>
                                    </div>
                                </div>

                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">PENGESAHAN</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Anda pasti mahu menukar maklumat ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1" data-bs="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya</span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                        </form>
                            </div>
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
