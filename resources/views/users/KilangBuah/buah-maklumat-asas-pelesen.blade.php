@extends('layouts.main')

@section('content')

    <div class="page-wrapper">
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

                    <div class="card-body">
                            <div class="pl-3">

                                <div class=" text-center">
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h3>
                                    <h5 style="color: rgb(39, 80, 71); "><i> Nota : Sila kemaskini jika ada perubahan
                                        </i>
                                    </h5>
                                </div>
                                <hr>
                                <form action="{{ route('buah.update.maklumat.asas.pelesen', [$pelesen->e_id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="container center mt-5">
                                        <div class="row" style="margin-bottom:2.5%; margin-top:-2%">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label required col-form-label align-items-center">
                                                Alamat Premis Berlesen</label>
                                            <div class="col-md-6">
                                                <input type="text" id="e_ap1" class="form-control"
                                                    placeholder="Alamat Premis Berlesen 1" name="e_ap1"
                                                    value="{{ $pelesen->e_ap1 }}" required>
                                                @error('e_ap1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6" style="margin-left: 41.6%; ">
                                                <input type="text" id="e_ap2" class="form-control"
                                                    placeholder="Alamat Premis Berlesen 2" name="e_ap2"
                                                    value="{{ $pelesen->e_ap2 }}">
                                                    @error('e_ap2')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6" style="margin-left: 41.6%;">
                                                <input type="text" id="e_ap3" class="form-control"
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
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Alamat Surat Menyurat</label>
                                            <div class="col-md-6">
                                                <input type="text" id="e_as1" class="form-control"
                                                    placeholder="Alamat Surat Menyurat 1" name="e_as1"
                                                    value="{{ $pelesen->e_as1 }}">
                                                @error('e_as1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6" style="margin-left: 41.6%">
                                                <input type="text" id="e_as2" class="form-control"
                                                    placeholder="Alamat Surat Menyurat 2" name="e_as2"
                                                    value="{{ $pelesen->e_as2 }}">
                                                    @error('e_as2')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6" style="margin-left: 41.6%">
                                                <input type="text" id="e_as3" class="form-control"
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
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                No. Telefon (Pejabat / Kilang)</label>
                                            <div class="col-md-6">
                                                <input type="text" id="e_notel" class="form-control"
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
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                No. Faks</label>
                                            <div class="col-md-6">
                                                <input type="text" id="e_nofax" class="form-control"
                                                    placeholder="No. Faks" name="e_nofax"
                                                    value="{{ $pelesen->e_nofax }}" required>
                                                @error('e_nofax')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Alamat Emel Kilang</label>
                                            <div class="col-md-6">
                                                <input type="email" id="e_email" class="form-control"
                                                    placeholder="Alamat Emel" name="e_email"
                                                    value="{{ $pelesen->e_email }}">
                                                @error('e_email')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Nama Pegawai Melapor</label>
                                            <div class="col-md-6">
                                                <input type="text" id="e_npg" class="form-control"
                                                    placeholder="Nama Pegawai Melapor" name="e_npg"
                                                    value="{{ $pelesen->e_npg }}">
                                                @error('e_npg')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Jawatan Pegawai Melapor</label>
                                            <div class="col-md-6">
                                                <input type="text" id="e_jpg" class="form-control"
                                                    placeholder="Jawatan Pegawai Melapor" name="e_jpg"
                                                    value="{{ $pelesen->e_jpg }}">
                                                @error('e_jpg')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                No. Telefon Pegawai Melapor</label>
                                            <div class="col-md-6">
                                                <input type="text" id="no-tel-pegawai-melapor" class="form-control"
                                                    placeholder="No. Telefon Pegawai Melapor"
                                                    name="e_notel_pg"
                                                    onkeypress="return isNumberKey(event)"  value="{{ $pelesen->e_notel_pg }}">
                                                @error('e_notel_pg')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Alamat Emel Pegawai Melapor</label>
                                            <div class="col-md-6">
                                                <input type="email" id="no-tel-pegawai-melapor" class="form-control"
                                                    placeholder="Alamat Emel Pegawai Melapor"
                                                    name="e_email_pg" value="{{ $pelesen->e_email_pg }}">
                                                @error('e_email_pg')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Nama Pegawai Bertanggungjawab</label>
                                            <div class="col-md-6">
                                                <input type="text" id="e_npgtg" class="form-control"
                                                    placeholder="Nama Pegawai Bertanggungjawab" name="e_npgtg"
                                                    value="{{ $pelesen->e_npgtg }}">
                                                @error('e_npgtg')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Jawatan Pegawai
                                                Bertanggungjawab</label>
                                            <div class="col-md-6">
                                                <input type="text" id="e_jpgtg" class="form-control"
                                                    placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
                                                    value="{{ $pelesen->e_jpgtg }}">
                                                @error('e_jpgtg')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Alamat Emel Pengurus</label>
                                            <div class="col-md-6">
                                                <input type="email" id="e_email_pengurus" class="form-control"
                                                    placeholder="Alamat Emel Pengurus" name="e_email_pengurus"
                                                    value="{{ $pelesen->e_email_pengurus }}">


                                                @error('e_email_pengurus')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Syarikat Induk</label>
                                            <div class="col-md-6">
                                                <input type="text" id="syarikat_induk" class="form-control"
                                                    placeholder="Syarikat Induk" name="e_syktinduk"
                                                    value="{{ $pelesen->e_syktinduk}}">
                                                @error('e_syktinduk')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Kumpulan </label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="e_group" name="e_group">
                                                        <option selected hidden disabled>{{ $pelesen->e_group ?? 'Sila Pilih' }}</option>
                                                            <option value="Kerajaan">Kerajaan</option>
                                                            <option value="Swasta">Swasta</option>
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
                                                    <select class="form-control" id="e_poma" name="e_poma">
                                                        <option selected hidden disabled>{{ $pelesen->e_poma ?? 'Sila Pilih' }}</option>
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak">Tidak</option>
                                                    </select>
                                                </fieldset>
                                                {{-- @error('alamat_kilang_1')
                                                            <div class="alert alert-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Kapasiti Pemprosesan / Tahun</label>
                                            <div class="col-md-6">
                                                <input type="text" id="kap_proses" class="form-control"
                                                    placeholder="Kapasiti Pemprosesan / Tahun" name="kap_proses"
                                                    onkeypress="return isNumberKey(event)"
                                                    value="{{ $pelesen->kap_proses  }}">

                                                {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Kapasiti Tangki Simpanan</label>
                                            <div class="col-md-6">
                                                <input type="text" id="kap_tangki" class="form-control"
                                                    placeholder="Kapasiti Tangki Simpanan" name="kap_tangki"
                                                    onkeypress="return isNumberKey(event)"
                                                    value="{{ $pelesen->kap_tangki }}">

                                                {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row mt-3 " style="text-align: center; font-size: 12px">
                                            <div class="col-md-5">
                                                <span ></span>
                                            </div>


                                            <div class="col-md-1">
                                                <span>CPO</span>
                                            </div>

                                        </div>
                                        <div class="row mt-3 text-right">
                                            <div class="col-md-5">
                                                <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Bilangan Tangki</label>
                                                {{-- <span class="required">Bilangan Tangki</span> --}}
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
                                            <div class="col-md-5">
                                                <label for="fname"
                                                class="text-right control-label col-form-label required align-items-center">
                                                Kapasiti Tangki Simpanan (Tan)</label>
                                                {{-- <span class="required">Kapasiti Tangki Simpanan (Tan)</span> --}}
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
                                    </div>


                                    <div class="row form-group" style="margin-top: 2%">
                                        <div class="text-right col-md-6">
                                            <button type="button" class="btn btn-primary"  data-toggle="modal"
                                            data-target="#next">Simpan</button>
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".floatNumberField").change(function() {
                $(this).val(parseFloat($(this).val()).toFixed(2));
            });
        });
    </script>

    </body>

    </html>
@endsection
