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
                            <div class="align-self-center" style="margin-left: 2%; margin-bottom:-2%">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="align-self-center" style="margin-left: -1%">
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
                    <div class="card" style="margin-right:2%; margin-left:2%">
                        {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}
                        <form action="{{ route('isirung.add.bahagian.vi') }}" method="post">
                            @csrf
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">
                                    <div class="mb-4 text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71);">Bahagian 6</h3>
                                        <h5 style="color: rgb(39, 80, 71)">Eksport Produk Sawit</h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>
                                    <div class="container center mt-4">
                                        <div class="row">
                                            <label for="fname"
                                                class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                                Nama Produk</label>
                                            <div class="col-md-6">
                                                {{-- <fieldset class="form-group">
                                                    <select class="form-select" id="produk"
                                                        style="margin-left:42%; width:40%" name="e101_e4">
                                                        <option selected hidden disabled>Sila Pilih</option>
                                                        @foreach ($produk as $data)
                                                            <option value="{{ $data->prodid }}">
                                                                {{ $data->prodname }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </fieldset> --}}
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="e102_c4" style="margin-left:42%; width:40%" name='e102_c4'>
                                                        <option selected hidden disabled>Sila Pilih Produk</option>

                                                            <option value="X3">BPKL - X3
                                                            </option><option value="C8">BPKL - C8
                                                            </option><option value="DT">BPKO - DT
                                                            </option><option value="X2">BPKO - X2
                                                            </option><option value="C9">BPKS - C9
                                                            </option><option value="X4">BPKS - X4
                                                            </option><option value="82">CBPKO - 82
                                                            </option><option value="06">CPKL - 06
                                                            </option><option value="04">CPKO - 04
                                                            </option><option value="05">CPKS - 05
                                                            </option><option value="Y3">DFRBDPKL - Y3
                                                            </option><option value="Y4">DFRBDPKS - Y4
                                                            </option><option value="D2">HNBDPKL - D2
                                                            </option><option value="D5">HNBDPKO - D5
                                                            </option><option value="D6">HNBDPKS - D6
                                                            </option><option value="D3">HNBPKL - D3
                                                            </option><option value="D1">HNBPKO - D1
                                                            </option><option value="D4">HNBPKS - D4
                                                            </option><option value="C6">HPKL - C6
                                                            </option><option value="54">HPKO - 54
                                                            </option><option value="65">HPKS - 65
                                                            </option><option value="73">HRBDPKL - 73
                                                            </option><option value="72">HRBDPKO - 72
                                                            </option><option value="74">HRBDPKS - 74
                                                            </option><option value="Z7">INTER  PKO - Z7
                                                            </option><option value="AA">JGQRBDPKOS - AA
                                                            </option><option value="EN">MVO_CPKO - EN
                                                            </option><option value="Y2">MVO_RBDPKL - Y2
                                                            </option><option value="Y1">MVO_RBDPKO - Y1
                                                            </option><option value="A6">NBDPKL - A6
                                                            </option><option value="68">NBDPKO - 68
                                                            </option><option value="66">NBDPKS - 66
                                                            </option><option value="X6">NBHPKL - X6
                                                            </option><option value="X5">NBHPKO - X5
                                                            </option><option value="X7">NBHPKS - X7
                                                            </option><option value="A1">NBPKL - A1
                                                            </option><option value="57">NBPKO - 57
                                                            </option><option value="A8">NBPKS - A8
                                                            </option><option value="A5">NPKL - A5
                                                            </option><option value="58">NPKO - 58
                                                            </option><option value="A7">NPKS - A7
                                                            </option><option value="C1">PKAO - C1
                                                            </option><option value="33">PKC - 33
                                                            </option><option value="B1">PKE - B1
                                                            </option><option value="56">PKFAD - 56
                                                            </option><option value="EV">PKMF - EV
                                                            </option><option value="M1">PKOF - M1
                                                            </option><option value="B2">PKP - B2
                                                            </option><option value="X0">RBDHPKL - X0
                                                            </option><option value="W9">RBDHPKO - W9
                                                            </option><option value="X1">RBDHPKS - X1
                                                            </option><option value="32">RBDPKL - 32
                                                            </option><option value="GG">RBDPKL IP - GG
                                                            </option><option value="GE">RBDPKL MB - GE
                                                            </option><option value="GF">RBDPKL SG - GF
                                                            </option><option value="30">RBDPKO - 30
                                                            </option><option value="31">RBDPKS - 31
                                                            </option><option value="M7">RPKL - M7
                                                            </option><option value="G3">RPKO - G3
                                                            </option><option value="M8">RPKS - M8
                                                            </option><option value="FZ">SPKLFA - FZ
                                                            </option><option value="51"> Palm Kernel-51 </option>


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
                                                Nombor Borang Kastam 2</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='e102_c5'
                                                    style="margin-left:42%; width:40%" id="e102_c5" required
                                                    title="Sila isikan butiran ini.">
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
                                                Tarikh Eksport (dd/mm/yyyy) </label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name='e102_c6'
                                                    style="margin-left:42%; width:40%" id="e102_c6" required
                                                    title="Sila isikan butiran ini.">
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
                                                Kuantiti(Tan Metrik) </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='e102_c7'
                                                    style="margin-left:42%; width:40%" id="e102_c7" required
                                                    title="Sila isikan butiran ini.">
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
                                                Nilai</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name='e102_c8'
                                                    style="margin-left:42%; width:40%" id="e102_c8" required
                                                    title="Sila isikan butiran ini.">
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
                                                Destinasi Negara</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="e102_c9"
                                                        style="margin-left:42%; width:40%" name="e102_c9">
                                                        <option selected hidden disabled>Sila Pilih</option>
                                                        @foreach ($negara as $data)
                                                            <option value="{{ $data->kodnegara }}">
                                                                {{ $data->namanegara }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </fieldset>

                                            </div>
                                        </div>


                                    </div>


                                    <div class="row form-group" style="padding-top: 10px; ">



                                        <div class="text-right col-md-11 mb-4 ">
                                            <button type="submit" class="btn btn-primary " data-toggle="modal"
                                                style="float: right" data-target="#confirmation">
                                                Tambah</button>
                                        </div>

                                    </div>
                                </form>
                                    <br>
                                    <h5 style="color: rgb(39, 80, 71); text-align:center">Senarai Produk Minyak Sawit</h5>
                                    <hr>
                                    <section class="section">
                                        <div class="card">

                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-0">
                                                        <thead>
                                                            <tr style="text-align: center">
                                                                <th>Nama Produk</th>
                                                                <th>Nombor Borang Kastam 2</th>
                                                                <th>Tarikh Eksport</th>
                                                                <th>Kuantiti (Tan Metrik)</th>
                                                                <th>Nilai</th>
                                                                <th>Destinasi Negara</th>
                                                                <th>Kemaskini</th>
                                                                <th>Buang?</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($penyata as $data)
                                                            <tr>
                                                                <td>{{ $data->produk->prodname ?? '' }}</td>
                                                                <td>{{ $data->e102_c5 }}</td>
                                                                <td>{{ $data->e102_c6 }}</td>
                                                                <td>{{ $data->e102_c7 }}</td>
                                                                <td>{{ $data->e102_c8 }}</td>
                                                                <td>{{ $data->negara->namanegara ?? ''}}</td>
                                                                <td>
                                                                    <div class="icon" style="text-align: center">
                                                                        <a href="#"
                                                                            type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#modal{{ $data->e102_c1 }}">
                                                                            <i class="fas fa-edit fa-lg" style="color: #228c1c">
                                                                            </i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="icon" style="text-align: center">
                                                                        <a href="#"
                                                                            type="button" >
                                                                            <i class="fa fa-trash-o" style="color: #228c1c;font-size:18px"></i>
                                                                        </a>
                                                                    </div>

                                                                </td>
                                                            </tr>

                                                            <div class="col-md-6 col-12">

                                                                <!--scrolling content Modal -->
                                                                <div class="modal fade" id="modal{{ $data->e102_c1 }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalScrollableTitle">
                                                                                    Kemaskini Maklumat Produk</h5>
                                                                                <button type="button" class="close"
                                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                                    <i data-feather="x"></i>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form
                                                                                    action="{{ route('isirung.edit.bahagian.vi', [$data->e102_c1]) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    <div class="modal-body">
                                                                                        <label>Nama Produk </label>
                                                                                        <div class="form-group">
                                                                                            <input type="text" name='e102_c4'
                                                                                                class="form-control"
                                                                                                value="{{ $data->produk->prodname ?? '' }}" readonly>
                                                                                        </div>
                                                                                        <label>Nombor Borang Kastam 2 </label>
                                                                                        <div class="form-group">
                                                                                            <input type="text" name='e102_c5'
                                                                                                class="form-control" value="{{  $data->e102_c5 }}">
                                                                                        </div>
                                                                                        <label>Tarikh Eksport </label>
                                                                                        <div class="form-group">
                                                                                            <input type="text" name='e102_c6'
                                                                                                class="form-control" value="{{  $data->e102_c6 }}">
                                                                                        </div>
                                                                                        <label>Kuantiti (Tan Metrik) </label>
                                                                                        <div class="form-group">
                                                                                            <input type="text" name='e102_c7'
                                                                                                class="form-control" value="{{ $data->e102_c7 }}">
                                                                                        </div>
                                                                                        <label>Nilai </label>
                                                                                        <div class="form-group">
                                                                                            <input type="text" name='e102_c8'
                                                                                                class="form-control" value="{{ $data->e102_c8 }}">
                                                                                        </div>
                                                                                        <label>Destinasi Negara</label>
                                                                                        <fieldset class="form-group">
                                                                                            <select class="form-select" id="e102_c9" name="e102_c9">
                                                                                                <option value="{{ $data->e102_c9 }}" selected hidden>{{ $data->negara->namanegara ?? '' }}</option>
                                                                                                @foreach ($negara as $data)
                                                                                                    <option value="{{ $data->kodnegara }}">
                                                                                                        {{ $data->namanegara }}
                                                                                                    </option>
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </fieldset>
                                                                                        {{-- <div class="form-group">
                                                                                            <input type="text" name='e102_c9'
                                                                                                class="form-control" value="{{ $data->e102_c9 }}">
                                                                                        </div> --}}
                                                                                    </div>
                                                                                    {{-- <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-light-secondary"
                                                                                            data-bs-dismiss="modal">
                                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                                            <span class="d-none d-sm-block">Batal</span>
                                                                                        </button>
                                                                                        <button type="button" class="btn btn-primary ml-1"
                                                                                            data-bs-dismiss="modal">
                                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                                            <span class="d-none d-sm-block">Kemaskini</span>
                                                                                        </button>
                                                                                    </div> --}}


                                                                            </div>


                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-light-secondary"
                                                                                    data-bs-dismiss="modal">
                                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                                    <span class="d-none d-sm-block">Batal</span>
                                                                                </button>
                                                                                <button type="submit" class="btn btn-primary ml-1"
                                                                                    >
                                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                                    <span class="d-none d-sm-block">Kemaskini</span>
                                                                                </button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            @endforeach

                                                            <br>

                                                        </tbody>

                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                    </section>

                                </div>











                                <div class="row form-group" style="padding-top: 10px; ">


                                    <div class="text-left col-md-5">
                                        <a href="{{ route('penapis.bahagiani') }}" class="btn btn-primary"
                                            style="float: left">Sebelumnya</a>
                                    </div>
                                    <div class="text-right col-md-7 mb-4 ">
                                        <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                            style="float: right" data-bs-target="#exampleModalCenter">Simpan &
                                            Seterusnya</button>
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
                                                <button type="button" class="close" data-bs-dismiss="modal"
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
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            </form>

                        </div>

                        <br>

                    </div>
                </div>
            </div>













            <br>




    </section><!-- End Hero -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.calc').change(function() {
                var total = 0;
                $('.calc').each(function() {
                    if ($(this).val() != '') {
                        total += parseInt($(this).val());
                    }
                });
                $('#total').html(total);
            });
        });
    </script>




    </body>

    </html>
@endsection
