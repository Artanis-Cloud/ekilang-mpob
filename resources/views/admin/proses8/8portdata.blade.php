@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Pindahan Data</h4>
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
                        <div class="row">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68); padding: 20px"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                                <div class=" text-center">
                                    <h4 style="color: rgb(39, 80, 71); ">Pindahan Penyata Bulanan ke Stat Admin / Homepage</h4>
                                    <h6 style="color: rgb(242, 68, 68); margin-bottom:1%"><i>
                                        Perhatian: Proses ini akan memindahkan semua penyata daripada sistem PLEID</i>
                                    </h6>
                                </div>
                                <hr>
                                <form action="{{ route('admin.porting.data.process') }}" method="get">
                                    @csrf
                                <div class="card-body">
                                    <div class="container center ">

                                        <div class="row"  style="margin-top:-2%" >
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">Tahun
                                            </label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="tahun" name="tahun" required oninput="valid_tahun()">
                                                        <option selected hidden disabled value="">Sila Pilih Tahun</option>
                                                        @for ($i = 2003; $i <= date('Y'); $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor



                                                    </select>
                                                    <p type="hidden" id="err_tahun" style="color: red; display:none"><i>Sila buat
                                                        pilihan di bahagian ini!</i></p>
                                                </fieldset>
                                                {{-- @error('alamat_kilang_1')
                                                            <div class="alert alert-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror --}}
                                            </div>
                                        </div>

                                        <div class="row"  style="margin-top:-1%">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">Bulan
                                            </label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="bulan" name="bulan" required oninput="valid_bulan()">
                                                        <option selected hidden disabled value="">Sila Pilih Bulan</option>
                                                        <option value="01">Januari</option>
                                                        <option value="02">Februari</option>
                                                        <option value="03">Mac</option>
                                                        <option value="04">April</option>
                                                        <option value="05">Mei</option>
                                                        <option value="06">Jun</option>
                                                        <option value="07">Julai</option>
                                                        <option value="08">Ogos</option>
                                                        <option value="09">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Disember</option>



                                                    </select>
                                                    <p type="hidden" id="err_bulan" style="color: red; display:none"><i>Sila buat
                                                        pilihan di bahagian ini!</i></p>
                                                </fieldset>
                                                {{-- @error('alamat_kilang_1')
                                                            <div class="alert alert-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror --}}
                                            </div>
                                        </div>

                                        <div class="row"  style="margin-top:-1%">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">Destinasi
                                            </label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="destinasi" name="destinasi" required oninput="valid_destinasi()">
                                                        <option selected hidden disabled value="">Sila Pilih Destinasi</option>
                                                        <option value="admin">Stat Admin</option>
                                                        <option value="homepage">Stat Homepage</option>



                                                    </select>
                                                    <p type="hidden" id="err_destinasi" style="color: red; display:none"><i>Sila buat
                                                        pilihan di bahagian ini!</i></p>
                                                </fieldset>
                                                {{-- @error('alamat_kilang_1')
                                                            <div class="alert alert-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror --}}
                                            </div>
                                        </div>


                                    <div class="row center mt-3">
                                        <div class="col-md-12 center mb-3">
                                            <button type="button" class="btn btn-primary center" disabled style="margin-left:45%" id="checkBtn" onclick="check()">Port</button>
                                            {{-- <button type="submit">YA</button> --}}
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
                                                    Anda pasti mahu memindahkan data ini?
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

                                    </div>
                                </div>
                    </div>
                </div>
            </div>

        </div>




    </div>
@endsection

@section('scripts')
<script>
    function valid_tahun() {

        if ($('#tahun').val() == '') {
            $('#tahun').css('border-color', 'red');
            document.getElementById('err_tahun').style.display = "block";


        } else {
            $('#tahun').css('border-color', '');
            document.getElementById('err_tahun').style.display = "none";

        }

    }
</script>
<script>
    function valid_bulan() {

        if ($('#bulan').val() == '') {
            $('#bulan').css('border-color', 'red');
            document.getElementById('err_bulan').style.display = "block";


        } else {
            $('#bulan').css('border-color', '');
            document.getElementById('err_bulan').style.display = "none";

        }

    }
</script>
<script>
    function valid_destinasi() {

        if ($('#destinasi').val() == '') {
            $('#destinasi').css('border-color', 'red');
            document.getElementById('err_destinasi').style.display = "block";


        } else {
            $('#destinasi').css('border-color', '');
            document.getElementById('err_destinasi').style.display = "none";

        }

    }
</script>
<script>
    function check() {
        // (B1) INIT
        var error = "",
            field = "";

        // kap proses
        field = document.getElementById("tahun");
        if (!field.checkValidity()) {
            error += "Name must be 2-4 characters\r\n";
            $('#tahun').css('border-color', 'red');
            document.getElementById('err_tahun').style.display = "block";
        }

        // kap proses
        field = document.getElementById("bulan");
        if (!field.checkValidity()) {
            error += "Name must be 2-4 characters\r\n";
            $('#bulan').css('border-color', 'red');
            document.getElementById('err_bulan').style.display = "block";
        }

        // kap proses
        field = document.getElementById("destinasi");
        if (!field.checkValidity()) {
            error += "Name must be 2-4 characters\r\n";
            $('#destinasi').css('border-color', 'red');
            document.getElementById('err_destinasi').style.display = "block";
        }


            // (B4) RESULT
            if (error == "") {
                $('#myModal').modal('show');
                return true;
            } else {
                toastr.error(
                    'Lengkapkan semua butiran bertanda (*) sebelum tekan butang Port',
                    'Ralat!', {
                        "progressBar": true
                    })
                return false;
            }


        }

</script>

@endsection
