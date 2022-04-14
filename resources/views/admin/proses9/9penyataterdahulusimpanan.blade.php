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
                    <h4 class="page-title">Penyata Bulanan Terdahulu</h4>
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
            <div class="card" style="margin-right:2%; margin-left:2%">

                <div class="col-sm-12 col-lg-12">

                    <div class="card-body">
                        <div class="row">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" style="background-color: rgb(238, 70, 70)"
                                 type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Pusat Simpanan
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{ route('admin.9penyataterdahulu') }}">Kilang Buah</a>
                                  <a class="dropdown-item" href="{{ route('admin.9penyataterdahulupenapis') }}">Kilang Penapis</a>
                                  <a class="dropdown-item" href="{{ route('admin.9penyataterdahuluisirung') }}">Kilang Isirung</a>
                                  <a class="dropdown-item" href="{{ route('admin.9penyataterdahuluoleokimia') }}">Kilang Oleokimia</a>
                                  {{-- <a class="dropdown-item" href="{{ route('admin.9penyataterdahulusimpanan') }}">Pusat Simpanan</a> --}}
                                  <a class="dropdown-item" href="{{ route('admin.9penyataterdahulubiodiesel') }}">Kilang Biodiesel</a>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('admin.9penyataterdahulu.psimpanan.process') }}" method="post">
                            @csrf
                                <div class>
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%; margin-top:-2%; text-align:center">Papar Penyata Bulanan
                                        Terdahulu</h3>
                                    <h5 style="color: rgb(39, 80, 71); font-size:14px; margin-bottom:-2%; text-align:center">Papar Penyata Bulanan
                                        Terdahulu di MYSQL dan PLEID</h5>
                                </div>


                                <div class="card-body">
                                    <hr>
                                    <div class="container center ">

                                        <div class="row mt-1">
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
                                                        <option value="01">Januari</option>
                                                        <option value="02">Februari</option>
                                                        <option value="03">Mac</option>
                                                        <option value="04">April</option>
                                                        <option value="05">Mei</option>
                                                        <option value="06">Jun</option>
                                                        <option value="07">Julai</option>
                                                        <option value="08">Ogos</option>
                                                        <option value="09">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Disember</option>



                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-top:-1%">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">Sumber
                                                Data
                                            </label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="basicSelect" name="sumber">
                                                        <option selected hidden disabled>Sila Pilih Sumber Data</option>
                                                        <option>e-Kilang</option>
                                                        <option>PLEID</option>
                                                    </select>
                                                </fieldset>
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row form-group" style="padding-top: 10px; ">
                                            <div class="text-right col-md-12 center">
                                                <button type="submit" class="btn btn-primary">Papar</button>
                                                {{-- <button type="submit">YA</button> --}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                        </form>




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
