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
                                    <h4 style="color: rgb(39, 80, 71)">Pindahan Maklumat Produk dan Negara</h4>
                                </div>
                                <hr>
                                <form action="{{ route('admin.porting.maklumat.process') }}" method="get">
                                    @csrf
                                <div class="card-body">
                                    <div class="container center ">

                                        <div class="container center mt-1">
                                            <div class="row" style="margin-bottom:2%;">
                                                <label for="fname"
                                                    class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                    Jenis Maklumat</label>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="maklumat" name="maklumat" required oninput="valid_maklumat()">
                                                            <option selected hidden disabled value="">Sila Pilih Jenis Maklumat</option>

                                                            <option value="produk_sawit">Produk Sawit</option>
                                                            <option value="negara">Negara</option>
                                                            <option value="daerah">Daerah</option>


                                                        </select>
                                                        <p type="hidden" id="err_maklumat" style="color: red; display:none"><i>Sila buat
                                                            pilihan di bahagian ini!</i></p>
                                                    </fieldset>
                                                </div>
                                            </div>

                                    </div>

                                    <div class="row center">
                                        <div class="col-md-12 center mb-3">
                                            <button type="button" class="btn btn-primary center" style="margin-left:45%" id="checkBtn" onclick="check()">Port</button>
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
                            </form>

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
    function valid_maklumat() {

        if ($('#maklumat').val() == '') {
            $('#maklumat').css('border-color', 'red');
            document.getElementById('err_maklumat').style.display = "block";


        } else {
            $('#maklumat').css('border-color', '');
            document.getElementById('err_maklumat').style.display = "none";

        }

    }
</script>
<script>
    function check() {
        // (B1) INIT
        var error = "",
            field = "";

        // kap proses
        field = document.getElementById("maklumat");
        if (!field.checkValidity()) {
            error += "Name must be 2-4 characters\r\n";
            $('#maklumat').css('border-color', 'red');
            document.getElementById('err_maklumat').style.display = "block";
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
