@extends('layouts.main')

@section('content')
    <div class="page-wrapper" style="transition: 0s;">

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
        <div class="card" style="margin-right:3%; margin-left:3%;">
            {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}
            <div class="card-body">
                {{-- <div class="row"> --}}
                {{-- <div class="col-md-4 col-12"> --}}
                <div class=" text-center">
                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h3>
                    <h5 style="color: rgb(39, 80, 71); "><i> Nota : Sila kemaskini jika ada perubahan </i>
                    </h5>
                    {{-- <p>Maklumat Kilang</p> --}}
                </div>
                <hr>
                <i>Arahan: Sila pastikan anda mengisi semua maklumat di kawasan yang bertanda ' </i><b style="color: red"> *
                </b><i>'</i>
                {{-- @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif --}}
                <form action="{{ route('penapis.update.maklumat.asas.pelesen', [$pelesen->e_id]) }}" method="post"
                    onsubmit="return check()" novalidate>
                    @csrf
                    <div class="container center mt-5">
                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label required col-form-label">
                                    Alamat Premis Berlesen</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_ap1" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                    placeholder="Alamat Premis Berlesen 1" name="e_ap1" value="{{ $pelesen->e_ap1 }}"
                                    oninput="this.setCustomValidity(''); invokeFunc()">
                                <input type="text" id="e_ap2" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Alamat Premis Berlesen 2" name="e_ap2" value="{{ $pelesen->e_ap2 }}"
                                    oninput="this.setCustomValidity(''); invokeFunc2()">
                                <input type="text" id="e_ap3" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Alamat Premis Berlesen 3" name="e_ap3" value="{{ $pelesen->e_ap3 }}"
                                    oninput="this.setCustomValidity(''); invokeFunc3()">
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:0px">
                            <div class="col-sm-3 " style="margin: 0px">
                                <label for="fname" class="control-label col-form-label"></i></label>
                            </div>
                            <div class="custom-control custom-checkbox col-md-7">
                                <input onchange="alamat();" type="checkbox" class="custom-control-input" id="alamat_sama"
                                    name="alamat_sama" {{ old('alamat_sama') == 'on' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="alamat_sama">Alamat sama seperti di
                                    atas</label>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Alamat Surat Menyurat</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_as1" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" required
                                    placeholder="Alamat Surat Menyurat 1" name="e_as1" value="{{ $pelesen->e_as1 }}"
                                    oninput="this.setCustomValidity(''); invokeFunc4()">
                                <input type="text" id="e_as2" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Alamat Surat Menyurat 2" name="e_as2" value="{{ $pelesen->e_as2 }}"
                                    oninput="this.setCustomValidity(''); invokeFunc5()">
                                <input type="text" id="e_as3" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Alamat Surat Menyurat 3" name="e_as3" value="{{ $pelesen->e_as3 }}"
                                    oninput="this.setCustomValidity(''); invokeFunc6()">
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    No. Telefon (Pejabat / Kilang)</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_notel" class="form-control" maxlength=40
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="No. Telefon Pejabat / Kilang" name="e_notel"
                                    oninput="this.setCustomValidity(''); invokeFunc7()" value="{{ $pelesen->e_notel }}"
                                    onkeypress="return isNumberKey(event)" required>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label">
                                    No. Faks</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_nofax" class="form-control" maxlength=40
                                    placeholder="No. Faks" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    name="e_nofax" value="{{ $pelesen->e_nofax }}"
                                    onkeypress="return isNumberKey(event)" oninput="this.setCustomValidity(''); invokeFunc8()">
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Alamat Emel Kilang</label>
                            </div>
                            <div class="col-md-7">
                                <input type="email" id="e_email" class="form-control" maxlength=60
                                    placeholder="Alamat Emel"
                                    oninvalid="setCustomValidity('Sila isi Alamat Emel Kilang dengan betul')"
                                    name="e_email" value="{{ $pelesen->e_email }}" required
                                    oninput="this.setCustomValidity(''); invokeFunc9()">
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Nama Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_npg" class="form-control" maxlength=60
                                    placeholder="Nama Pegawai Melapor"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" name="e_npg"
                                    value="{{ $pelesen->e_npg }}" required oninput="this.setCustomValidity(''); invokeFunc10()">
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Jawatan Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_jpg" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')" oninput="this.setCustomValidity(''); invokeFunc11()"
                                    placeholder="Jawatan Pegawai Melapor" name="e_jpg" value="{{ $pelesen->e_jpg }}"
                                    required>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    No. Telefon Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_notel_pg" maxlength=40 class="form-control"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="No. Telefon Pegawai Melapor" name="e_notel_pg"
                                    oninput="this.setCustomValidity(''); invokeFunc12()" value="{{ $pelesen->e_notel_pg }}"
                                    onkeypress="return isNumberKey(event)" required>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Alamat Emel Pegawai Melapor</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_email_pg" maxlength=100 class="form-control"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Alamat Emel Pegawai Melapor" name="e_email_pg"
                                    oninput="this.setCustomValidity(''); invokeFunc13()" value="{{ $pelesen->e_email_pg }}" required
                                    multiple>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Nama Pegawai Bertanggungjawab</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_npgtg" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                    oninput="this.setCustomValidity(''); invokeFunc14()" value="{{ $pelesen->e_npgtg }}" required>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Jawatan Pegawai
                                    Bertanggungjawab</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_jpgtg" class="form-control" maxlength=60
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
                                    oninput="this.setCustomValidity(''); invokeFunc15()" value="{{ $pelesen->e_jpgtg }}" required>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Alamat Emel Pengurus</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_email_pengurus" class="form-control" maxlength=100
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Alamat Emel Pengurus" name="e_email_pengurus"
                                    oninput="this.setCustomValidity(''); invokeFunc16()" value="{{ $pelesen->e_email_pengurus }}" required
                                    multiple>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Syarikat Induk</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="e_syktinduk" class="form-control"
                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                    placeholder="Syarikat Induk" name="e_syktinduk" oninput="this.setCustomValidity(''); invokeFunc17()"
                                    value="{{ $pelesen->e_syktinduk }}" required>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Kumpulan </label>
                            </div>
                            <div class="col-md-7">
                                <fieldset class="form-group">
                                    <select class="form-control" id="e_group" name="e_group" required
                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                        oninput="this.setCustomValidity('');">
                                        <option selected value="">Sila Pilih Kumpulan</option>

                                        <option {{ $pelesen->e_group == 'GOV' ? 'selected' : '' }} value="GOV">
                                            Kerajaan</option>
                                        <option {{ $pelesen->e_group == 'IND' ? 'selected' : '' }} value="IND">
                                            Swasta</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <label for="fname" class="control-label col-form-label required">
                                    Kapasiti Pemprosesan / Tahun</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" id="kap_proses" class="form-control" onkeyup="FormatCurrency(this)"
                                    oninvalid="setCustomValidity('Sila isi butiran ini')"
                                    placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses"
                                    onchange="validation_jumlah()" oninput="this.setCustomValidity(''); invokeFunc18()"
                                    onkeypress="return isNumberKey(event)" value="{{ $pelesen->kap_proses }}" required>
                            </div>
                        </div>


                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-3 form-group" style="margin: 0px">
                                <span><br></span><label for="fname" class="control-label col-form-label required">
                                    Bilangan Tangki</label><br>
                                <label for="fname" class="control-label col-form-label required">
                                    Kapasiti tangki Simpanan (Tan)</label>
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
                                                style="width:100%" oninput="this.setCustomValidity(''); invokeFunc19()" size="15"
                                                id="bil_tangki_cpo" onkeypress="return isNumberKey(event)"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                title="Sila isikan butiran ini."
                                                value="{{ $pelesen->bil_tangki_cpo }}" onchange="validation_jumlah()"
                                                required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name='bil_tangki_ppo'
                                                style="width:100%" oninput="this.setCustomValidity(''); invokeFunc20()" size="15"
                                                id="bil_tangki_ppo" onkeypress="return isNumberKey(event)"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                title="Sila isikan butiran ini."
                                                value="{{ $pelesen->bil_tangki_ppo }}" onchange="validation_jumlah()"
                                                required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name='bil_tangki_cpko'
                                                style="width:100%" oninput="this.setCustomValidity(''); invokeFunc21()" size="15"
                                                id="bil_tangki_cpko" onkeypress="return isNumberKey(event)"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                title="Sila isikan butiran ini."
                                                value="{{ $pelesen->bil_tangki_cpko }}" onchange="validation_jumlah()"
                                                required>
                                        </td>
                                        <td> <input type="text" class="form-control" name='bil_tangki_ppko'
                                                style="width:100%" oninput="this.setCustomValidity(''); invokeFunc22()" size="15"
                                                id="bil_tangki_ppko" onkeypress="return isNumberKey(event)"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                title="Sila isikan butiran ini."
                                                value="{{ $pelesen->bil_tangki_ppko }}"
                                                onchange="validation_jumlah()" required>
                                        </td>
                                        <td><input type="text" class="form-control" name='bil_tangki_others'
                                                style="width:100%" oninput="this.setCustomValidity(''); invokeFunc23()" size="15"
                                                id="bil_tangki_others" onkeypress="return isNumberKey(event)"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                title="Sila isikan butiran ini."
                                                value="{{ $pelesen->bil_tangki_others }}"
                                                onchange="validation_jumlah()" required>
                                        </td>
                                        <td>
                                            <b><span
                                                    id="bil_tangki_jumlah">{{ old('bil_tangki_jumlah') ?? number_format($jumlah, 2) }}</span></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" name='kap_tangki_cpo'
                                                style="width:100%" oninput="this.setCustomValidity(''); invokeFunc24()" id="kap_tangki_cpo"
                                                onkeypress="return isNumberKey(event)"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                title="Sila isikan butiran ini." value="{{ $pelesen->kap_tangki_cpo }}"
                                                onchange="validation_jumlah2()" required>
                                        </td>
                                        <td> <input type="text" class="form-control" name='kap_tangki_ppo'
                                                style="width:100%" oninput="this.setCustomValidity(''); invokeFunc25()" id="kap_tangki_ppo"
                                                onkeypress="return isNumberKey(event)"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                title="Sila isikan butiran ini."
                                                value="{{ $pelesen->kap_tangki_ppo }}" onchange="validation_jumlah2()"
                                                required>
                                        </td>
                                        <td> <input type="text" class="form-control" name='kap_tangki_cpko'
                                                style="width:100%" oninput="this.setCustomValidity(''); invokeFunc26()" id="kap_tangki_cpko"
                                                onkeypress="return isNumberKey(event)"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                title="Sila isikan butiran ini."
                                                value="{{ $pelesen->kap_tangki_cpko }}"
                                                onchange="validation_jumlah2()" required>
                                        </td>
                                        <td> <input type="text" class="form-control" name='kap_tangki_ppko'
                                                style="width:100%" oninput="this.setCustomValidity(''); invokeFunc27()" id="kap_tangki_ppko"
                                                onkeypress="return isNumberKey(event)"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                title="Sila isikan butiran ini."
                                                value="{{ $pelesen->kap_tangki_ppko }}"
                                                onchange="validation_jumlah2()" required>
                                        </td>
                                        <td> <input type="text" class="form-control" name='kap_tangki_others'
                                                style="width:100%" oninput="this.setCustomValidity(''); invokeFunc28()" id="kap_tangki_others"
                                                onkeypress="return isNumberKey(event)"
                                                oninvalid="setCustomValidity('Sila isi butiran ini')"
                                                title="Sila isikan butiran ini."
                                                value="{{ $pelesen->kap_tangki_others }}"
                                                onchange="validation_jumlah2()" required>
                                        </td>
                                        <td><b><span id="kap_tangki_jumlah">
                                                    {{ old('kap_tangki_jumlah') ?? number_format($jumlah2, 2) }}
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

                    </div>
            </div>


            <div class="row justify-content-center form-group" style="margin-top: 2%; ">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#next">Simpan</button>
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
                            <button type="submit" class="btn btn-primary ml-1" data-bs="modal" id="checkBtn">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Ya</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </form>

            {{-- </div> --}}


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


            <script type="text/javascript">
                $(document).ready(function() {
                    $('#checkBtn').click(function() {
                        cpo = $('#bil_tangki_cpo').val();
                        ppo = $('#bil_tangki_ppo').val();
                        cpko = $('#bil_tangki_cpko').val();
                        ppko = $('#bil_tangki_ppko').val();
                        others = $('#bil_tangki_others').val();

                        if (cpo == 0 && ppo == 0 && cpko == 0 && ppko == 0 && others == 0) {
                            console.log('lain');

                            toastr.error(
                                'Sila isi bilangan salah satu tangki produk',
                                'Ralat!', {
                                    "progressBar": true
                                })
                            return false;
                        }


                    });
                });
            </script>
            <script>
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
                kap_cpo.disabled = true;
                kap_ppo.disabled = true;
                kap_cpko.disabled = true;
                kap_ppko.disabled = true;
                kap_others.disabled = true;
                bil_cpo.addEventListener("change", stateHandle);
                bil_ppo.addEventListener("change", stateHandle);
                bil_cpko.addEventListener("change", stateHandle);
                bil_ppko.addEventListener("change", stateHandle);
                bil_others.addEventListener("change", stateHandle);

                function stateHandle() {
                    if (document.querySelector("#bil_tangki_cpo").value === "" || document.querySelector("#bil_tangki_cpo")
                        .value === "0") {
                        kap_cpo.disabled = true;
                    } else {
                        kap_cpo.disabled = false;
                    }
                    if (document.querySelector("#bil_tangki_ppo").value === "" || document.querySelector("#bil_tangki_ppo")
                        .value === "0") {
                        kap_ppo.disabled = true;
                    } else {
                        kap_ppo.disabled = false;
                    }
                    if (document.querySelector("#bil_tangki_cpko").value === "" || document.querySelector("#bil_tangki_cpko")
                        .value === "0") {
                        kap_cpko.disabled = true;
                    } else {
                        kap_cpko.disabled = false;
                    }
                    if (document.querySelector("#bil_tangki_ppko").value === "" || document.querySelector("#bil_tangki_ppko")
                        .value === "0") {
                        kap_ppko.disabled = true;
                    } else {
                        kap_ppko.disabled = false;
                    }
                    if (document.querySelector("#bil_tangki_others").value === "" || document.querySelector("#bil_tangki_others")
                        .value === "0") {
                        kap_others.disabled = true;
                    } else {
                        kap_others.disabled = false;
                    }
                }
            </script>

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
                    // kap_proses
                    field = document.getElementById("kap_proses");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // bil tangki cpo
                    field = document.getElementById("bil_tangki_cpo");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // bil_tangki_ppo
                    field = document.getElementById("bil_tangki_ppo");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // bil_tangki_cpko
                    field = document.getElementById("bil_tangki_cpko");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // bil tangki ppko
                    field = document.getElementById("bil_tangki_ppko");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // bil tangki others
                    field = document.getElementById("bil_tangki_others");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap tangki cpo
                    field = document.getElementById("kap_tangki_cpo");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap_tangki_ppo
                    field = document.getElementById("kap_tangki_ppo");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap_tangki_cpko
                    field = document.getElementById("kap_tangki_cpko");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap tangki ppko
                    field = document.getElementById("kap_tangki_ppko");
                    if (!field.checkValidity()) {
                        error += "Name must be 2-4 characters\r\n";
                    }
                    // kap tangki others
                    field = document.getElementById("kap_tangki_others");
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
                        })
                });


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
            <script>
                function alamat() {

                    var x = $("#alamat_sama").is(":checked");

                    if (x == true) {
                        //Get
                        var bla = $('#e_ap1').val();
                        //Set
                        $('#e_as1').val(bla).attr("disabled", "disabled");
                        $('#e_as1').val("");
                        //get
                        var bla = $('#e_ap2').val();
                        //Set
                        $('#e_as2').val(bla).attr("disabled", "disabled");
                        $('#e_as2').val("");

                        var bla = $('#e_ap3').val();
                        //Set
                        $('#e_as3').val(bla).attr("disabled", "disabled");
                        $('#e_as3').val("");

                        // $("#alamat_surat_menyurat_daerah").remove();
                        // $("#test1").append(html);

                    } else {
                        // document.getElementById("#alamat_surat_menyurat_1").readOnly = false;

                        $('#e_as1').attr("disabled", false)
                        $('#e_as2').attr("disabled", false)
                        $('#e_as3').attr("disabled", false)

                    }
                    var e_ap1 = document.getElementById("e_ap1"),
                        e_as1 = document.getElementById("e_as1");
                    e_as1.value = e_ap1.value;

                    var e_ap2 = document.getElementById("e_ap2"),
                        e_as2 = document.getElementById("e_as2");
                    e_as2.value = e_ap2.value;

                    var e_ap3 = document.getElementById("e_ap3"),
                        e_as3 = document.getElementById("e_as3");
                    e_as3.value = e_ap3.value;


            }
        </script>
        <script>
            document.addEventListener('keypress', function (e) {
                if (e.keyCode === 13 || e.which === 13) {
                    e.preventDefault();
                    return false;
                }

            });
        </script>

