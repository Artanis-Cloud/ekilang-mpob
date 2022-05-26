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
                    <h4 class="page-title">Laporan Dynamic Query
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
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Laporan Tahunan</h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">PMB2 :: Butiran Urusniaga Pelesen</h5> --}}
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">
                                <div class="row" style="margin-top:-2%">
                                    <div class="col-md-5 ml-auto">

                                        <div class="form-group">
                                            <label>Jenis Laporan</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" name="laporan">
                                                    <option selected hidden disabled>Sila Pilih Jenis Laporan</option>
                                                    <option value="PLBIO">Senarai Tahunan Negeri</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="tex" class="form-control" placeholder="Tahun">
                                        </div>
                                    </div>
                                </div>
                            <div class=" col-md-12 mb-4 mt-4">
                                <button type="button" class="btn btn-primary" style="margin-left:47%" data-toggle="modal"
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
