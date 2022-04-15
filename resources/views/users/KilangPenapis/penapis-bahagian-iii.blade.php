@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Kemasukan Penyata Bulanan</h4>
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
        <div class="card" style="margin-right:5%; margin-left:5%">
            <form action="{{ route('penapis.update.bahagian.iii', [$penyata->e101_reg]) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="pl-3">

                        <div class="mb-4 text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian III</h3>


                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>

                        <div class="container center mt-4" style="margin-left:9%">

                            <div class="row">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Jumlah Hari Kilang Beroperasi Sebulan</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" style="text-align:right" name='e101_a1'
                                        id="nombor_borang_kastam" required onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini." value="{{ $penyata->e101_a1 }}">
                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Kadar Penggunaan Kapasiti(Refining) Sebulan</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" style="text-align:right" name='e101_a2'
                                        id="nombor_borang_kastam" required onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini."
                                        value="{{ number_format($penyata->e101_a2 ?? 0, 2) }}">
                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="fname"
                                    class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                    Kadar Penggunaan Kapasiti(Fractionation) Sebulan</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" style="text-align:right" name='e101_a3'
                                        id="kuantiti" onkeypress="return isNumberKey(event)" required
                                        title="Sila isikan butiran ini."
                                        value="{{ number_format($penyata->e101_a3 ?? 0, 2) }}">
                                    {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                </div>
                            </div>

                            <div class="row form-group" style="padding-top: 3%; ">
                                {{-- <div class="row form-group" style="padding-top: 10px; ">
                                                    <div class="text-right col-md-12 mb-4 ">
                                                        <button type="submit" class="btn btn-primary ">Simpan &
                                                            Seterusnya</button>
                                                    </div>
                                                </div> --}}
                                <div class="text-left col-md-5">
                                    <a href="{{ route('penapis.bahagianii') }}" class="btn btn-primary"
                                        style="float: left">Sebelumnya</a>
                                </div>
                                <div class="text-right col-md-5">
                                    <button type="button" class="btn btn-primary " data-toggle="modal"
                                        style="float: right" data-target="#next">Simpan &
                                        Seterusnya</button>
                                </div>

                            </div>

                            <!-- Vertically Centered modal Modal -->
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
                                                Anda pasti mahu menyimpan maklumat ini?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                            </button>
                                            <button type="submit" class="btn btn-primary ml-1">
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
            </form>
        {{-- </div> --}}

    {{-- </div> --}}





    {{-- <div id="preloader"></div> --}}

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".floatNumberField").change(function() {
                $(this).val(parseFloat($(this).val()).toFixed(2));
            });
        });
    </script>



@endsection
