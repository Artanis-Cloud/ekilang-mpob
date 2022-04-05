@extends($layout)

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="mt-3 mb-4 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="margin-left:25%; color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-6 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='#25877b'"
                                                            onMouseOut="this.style.color='white'">
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
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Maklumat Asas Pelesen</h3>
                                        <h5 style="color: rgb(39, 80, 71); "><i> Nota : Sila kemaskini jika ada perubahan
                                            </i>
                                        </h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
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
                                                    {{-- @error('e_ap1')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror --}}
                                                </div>
                                                <div class="col-md-6" style="margin-left: 41.6%; ">
                                                    <input type="text" id="e_ap2" class="form-control"
                                                        placeholder="Alamat Premis Berlesen 2" name="e_ap2"
                                                        value="{{ $pelesen->e_ap2 }}">
                                                </div>
                                                <div class="col-md-6" style="margin-left: 41.6%;">
                                                    <input type="text" id="e_ap3" class="form-control"
                                                        placeholder="Alamat Premis Berlesen 3" name="e_ap3"
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
                                                    No. Telefon (Pejabat / Kilang)</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_notel" class="form-control"
                                                        placeholder="No. Telefon Pejabat / Kilang" name="e_notel"
                                                        value="{{ $pelesen->e_notel }}" required>
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
                                                    No. Faks</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_nofax" class="form-control"
                                                        placeholder="No. Faks" name="e_nofax"
                                                        value="{{ $pelesen->e_nofax }}" required>
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
                                                        placeholder="Alamat Emel" name="e_email"
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
                                                    <input type="text" id="no-tel-pegawai-melapor" class="form-control"
                                                        placeholder="No. Telefon Pegawai Melapor"
                                                        name="no-tel-pegawai-melapor" value="">
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
                                                    Alamat Emel Pegawai Melapor</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="no-tel-pegawai-melapor" class="form-control"
                                                        placeholder="Alamat Emel Pegawai Melapor"
                                                        name="no-tel-pegawai-melapor" value="">
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
                                                    Jawatan Pegawai
                                                    Bertanggungjawab</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="e_jpgtg" class="form-control"
                                                        placeholder="Jawatan Pegawai Bertanggungjawab" name="e_jpgtg"
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
                                                        value="{{ $pelesen->e_email_pengurus ?? '-' }}">


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
                                            <div class="row">
                                                <label for="fname"
                                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                    Kapasiti Pemprosesan / Tahun</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="" class="form-control"
                                                        placeholder="Kapasiti Pemprosesan / Tahun" name="">
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
                                                    Kapasiti Tangki Simpanan</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="" class="form-control"
                                                        placeholder="Kapasiti Tangki Simpanan" name="">
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
                                                    Bilangan Tangki</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="" class="form-control" placeholder="CPO"
                                                        name="">
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
                                                    Kapasiti Tangki Simpanan (Tan)</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="" class="form-control" placeholder="CPO"
                                                        name="">
                                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                                </div><br><br>

                                            </div>
                                            <div class="row">
                                                <i style="width: 90%">Nota: Sekiranya kilang/pelesen tiada tangki simpanan
                                                    khusus untuk sesuatu produk. Sila campurkan kesemua
                                                    bilangan dan kapasiti tangki dan lapor dalam kategori Others
                                                </i>
                                            </div>
                                        </div>


                                        <div class="row form-group" style="margin-top: 7%">
                                     <div class="text-right col-md-7 mb-4 ">
                                                <button type="submit" class="btn btn-primary"
                                                    style="float: right">Simpan</button>
                                            </div>

                                        </div>

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
                                                            Anda pasti mahu menyimpan maklumat ini?
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











            <br>





    </section><!-- End Hero -->








    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>
    <script src="{{ asset('theme/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/dist/js/custom.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>

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



    </body>

    </html>
@endsection
