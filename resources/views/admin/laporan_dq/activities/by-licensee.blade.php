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
                    <h4 class="page-title">Oleochemical
                    </h4>
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
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OCA1::OLEOKIMIA</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Aktiviti Mengikut Pelesen</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="equal">Equal</option>
                                                </select>
                                            <input type="text" class="form-control col-5 ml-2" placeholder="Month">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto" >
                                        <div class="form-group">
                                            <label>No. Lesen</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                <option value="between">Between</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="between">Between</option>
                                                </select>
                                            <input type="text" class="form-control col-5 ml-2" placeholder="Month">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Nama Pelesen</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                <option value="between">Between</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Negeri</label>
                                            <select class="form-control col-11" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                <option value="between">Between</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                <option value="between">Between</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Daerah</label>
                                            <select class="form-control col-11" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                <option value="between">Between</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Sub-Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                <option value="between">Between</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Kawasan</label>
                                            <select class="form-control col-11" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                <option value="between">Between</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                <option value="between">Between</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="text-right col-md-6 mb-4 mt-4">
                                <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                    data-target="#next">Cari</button>
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

@endsection
