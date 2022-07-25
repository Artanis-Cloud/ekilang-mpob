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
            <div class="row mb-2">
                <div class="col-5 align-self-center">
                    <h4 class="page-title" >Kemasukan Penyata Bulanan
                        @if ($bulan == 1)
                            JANUARI
                        @elseif($bulan == 2)
                            FEBRUARI
                        @elseif($bulan == 3)
                            MAC
                        @elseif($bulan == 4)
                            APRIL
                        @elseif($bulan == 5)
                            MEI
                        @elseif($bulan == 6)
                            JUN
                        @elseif($bulan == 7)
                            JULAI
                        @elseif($bulan == 8)
                            OGOS
                        @elseif($bulan == 9)
                            SEPTEMBER
                        @elseif($bulan == 10)
                            OKTOBER
                        @elseif($bulan == 11)
                            NOVEMBER
                        @elseif($bulan == 12)
                            DISEMBER
                        @endif  {{ $tahun }}</h4>
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

        <div class="card" style="margin-right:2%; margin-left:2%">
            {{-- <div class="card-header border-bottom">
                <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
            </div> --}}

            <div class="card-body">
                <div class="">
                    @if (!$penyata)
                        <form action="{{ route('bio.add.bahagian.ii') }}" method="post">
                            @csrf
                    @else
                        <form action="{{ route('bio.edit.bahagian.ii', [$penyata->lesen]) }}"
                                method="post">
                            @csrf
                    @endif



                    <div class="text-center">
                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 2</h3>
                        <h5 style="color: rgb(39, 80, 71); font-size:14px">Hari Beroperasi dan Kadar
                            Penggunaan Kapasiti</h5>
                        {{-- <p>Maklumat Kilang</p> --}}
                    </div>
                    <hr>
                    <div class="container center mt-3">
                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-4 form-group" style="margin: 0px">
                                <label for="fname"
                                class="control-label col-form-label">i.
                                Jumlah Hari Kilang Beroperasi Sebulan </label>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control" name='hari_operasi' max="31" oninvalid="this.setCustomValidity('Sila pastikan bilangan hari tidak melebihi 31 hari')"
                                oninput="this.setCustomValidity('')"
                                    onkeypress="return isNumberKey(event)" id="hari_operasi"  oninput="validate_two_decimal(this)"
                                    required
                                    title="Sila isikan butiran ini." value="{{ $penyata->hari_operasi ?? 0 }}">
                                @error('hari_operasi')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="row justify-content-center" style="margin:20px 0px">
                            <div class="col-sm-4 form-group" style="margin: 0px">
                                <label for="fname"
                                class="control-label col-form-label">ii.
                                Kadar Penggunaan Kapasiti Sebulan </label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name='kapasiti' oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                oninput="this.setCustomValidity('')"
                                    onkeypress="return isNumberKey(event)" id="kapasiti" oninput="validate_two_decimal(this)"
                                    required
                                    title="Sila isikan butiran ini." value="{{ $penyata->kapasiti ?? 0 }}">
                                @error('kapasiti')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="form-group col-10 ml-auto mr-auto" style="margin-top:4%; margin-bottom: 50px">
                            <a href="{{ route('bio.bahagianiii') }}" class="btn btn-primary"
                                style="float: left">Sebelumnya</a>

                            <button type="button" class="btn btn-primary " data-toggle="modal"
                                style="float: right" data-target="#next">Simpan &
                                Seterusnya</button>
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
                                    <button type="button" class="close" data-dismiss="modal"
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
                                        data-dismiss="modal">
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
                    </form>
                </div>
            </div>
            <script>
                document.addEventListener('keypress', function (e) {
                    if (e.keyCode === 13 || e.which === 13) {
                        e.preventDefault();
                        return false;
                    }

                });

            </script>

@endsection
