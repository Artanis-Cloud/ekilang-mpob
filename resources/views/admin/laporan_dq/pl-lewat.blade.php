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
                    <h4 class="page-title">Dynamic Query Biodiesel
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
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%"> Tarikh Penerimaan Borang PL</h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">PMB2 :: Butiran Urusniaga Pelesen</h5> --}}
                        </div>
                        <hr>
                        <form action="{{ route('admin.pl.lewat.process') }}"
                        method="GET">
                        @csrf
                        <div class="card-body">

                            <div class="container center">
                                <div class="row" style="margin-top:-2%">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <input type="text" class="form-control" value="Kilang Biodiesel" readonly>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-5 mr-auto">
                                        <div class="form-group">
                                            <label>Tarikh Terima PL</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" name="kategori">
                                                    <option selected hidden disabled>Sila Pilih Kategori</option>
                                                    <option value="tepat">Penerimaan Sebelum 7hb </option>
                                                    <option value="lewat">Penerimaan Selepas 7hb</option>
                                                    <option value="all">Keseluruhan</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tarikh Mula</label>
                                            <input type="date" class="form-control" name="sdate">

                                        </div>
                                    </div>
                                    <div class="col-md-4 mr-auto">
                                        <div class="form-group">
                                            <label>Tarikh Tamat</label>
                                            <input type="date" class="form-control" name="edate">

                                        </div>
                                    </div>
                                    {{-- <div class="col-md-5 mr-auto">
                                        <div class="form-group">
                                            <label>Tarikh Terima PL</label>
                                            <input type="date" class="form-control" placeholder="No. Lesen">
                                        </div>
                                    </div> --}}
                                </div>
                            <div class="text-right col-md-6 mb-4 mt-4">
                                <button type="submit" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                    data-target="#next">Cari</button>
                            </div>
                        </div>
                    </form>


                    </div>
                </div>
            </div>
        </div>

    </div>




    </div>
@endsection

@section('scripts')

@endsection
