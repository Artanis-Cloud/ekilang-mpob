@extends('layouts.main')

@section('content')

<div class="page-wrapper">


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
                    <div class="card" style="margin-right:2%; margin-left:2%">
                        {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}
                        <form action="{{ route('oleo.update.bahagian.ii', [$penyata->e104_reg]) }}" method="post">
                            @csrf
                            <div class="card-body">
                                {{-- <div class="row"> --}}
                                    {{-- <div class="col-md-4 col-12"> --}}
                                    <div class="pl-3">

                                        <div class="text-center">
                                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 2</h3>
                                            <h5 style="color: rgb(39, 80, 71); font-size:14px">Hari Beroperasi dan Kadar Penggunaan Kapasiti</h5>
                                            {{-- <p>Maklumat Kilang</p> --}}
                                        </div>
                                        <hr>

                                            <div class="container center mt-3">
                                                <div class="row">
                                                    <label for="fname"
                                                        class="text-right col-sm-5 control-label col-form-label required align-items-center">i.
                                                        Jumlah Hari Kilang Beroperasi Sebulan </label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name='e104_a5' style="margin-left:42%; width:40%; text-align:right"
                                                            onkeypress="return isNumberKey(event)" id="e104_a5" required
                                                            title="Sila isikan butiran ini." value="{{ old('e104_a5') ?? $penyata->e104_a5 }}">
                                                        @error('e104_a5')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <label for="fname"
                                                        class="text-right col-sm-5 control-label col-form-label required align-items-center">ii.
                                                        Kadar Penggunaan Kapasiti Sebulan (%)	</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name='e104_a6' style="margin-left:42%; width:40%; text-align:right"
                                                            onkeypress="return isNumberKey(event)" id="e104_a6" oninput="validate_two_decimal(this)"
                                                            required title="Sila isikan butiran ini." value="{{ $penyata->e104_a6 }}">
                                                        @error('e104_a6')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="row form-group" style="margin-top:4%">


                                                <div class="text-left col-md-5" style="margin-left:2%">
                                                    <a href="{{ route('oleo.bahagianic') }}" class="btn btn-primary"
                                                        style="float: left">Sebelumnya</a>
                                                </div>
                                                <div class="text-right col-md-6" style="margin-left:4%">
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
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1"
                                                            data-bs="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Ya</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                            </div>

                    </div><br><br><br><br>
                </form>
                </div>
            </div>


    </div>






    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>



    </body>

    </html>

    <script type="text/javascript">
        function showTable() {
            var oer = $('#kadar_oer').val();
            // console.log(oer);

            if (oer == "Meningkat") {
                document.getElementById('meningkat_container').style.display = "block";
            } else {
                document.getElementById('meningkat_container').style.display = "none";
                document.getElementById("checkbox1").checked = false;
                document.getElementById("checkbox2").checked = false;
                document.getElementById("checkbox3").checked = false;
                document.getElementById("checkbox4").checked = false;
                document.getElementById("checkbox5").checked = false;
                document.getElementById("checkbox6").checked = false;
            }

            if (oer == "Menurun") {
                document.getElementById('menurun_container').style.display = "block";
            } else {
                document.getElementById('menurun_container').style.display = "none";
                document.getElementById("checkbox7").checked = false;
                document.getElementById("checkbox8").checked = false;
                document.getElementById("checkbox9").checked = false;
                document.getElementById("checkbox10").checked = false;
                document.getElementById("checkbox11").checked = false;
                document.getElementById("checkbox12").checked = false;
                document.getElementById("checkbox13").checked = false;
            }
        }
    </script>

@endsection
