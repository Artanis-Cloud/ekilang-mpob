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
                    <h4 class="page-title">Tukar Kata Laluan</h4>
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
                            <h4 style="color: rgb(39, 80, 71); margin-top:3%">Tukar Kata Laluan</h4>
                        </div>
                        <hr>

                        <div class="card-body">
                            <div class="container center ">

                                <div class="row" style="margin-top:-2%">
                                    <label for="fname"
                                        class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                        Kata Laluan Terdahulu (8 Aksara)</label>
                                    <div class="col-md-6">
                                        <input type="text" id="company-column" class="form-control"
                                            placeholder=" Kata Laluan Terdahulu" name="company-column">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="fname"
                                        class="text-right col-sm-5 control-label col-form-label required align-items-center ">
                                        Kata Laluan Baru (8 Aksara)</label>
                                    <div class="col-md-6">
                                        <input type="text" id="company-column" class="form-control"
                                            placeholder="Kata Laluan Baru (8 Aksara)" name="company-column">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="fname"
                                        class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                        Kata Laluan Baru Sekali Lagi (8 Aksara)</label>
                                    <div class="col-md-6">
                                        <input type="text" id="company-column" class="form-control"
                                            placeholder=" Kata Laluan Baru Sekali Lagi (8 Aksara)" name="company-column">
                                    </div>
                                </div>

                                <div class="row form-group" style="margin-top: 7%; ">



                                    <div class="text-right col-md-6 mb-4 ">
                                        <button type="button" class="btn btn-primary" style="margin-left:90%"
                                            data-toggle="modal" data-target="#next">Tukar Kata Laluan</button>
                                    </div>

                                </div>
                                <div class="modal fade" id="next" tabindex="-1" role="dialog"
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
                                                    Anda pasti mahu menukar kata laluan ini?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1" data-bs="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Ya</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
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