<script>
    function invokeFunc() {
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
    function invokeFunc2() {
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
    function invokeFunc3() {
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
    function invokeFunc4() {
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
    function invokeFunc5() {
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
    function invokeFunc6() {
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
    function invokeFunc7() {
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
    function invokeFunc8() {
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
    function invokeFunc9() {
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
    function invokeFunc10() {
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
    function invokeFunc11() {
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
    function invokeFunc12() {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('e_email_pg').focus();
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
    function invokeFunc14() {
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
    function invokeFunc15() {
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
    function invokeFunc16() {
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
    function invokeFunc17() {
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
<script>
    function invokeFunc18() {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('bil_tangki_cpo').focus();
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
                document.getElementById('bil_tangki_ppo').focus();
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
                document.getElementById('bil_tangki_cpko').focus();
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
                document.getElementById('bil_tangki_ppko').focus();
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
                document.getElementById('bil_tangki_others').focus();
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
                document.getElementById('kap_tangki_cpo').focus();
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
                document.getElementById('kap_tangki_ppo').focus();
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
                document.getElementById('kap_tangki_cpko').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
        return evt.which;
    }
</script>
<script>
    function invokeFunc26() {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('kap_tangki_ppko').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
        return evt.which;
    }
</script>
<script>
    function invokeFunc27() {
        addEventListener('keydown', function(evt) {
            var whichKey = checkKey(evt);
            if (whichKey == 13) {
                console.log('successful');
                evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                document.getElementById('kap_tangki_others').focus();
            }

        });
    }

    function checkKey(evt) {
        console.log(evt.which);
        return evt.which;
    }
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
