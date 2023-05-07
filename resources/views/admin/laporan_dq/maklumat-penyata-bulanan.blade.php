@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mt-2">

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

        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Ringkasan Maklumat Penyata
                                Bulanan Pelesen</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">PMB2 :: Butiran Urusniaga Pelesen</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">
                                <div class="row" style="margin-top:-2%">
                                    <div class="col-md-3 ml-auto">

                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="text" class="form-control" placeholder="Tahun">
                                        </div>
                                    </div>
                                    <div class="col-md-7 mr-auto">
                                        <div class="form-group">
                                            <label>No. Lesen</label>
                                            <input type="text" class="form-control" placeholder="No. Lesen">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 ml-auto">

                                        <div class="form-group">
                                            <label>Negeri</label>
                                            <input type="text" class="form-control" placeholder="Negeri">
                                        </div>
                                    </div>
                                    <div class="col-md-7 mr-auto">
                                        <div class="form-group">
                                            <label>Nama Pelesen</label>
                                            <input type="text" class="form-control" placeholder="Nama Pelesen">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 ml-auto">

                                        <div class="form-group">
                                            <label>Daerah</label>
                                            <input type="text" class="form-control" placeholder="Negeri">
                                        </div>
                                    </div>
                                    <div class="col-md-7 mr-auto">
                                        <div class="form-group">
                                            <label>Sub Kategori</label>
                                            <select multiple="multiple" size="10" class="duallistbox-no-filter">
                                                <option value="1">Pembungkus Minyak</option>
                                                <option value="2">Pembuat Makanan</option>
                                                <option value="3">Pembuat Makanan Haiwan</option>
                                                <option value="4">Kegunaan Lain Industri</option>
                                                <option value="5">Pemborong Minyak</option>
                                                <option value="6">Peniaga Minyak Keladak</option>
                                                <option value="7">Peniaga Asid Lemak</option>
                                                <option value="8">Peniaga Isirung</option>
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
