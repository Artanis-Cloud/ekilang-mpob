@extends('layouts.main')

@section('content')
    <div class="page-wrapper">

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
            <div class="card-body">
                <div class="">

                    <div class=" text-center">
                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h3>
                        <h5 style="color: rgb(39, 80, 71); "><i> Nota : Sila kemaskini jika ada perubahan </i>
                        </h5>
                    </div>
                    <hr>
                    <i>Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda ' </i><b style="color: red"> * </b><i>'</i>
                    <form action="{{ route('oleo.update.maklumat.asas.pelesen', [$pelesen->e_id]) }}" method="post">
                        @csrf
                        <div class="container center mt-5">
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                        class="control-label required col-form-label">
                                        Alamat Premis Berlesen</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_ap1" class="form-control" maxlength="60"
                                        placeholder="Alamat Surat Menyurat 1" name="e_ap1" value="{{ $pelesen->e_ap1 }}">
                                    @error('e_ap1')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_ap2" class="form-control" maxlength="60"
                                        placeholder="Alamat Surat Menyurat 2" name="e_ap2" value="{{ $pelesen->e_ap2 }}">
                                    @error('e_ap2')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_ap3" class="form-control" maxlength="60"
                                        placeholder="Alamat Surat Menyurat 3" name="e_ap3" value="{{ $pelesen->e_ap3 }}">
                                    @error('e_ap3')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    Alamat Surat Menyurat</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_as1" class="form-control" maxlength="60"
                                        placeholder="Alamat Surat Menyurat 1" name="e_as1" value="{{ $pelesen->e_as1 }}">
                                    @error('e_as1')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_as2" class="form-control" maxlength="60"
                                        placeholder="Alamat Surat Menyurat 2" name="e_as2" value="{{ $pelesen->e_as2 }}">
                                    @error('e_as2')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror

                                    <input type="text" id="e_as3" class="form-control" maxlength="60"
                                        placeholder="Alamat Surat Menyurat 3" name="e_as3" value="{{ $pelesen->e_as3 }}">
                                    @error('e_as3')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    No. Telefon (Pejabat / Kilang)</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_notel" class="form-control" maxlength="40"
                                        placeholder="No. Telefon Pejabat / Kilang" onkeypress="return isNumberKey(event)"
                                        name="e_notel" value="{{ $pelesen->e_notel }}" required>
                                    @error('e_notel')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                             <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    No. Faks</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_nofax" class="form-control" placeholder="No. Faks" maxlength="60"
                                        name="e_nofax" value="{{ $pelesen->e_nofax }}" onkeypress="return isNumberKey(event)" required>
                                    @error('e_nofax')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                             <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    Alamat Emel Kilang</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="email" id="e_email" class="form-control" placeholder="Alamat Emel" maxlength="60"
                                        name="e_email" value="{{ $pelesen->e_email }}">
                                    @error('e_email')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                             <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    Nama Pegawai Melapor</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_npg" class="form-control" maxlength="60" placeholder="Nama Pegawai Melapor"
                                        name="e_npg" value="{{ $pelesen->e_npg }}">
                                    @error('e_npg')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                             <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    Jawatan Pegawai Melapor</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_jpg" class="form-control" maxlength="60"
                                        placeholder="Jawatan Pegawai Melapor" name="e_jpg" value="{{ $pelesen->e_jpg }}"
                                        required>
                                    @error('e_jpg')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                             <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    No. Telefon Pegawai Melapor</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no-tel-pegawai-melapor" class="form-control" maxlength="40"
                                        placeholder="No. Telefon Pegawai Melapor" name="e_notel_pg"
                                        onkeypress="return isNumberKey(event)" value="{{ $pelesen->e_notel_pg }}"
                                        required>
                                    @error('e_notel_pg')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                             <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    Alamat Emel Pegawai Melapor</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="email" id="e_email_pg" class="form-control" maxlength="100"
                                        placeholder="Alamat Emel Pegawai Melapor" name="e_email_pg"
                                        value="{{ $pelesen->e_email_pg }}" required multiple>
                                    @error('e_email_pg')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror

                                </div>
                            </div>
                             <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    Nama Pegawai Bertanggungjawab</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_npgtg" class="form-control" maxlength="60"
                                        placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                        value="{{ $pelesen->e_npgtg }}" required>
                                    @error('e_npgtg')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                             <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    Jawatan Pegawai
                                    Bertanggungjawab</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_jpgtg" class="form-control" maxlength="60"
                                        placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
                                        value="{{ $pelesen->e_jpgtg }}" required>
                                    @error('e_jpgtg')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                             <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    Alamat Emel Pengurus</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="email" id="e_email_pengurus" class="form-control" maxlength="60"
                                        placeholder="Alamat Emel Pengurus" name="e_email_pengurus"
                                        value="{{ $pelesen->e_email_pengurus }}" required multiple>
                                    @error('e_email_pengurus')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                             <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    Syarikat Induk</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="e_syktinduk" class="form-control" placeholder="Syarikat Induk"
                                        name="e_syktinduk" value="{{ $pelesen->e_syktinduk }}" required>

                                    @error('e_syktinduk')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                             <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    Kumpulan </label>
                                </div>
                                <div class="col-md-7">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="e_group" name="e_group" required>
                                            <option {{ $pelesen->e_group == 'GOV' ? 'selected' : '' }} value="GOV">
                                                Kerajaan</option>
                                            <option {{ $pelesen->e_group == 'IND' ? 'selected' : '' }} value="IND">
                                                Swasta</option>
                                        </select>
                                    </fieldset>
                                    @error('e_group')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                             <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">
                                    Kapasiti Pemprosesan / Tahun</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="kap_proses" class="form-control"
                                        onkeypress="return isNumberKey(event)" placeholder="Kapasiti Pemprosesan / Tahun" oninput="validate_two_decimal(this)"
                                        name="kap_proses" value="{{ $pelesen->kap_proses }}" required>
                                    @error('kap_proses')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <span><br></span><label for="fname"
                                        class="control-label col-form-label required">
                                        Bilangan Tangki</label><br>
                                        <label for="fname"
                                        class="control-label col-form-label required">
                                        Kapasiti tangki Simpanan (Tan)</label>
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
                                                <input type="text" class="form-control" name='bil_tangki_cpo' style="width:100%"
                                                    size="15" id="bil_tangki_cpo" required title="Sila isikan butiran ini."
                                                    onkeypress="return isNumberKey(event)"
                                                    value="{{ $pelesen->bil_tangki_cpo }}" onchange="validation_jumlah()">
                                                @error('bil_tangki_cpo')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name='bil_tangki_ppo' size="15"
                                                    onkeypress="return isNumberKey(event)" style="width:100%" id="bil_tangki_ppo"
                                                    required title="Sila isikan butiran ini."
                                                    value="{{ $pelesen->bil_tangki_ppo }}" onchange="validation_jumlah()">
                                                @error('bil_tangki_ppo')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name='bil_tangki_cpko' size="15"
                                                    onkeypress="return isNumberKey(event)" style="width:100%" id="bil_tangki_cpko"
                                                    required title="Sila isikan butiran ini."
                                                    value="{{ $pelesen->bil_tangki_cpko  }}" onchange="validation_jumlah()">
                                                @error('bil_tangki_cpko')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td> <input type="text" class="form-control" name='bil_tangki_ppko' size="15"
                                                    onkeypress="return isNumberKey(event)" style="width:100%" id="bil_tangki_ppko"
                                                    required title="Sila isikan butiran ini."
                                                    value="{{ $pelesen->bil_tangki_ppko }}" onchange="validation_jumlah()">
                                                @error('bil_tangki_ppko')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td><input type="text" class="form-control" name='bil_tangki_oleo' size="15"
                                                    onkeypress="return isNumberKey(event)" style="width:100%" id="bil_tangki_oleo"
                                                    required title="Sila isikan butiran ini."
                                                    value="{{ $pelesen->bil_tangki_oleo }}" onchange="validation_jumlah()">
                                                @error('bil_tangki_oleo')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td><input type="text" class="form-control" name='bil_tangki_others' size="15"
                                                    onkeypress="return isNumberKey(event)" style="width:100%" id="bil_tangki_others"
                                                    required title="Sila isikan butiran ini."
                                                    value="{{ $pelesen->bil_tangki_others }}" onchange="validation_jumlah()">
                                                @error('bil_tangki_others')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <b>
                                                    <span id="bil_tangki_jumlah">{{ old('bil_tangki_jumlah') ?? number_format($jumlah, 2) }}</span>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" name='kap_tangki_cpo'
                                                    onkeypress="return isNumberKey(event)" style="width:100%" id="kap_tangki_cpo"
                                                    onchange="validation_jumlah2()" title="Sila isikan butiran ini."
                                                    value="{{ $pelesen->kap_tangki_cpo  }}">
                                                @error('kap_tangki_cpo')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>  <input type="text" class="form-control" name='kap_tangki_ppo'
                                                onkeypress="return isNumberKey(event)" style="width:100%" id="kap_tangki_ppo"
                                                    onchange="validation_jumlah2()" title="Sila isikan butiran ini."
                                                    value="{{ $pelesen->kap_tangki_ppo  }}">
                                                @error('kap_tangki_ppo')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>  <input type="text" class="form-control" name='kap_tangki_cpko'
                                                    onkeypress="return isNumberKey(event)" style="width:100%" id="kap_tangki_cpko"
                                                    onchange="validation_jumlah2()" title="Sila isikan butiran ini."
                                                    value="{{ $pelesen->kap_tangki_cpko }}">
                                                @error('kap_tangki_cpko')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>  <input type="text" class="form-control" name='kap_tangki_ppko'
                                                    onkeypress="return isNumberKey(event)" style="width:100%" id="kap_tangki_ppko"
                                                    onchange="validation_jumlah2()" title="Sila isikan butiran ini."
                                                    value="{{ $pelesen->kap_tangki_ppko  }}">
                                                @error('kap_tangki_ppko')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td>  <input type="text" class="form-control" name='kap_tangki_oleo'
                                                    onkeypress="return isNumberKey(event)" style="width:100%" id="kap_tangki_oleo"
                                                    onchange="validation_jumlah2()" title="Sila isikan butiran ini."
                                                    value="{{ $pelesen->kap_tangki_oleo }}">
                                                @error('kap_tangki_oleo')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila isi butiran ini</strong>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td><input type="text" class="form-control" name='kap_tangki_others'
                                                onkeypress="return isNumberKey(event)" style="width:100%" id="kap_tangki_others"
                                                onchange="validation_jumlah2()" title="Sila isikan butiran ini."
                                                value="{{ $pelesen->kap_tangki_others  }}">
                                            @error('kap_tangki_others')
                                                <div class="alert alert-danger">
                                                    <strong>Sila isi butiran ini</strong>
                                                </div>
                                            @enderror
                                            </td>
                                            <td> <b><span id="kap_tangki_jumlah">
                                                {{ old('kap_tangki_jumlah') ?? number_format($jumlah2, 2) }}
                                                </span>
                                                </b>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            </div>
                            <div class="row mx-3" style="margin-left:14%">
                                <i>Nota: Sekiranya kilang/pelesen tiada tangki simpanan
                                    khusus untuk sesuatu produk. Sila campurkan kesemua
                                    bilangan dan kapasiti tangki dan lapor dalam kategori Others
                                </i>
                            </div>


                        </div>


                        <div class="row justify-content-center form-group" style="margin-top: 2%">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#next">Simpan</button>
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
                                        <button type="button" class="close" data-dismiss="modal"
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
            </div>








            <a href="#" class="back-to-top d-flex justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>


            <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
            <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
            <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
            <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
            <script src="{{ asset('theme/js/app.js') }}"></script>

            <script src="assets/js/main.js"></script>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
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
                            bil_tangki_oleo)) + parseFloat(Number(bil_tangki_others));

                    document.getElementById('bil_tangki_jumlah').innerHTML = jumlah_input.toFixed(2);
                }
            </script>
            <script>
                function validation_jumlah2() {
                    var kap_tangki_cpo = $("#kap_tangki_cpo").val();
                    var kap_tangki_ppo = $("#kap_tangki_ppo").val();
                    var kap_tangki_cpko = $("#kap_tangki_cpko").val();
                    var kap_tangki_ppko = $("#kap_tangki_ppko").val();
                    var kap_tangki_oleo = $("#kap_tangki_oleo").val();
                    var kap_tangki_others = $("#kap_tangki_others").val();

                    var jumlah = $("#jumlah2").val();
                    var jumlah_input = 0;

                    jumlah_input = parseFloat(Number(kap_tangki_cpo)) + parseFloat(Number(kap_tangki_ppo)) +
                        parseFloat(Number(kap_tangki_cpko)) + parseFloat(Number(kap_tangki_ppko)) + parseFloat(Number(
                            kap_tangki_oleo)) + parseFloat(Number(kap_tangki_others));

                    document.getElementById('kap_tangki_jumlah').innerHTML = jumlah_input.toFixed(2);
                }
            </script>
            </body>

            </html>
        @endsection
