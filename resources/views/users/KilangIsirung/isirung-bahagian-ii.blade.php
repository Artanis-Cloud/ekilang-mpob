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
                    <h4 class="page-title"  style="font-size: 20px">Kemasukan Penyata Bulanan :
                        @if ($bulan == 1)
                            Januari
                        @elseif($bulan == 2)
                            Februari
                        @elseif($bulan == 3)
                            Mac
                        @elseif($bulan == 4)
                            April
                        @elseif($bulan == 5)
                            Mei
                        @elseif($bulan == 6)
                            Jun
                        @elseif($bulan == 7)
                            Julai
                        @elseif($bulan == 8)
                            Ogos
                        @elseif($bulan == 9)
                            September
                        @elseif($bulan == 10)
                            Oktober
                        @elseif($bulan == 11)
                            November
                        @elseif($bulan == 12)
                            Disember
                        @endif  {{ $tahun }}</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex justify-content-end">
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
            <form action="{{ route('isirung.update.bahagian.ii', [$penyata->e102_reg]) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="">

                        <div class="mb-4 text-center">
                            <h3 style="color: rgb(39, 80, 71); ">Bahagian 2</h3>
                            <h5 style="color: rgb(39, 80, 71); font-size:14px">Kadar Perahan CPKO, Kadar Perolehan PKC, Jam
                                Pengilangan dan Penggunaan Kapasiti</h5>


                        </div>
                        <hr>

                        <div class="container center mt-4" >

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-4 form-group" style="margin: 0px">
                                <label for="fname"
                                    class="control-label col-form-label">
                                    i.
                                    Kadar Perahan Minyak Isirung Sawit Mentah (CPKO) <b>%</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" style="text-align:right" name='e102_al1'
                                        id="e102_al1" required onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini." oninput="validate_two_decimal(this)"
                                        value="{{ number_format($penyata->e102_al1 ?? 0, 2) }}">
                                    @error('e102_al1')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-4 form-group" style="margin: 0px">
                                <label for="fname"
                                    class="control-label col-form-label">
                                    ii.
                                    Kadar Perolehan Dedak Isirung (PKC)<b>%</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" style="text-align:right" name='e102_al2'
                                        id="e102_al2" required onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini." oninput="validate_two_decimal(this)"
                                        value="{{ number_format($penyata->e102_al2 ?? 0, 2) }}">
                                    @error('e102_al2')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-4 form-group" style="margin: 0px">
                                <label for="fname"
                                    class="control-label col-form-label">
                                    iii.
                                    Jumlah Jam Pengilangan Isirung (PK)</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" style="text-align:right" name='e102_al3'
                                        id="e102_al3" onkeypress="return isNumberKey(event)" required
                                        title="Sila isikan butiran ini." oninput="validate_two_decimal(this)"
                                        value="{{ number_format($penyata->e102_al3 ?? 0, 2) }}">
                                    @error('e102_al3')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-4 form-group" style="margin: 0px">
                                <label for="fname"
                                    class="control-label col-form-label">
                                    iv.
                                    Kadar Penggunaan Kapasiti Sebulan <b>%</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" style="text-align:right" name='e102_al4'
                                        id="e102_al4" onkeypress="return isNumberKey(event)" required
                                        title="Sila isikan butiran ini." oninput="validate_two_decimal(this)"
                                        value="{{ number_format($penyata->e102_al4 ?? 0, 2) }}">
                                    @error('e102_al4')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div><br><br><br><br><br>

                            <div class=" form-group" style="padding-top: 3%; ">
                                    <a href="{{ route('isirung.bahagiani') }}" class="btn btn-primary"
                                        style="float: left">Sebelumnya</a>

                                    <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                                        data-target="#next">Simpan &
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

        </div>

    </div>
 @endsection
