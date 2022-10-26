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
                    <h4 class="page-title">Lain-lain</h4>
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
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h4 style="color: rgb(39, 80, 71);">Validasi (Semakan Data)</h4>
                            <h6 style="color: rgb(242, 68, 68); margin-bottom:1%"><i>
                                    Perhatian: Proses ini menyemak data di PLEID</i>
                            </h6>
                        </div>
                        <hr>

                        <div class="card-body">
                            <div class="container center ">
                                <div class="row" style="margin-top:-2%">

                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                        Sektor Kilang</label>
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <select class="form-control" id="basicSelect" name="e_kat" required>
                                                <option selected hidden disabled>Sila Pilih</option>
                                                <option value="PL91">KILANG BUAH</option>
                                                <option value="PL101">KILANG PENAPIS</option>
                                                <option value="PL102">KILANG ISIRUNG</option>
                                                <option value="PL104">KILANG OLEOKIMIA</option>
                                                <option value="PL111">PUSAT SIMPANAN</option>
                                                <option value="PLBIO">KILANG BIODIESEL</option>

                                            </select>

                                        </fieldset>
                                        @error('e_kat')
                                            <div class="alert alert-danger">
                                                <strong>Sila buat pilihan di bahagian ini</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="row" style="margin-top:-1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Tahun
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="tahun">
                                                    <option selected hidden disabled>Sila Pilih Tahun</option>

                                                    <option>2003</option>
                                                    <option>2004</option>
                                                    <option>2005</option>
                                                    <option>2006</option>
                                                    <option>2007</option>
                                                    <option>2008</option>
                                                    <option>2009</option>
                                                    <option>2010</option>
                                                    <option>2011</option>
                                                    <option>2012</option>
                                                    <option>2013</option>
                                                    <option>2014</option>
                                                    <option>2015</option>
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                    <option>2020</option>
                                                    <option>2021</option>
                                                    <option>2022</option>



                                                </select>
                                            </fieldset>
                                            @error('tahun')
                                            <div class="alert alert-danger">
                                                <strong>Sila buat pilihan di bahagian ini</strong>
                                            </div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:-1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Bulan
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="bulan">
                                                    <option selected hidden disabled>Sila Pilih Bulan</option>
                                                    <option>JANUARI</option>
                                                    <option>FEBRUARI</option>
                                                    <option>MAC</option>
                                                    <option>APRIL</option>
                                                    <option>MEI</option>
                                                    <option>JUN</option>
                                                    <option>JULAI</option>
                                                    <option>OGOS</option>
                                                    <option>SEPTEMBER</option>
                                                    <option>OKTOBER</option>
                                                    <option>NOVEMBER</option>
                                                    <option>DISEMBER</option>



                                                </select>
                                            </fieldset>
                                            @error('bulan')
                                            <div class="alert alert-danger">
                                                <strong>Sila buat pilihan di bahagian ini</strong>
                                            </div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="row center mt-3">
                                        <div class="col-md-12 center mb-3">
                                            <button type="submit" class="btn btn-primary center" style="margin-left:45%"
                                                data-toggle="modal" data-target="#myModal">Hantar</button>
                                            {{-- <button type="submit">YA</button> --}}
                                        </div>
                                    </div>

                                    {{-- <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
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
                                                        Anda pasti mahu menghantar validasi ini?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-dismiss="modal">
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
                                    </div> --}}

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
            $(document).ready(function() {
                $('#example').DataTable({
                    "language": {
                        "lengthMenu": "Memaparkan _MENU_ rekod per halaman  ",
                        "zeroRecords": "Maaf, tiada rekod.",
                        "info": "",
                        "infoEmpty": "Tidak ada rekod yang tersedia",
                        "infoFiltered": "(Ditapis dari _MAX_ jumlah rekod)",
                        "search": "Carian",
                        "previous": "Sebelum",
                        "paginate": {
                            "first": "Pertama",
                            "last": "Terakhir",
                            "next": "Seterusnya",
                            "previous": "Sebelumnya"
                        },
                    },
                });
            });
        </script>
    @endsection
