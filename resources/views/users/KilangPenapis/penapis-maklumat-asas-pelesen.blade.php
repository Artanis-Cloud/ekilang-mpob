@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Maklumat Pelesen</h4>
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
        <div class="card" style="margin-right:3%; margin-left:3%">
            {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}
            <div class="card-body">
                {{-- <div class="row"> --}}
                {{-- <div class="col-md-4 col-12"> --}}
                <div class="pl-3">

                    <div class=" text-center">
                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h3>
                        <h5 style="color: rgb(39, 80, 71); "><i> Nota : Sila kemaskini jika ada perubahan </i>
                        </h5>
                        {{-- <p>Maklumat Kilang</p> --}}
                    </div>
                    <hr>
                    <i>Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda ' </i><b style="color: red"> *
                    </b><i>'</i>
                    <form action="{{ route('penapis.update.maklumat.asas.pelesen', [$pelesen->e_id]) }}" method="post"
                        onsubmit="return check()" novalidate>
                        @csrf
                        <div class="container center mt-5">
                            <div class="row" style="margin-bottom:2.5%; margin-top:-2%">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label required col-form-label align-items-center">
                                    Alamat Premis Berlesen</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_ap1" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Premis Berlesen 1" name="e_ap1"
                                        value="{{ $pelesen->e_ap1 }}" oninput="setCustomValidity('')" required>
                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                </div>
                                <div class="col-md-6" style="margin-left: 41.6%; ">
                                    <input type="text" id="e_ap2" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Premis Berlesen 2" name="e_ap2"
                                        value="{{ $pelesen->e_ap2 }}" oninput="setCustomValidity('')">
                                </div>
                                <div class="col-md-6" style="margin-left: 41.6%;">
                                    <input type="text" id="e_ap3" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Premis Berlesen 3" name="e_ap3"
                                        value="{{ $pelesen->e_ap3 }}" oninput="setCustomValidity('')">
                                </div>
                            </div>

                            <div class="row" style="margin-bottom:2.5%">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Alamat Surat Menyurat</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_as1" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Surat Menyurat 1" name="e_as1" value="{{ $pelesen->e_as1 }}"
                                        required oninput="setCustomValidity('')">
                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                </div>
                                <div class="col-md-6" style="margin-left: 41.6%">
                                    <input type="text" id="e_as2" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Surat Menyurat 2" name="e_as2" value="{{ $pelesen->e_as2 }}"
                                        oninput="setCustomValidity('')">
                                </div>
                                <div class="col-md-6" style="margin-left: 41.6%">
                                    <input type="text" id="e_as3" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Surat Menyurat 3" name="e_as3" value="{{ $pelesen->e_as3 }}"
                                        oninput="setCustomValidity('')">
                                </div>
                                <div class="col-md-6 mt-2" style="margin-left: 41.6%;font-size: 11px">

                                <input type="checkbox" id="address" style="vertical-align:middle"> &nbsp;Sama seperti alamat premis</input>
                                </div>
                            </div>

                            <div class="row">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    No. Telefon (Pejabat / Kilang)</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_notel" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="No. Telefon Pejabat / Kilang" name="e_notel"
                                        oninput="setCustomValidity('')" value="{{ $pelesen->e_notel }}"
                                        onkeypress="return isNumberKey(event)" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    No. Faks</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_nofax" class="form-control" placeholder="No. Faks"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" name="e_nofax"
                                        value="{{ $pelesen->e_nofax }}" oninput="setCustomValidity('')">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Alamat Emel Kilang</label>
                                <div class="col-md-6">
                                    <input type="email" id="e_email" class="form-control" placeholder="Alamat Emel"
                                        oninvalid="setCustomValidity('Sila isi Alamat Emel Kilang dengan betul')"
                                        name="e_email" value="{{ $pelesen->e_email }}" required
                                        oninput="setCustomValidity('')">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Nama Pegawai Melapor</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_npg" class="form-control"
                                        placeholder="Nama Pegawai Melapor"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')" name="e_npg"
                                        value="{{ $pelesen->e_npg }}" required oninput="setCustomValidity('')">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Jawatan Pegawai Melapor</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_jpg" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        oninput="setCustomValidity('')" placeholder="Jawatan Pegawai Melapor"
                                        name="e_jpg" value="{{ $pelesen->e_jpg }}" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    No. Telefon Pegawai Melapor</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_notel_pg" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="No. Telefon Pegawai Melapor" name="e_notel_pg"
                                        oninput="setCustomValidity('')" value="{{ $pelesen->e_notel_pg }}"
                                        onkeypress="return isNumberKey(event)" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Alamat Emel Pegawai Melapor</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_email_pg" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Emel Pegawai Melapor" name="e_email_pg"
                                        oninput="setCustomValidity('')" value="{{ $pelesen->e_email_pg }}" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Nama Pegawai Bertanggungjawab</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_npgtg" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                        oninput="setCustomValidity('')" value="{{ $pelesen->e_npgtg }}" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Jawatan Pegawai
                                    Bertanggungjawab</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_jpgtg" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
                                        oninput="setCustomValidity('')" value="{{ $pelesen->e_jpgtg }}" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Alamat Emel Pengurus</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_email_pengurus" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Alamat Emel Pengurus" name="e_email_pengurus"
                                        oninput="setCustomValidity('')" value="{{ $pelesen->e_email_pengurus }}"
                                        required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Syarikat Induk</label>
                                <div class="col-md-6">
                                    <input type="text" id="e_syktinduk" class="form-control"
                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                        placeholder="Syarikat Induk" name="e_syktinduk" oninput="setCustomValidity('')"
                                        value="{{ $pelesen->e_syktinduk }}" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Kumpulan </label>
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="e_group" name="e_group" required
                                            oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                            oninput="setCustomValidity('')">
                                            <option selected value="">Sila Pilih Kumpulan</option>

                                            <option {{ $pelesen->e_group == 'GOV' ? 'selected' : '' }} value="GOV">
                                                Kerajaan</option>
                                            <option {{ $pelesen->e_group == 'IND' ? 'selected' : '' }} value="IND">
                                                Swasta</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row" style="margin-top:-1%">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Kapasiti Pemprosesan / Tahun</label>
                                <div class="col-md-6">
                                    <input type="text" id="kap_proses" class="form-control"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses"
                                        onchange="validation_jumlah()" oninput="setCustomValidity('')"
                                        onkeypress="return isNumberKey(event)" value="{{ $pelesen->kap_proses }}"
                                        required>
                                </div>
                            </div>

                            <div class="row mt-2" style="text-align: center; font-size: 12px">
                                <div class="col-md-4">
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
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Bilangan Tangki</label>

                                <div class="col-md-1">
                                    <input type="text" class="form-control" name='bil_tangki_cpo' style="width:100%"
                                        oninput="setCustomValidity('')" size="15" id="bil_tangki_cpo"
                                        onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_cpo }}"
                                        onchange="validation_jumlah()" required>
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>

                                <div class="col-md-1">
                                    <input type="text" class="form-control" name='bil_tangki_ppo' style="width:100%"
                                        oninput="setCustomValidity('')" size="15" id="bil_tangki_ppo"
                                        onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_ppo }}"
                                        onchange="validation_jumlah()" required>
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>
                                <div class="col-md-1">
                                    <input type="text" class="form-control" name='bil_tangki_cpko' style="width:100%"
                                        oninput="setCustomValidity('')" size="15" id="bil_tangki_cpko"
                                        onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_cpko }}"
                                        onchange="validation_jumlah()" required>
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>
                                <div class="col-md-1">
                                    <input type="text" class="form-control" name='bil_tangki_ppko' style="width:100%"
                                        oninput="setCustomValidity('')" size="15" id="bil_tangki_ppko"
                                        onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_ppko }}"
                                        onchange="validation_jumlah()" required>
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>
                                <div class="col-md-1">
                                    <input type="text" class="form-control" name='bil_tangki_others'
                                        style="width:100%" oninput="setCustomValidity('')" size="15"
                                        id="bil_tangki_others" onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        title="Sila isikan butiran ini." value="{{ $pelesen->bil_tangki_others }}"
                                        onchange="validation_jumlah()" required>
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>

                                {{-- <div class="col-md-1">
                                        <input type="text" class="form-control" name='bil_tangki_jumlah' style="width:100%" size="15"
                                            id="total"  value="{{ old('total') ?? number_format($jumlah ,2)  }}" readonly>

                                    </div> --}}

                                <div class="col-md-1 text-center">
                                    <b><span id="bil_tangki_jumlah">
                                            {{ old('bil_tangki_jumlah') ?? number_format($jumlah, 2) }}
                                        </span>
                                    </b>
                                    {{-- <input type="text" name='bil_tangki_jumlah' style="width:100%" size="15" value="{{ $jumlah }}"
                                        id="bil_tangki_jumlah"> --}}

                                </div>

                            </div>
                            <div class="row mt-2 mb-4">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Kapasiti Tangki Simpanan (Tan)</label>

                                <div class="col-md-1">
                                    <input type="text" class="form-control" name='kap_tangki_cpo' style="width:100%"
                                        oninput="setCustomValidity('')" id="kap_tangki_cpo"
                                        onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_cpo }}"
                                        onchange="validation_jumlah2()" required>
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>


                                <div class="col-md-1">
                                    <input type="text" class="form-control" name='kap_tangki_ppo' style="width:100%"
                                        oninput="setCustomValidity('')" id="kap_tangki_ppo"
                                        onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_ppo }}"
                                        onchange="validation_jumlah2()" required>
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>
                                <div class="col-md-1">
                                    <input type="text" class="form-control" name='kap_tangki_cpko' style="width:100%"
                                        oninput="setCustomValidity('')" id="kap_tangki_cpko"
                                        onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_cpko }}"
                                        onchange="validation_jumlah2()" required>
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>
                                <div class="col-md-1">
                                    <input type="text" class="form-control" name='kap_tangki_ppko' style="width:100%"
                                        oninput="setCustomValidity('')" id="kap_tangki_ppko"
                                        onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_ppko }}"
                                        onchange="validation_jumlah2()" required>
                                    {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                </div>
                                <div class="col-md-1">
                                    <input type="text" class="form-control" name='kap_tangki_others'
                                        style="width:100%" oninput="setCustomValidity('')" id="kap_tangki_others"
                                        onkeypress="return isNumberKey(event)"
                                        oninvalid="setCustomValidity('Sila isi butiran ini')"
                                        title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_others }}"
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
                                <div class="row ">
                                    <i style="margin-left:7%;margin-right:7%">Nota: Sekiranya kilang/pelesen tiada
                                        tangki simpanan khusus untuk sesuatu produk. Sila campurkan kesemua
                                        bilangan dan kapasiti tangki dan lapor dalam kategori Others
                                    </i>
                                </div>

                            </div>
                        </div>


                        <div class="row form-group" style="margin-top: 2%; ">

                            <div class="text-right col-md-6">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#next">Simpan</button>
                            </div>

                        </div>

                        <div class="modal fade" id="next" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                            PENGESAHAN</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                        <button type="submit" class="btn btn-primary ml-1" data-bs="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Ya</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- </div> --}}




            </div>


            </section><!-- End Hero -->
            {{-- @endsection
@section('scripts') --}}
            {{-- <div id="preloader"></div> --}}
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>


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
                //  var data = $('bil_tangki_jumlah').html();
                // $('#jumlah').html(data);
            </script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
            <script>
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
            </script>
        @endsection
        @section('scripts')
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

                    // jawatan pegawai bertanggungjawab
                    field = document.getElementById("e_jpgtg");
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
                }
            </script>

            <script>
                $('#submit').click(function() {
                            var
                            $checkbox = $('#address'),
                                e_ap1 = $('#e_ap1').val(),
                                e_ap2 = $('#e_ap2').val(),
                                e_ap3 = $('#e_ap3').val(),
                                e_as1 = $('#e_as1').val(),
                                e_as2 = $('#e_as2').val(),
                                e_as3 = $('#e_as3').val(),

                            // Billing address is always sent, no matter the checkbox state
                            billing(e_ap1, e_ap2, e_ap3);

                            // Shipping address depends on checkbox state
                            if ($("#el").is(':checked') {
                                    shipping(e_ap1, e_ap2, e_ap3);
                                    console.log(checked);
                                } else {
                                    shipping(e_as1, e_as2, e_as3);
                                }
                            )});


                        // $('.le-checkbox').on('change', function() {
                        //         $("#deliveryadd").toggle();
                        //         // .toggle() is simpler than .show() and .hide()
                        //         // if (this.checked) {
                        //         //     $("#deliveryadd").hide();
                        //         // } else {
                        //         //     $("#deliveryadd").show();
                        //         // }
                        //     }
            </script>

            <!-- (B) FORM CHECK -->
            {{-- <script>
    function check () {
      // (B1) INIT
      var error = "", field = "";

      // (B2) NAME
      field = document.getElementById("e_as1");
      if (!field.checkValidity()) {
        error += "Name must be 2-4 characters\r\n";
      }


      // (B4) RESULT
      if (error=="") { return true; }
      else {
        alert(error);
        return false;
      }
    }
    </script> --}}
        @endsection
