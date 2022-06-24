@extends('layouts.main')

<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid rgba(204, 204, 204, 0);
        background-color: #f7f9fd00;
    }

    /* Style the buttons that are used to open the tab content */
    .tab a {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab a:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab a.active {
        background-color: #dee2e6;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        /* border: 1px solid #ccc; */
        border-top: none;
    }

</style>

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
            <div class="tab" style="margin-right:4%; margin-left:2%">

                <a style="color:black; border-radius:unset; font-size:14.4px;" class="btn btn-work tablinks"
                    onclick="openInit(event, 'ringkasan')" id="defaultOpen">Ringkasan Penyata</a>
                {{-- <button class="tablinks" onclick="openInit(event, 'One')"> --}}
                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'bahagian1')">Bahagian 1</a>
                {{-- </button> --}}
                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'bahagian2')">Bahagian 2</a>
                {{-- </button> --}}
                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'bahagian3')">Bahagian 3</a>
                {{-- </button> --}}
                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'biodiesel')">Maklumat Jualan Biodiesel</a>

            </div>
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card" style="margin-right:2%; margin-left:2%">

                        <div id="ringkasan" class="tabcontent">
                            <div class="row" style="padding: 10px">
                                <div class="col-1 align-self-center">
                                    <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                                </div>
                            </div>
                            <div class=" text-center">
                                <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Ringkasan Maklumat Penyata</h3>
                                <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">PMB2 :: Butiran Urusniaga Pelesen</h5>
                            </div>
                            <hr>

                            <div class="card-body">

                                <div class="container center">

                                    <div class="row">
                                        <div class="col-md-4 ml-auto">
                                            <div class="form-group">
                                                <label>Tahun</label>
                                                <select class="form-control" name="tahun">
                                                    <option selected hidden disabled>Sila Pilih Tahun</option>
                                                    <option value="2011" {{ old('tahun') == '2011' ? 'selected' : '' }}>2011
                                                    </option>
                                                    <option value="2012" {{ old('tahun') == '2012' ? 'selected' : '' }}>2012
                                                    </option>
                                                    <option value="2013" {{ old('tahun') == '2013' ? 'selected' : '' }}>2013
                                                    </option>
                                                    <option value="2014" {{ old('tahun') == '2014' ? 'selected' : '' }}>2014
                                                    </option>
                                                    <option value="2015" {{ old('tahun') == '2015' ? 'selected' : '' }}>2015
                                                    </option>
                                                    <option value="2016" {{ old('tahun') == '2016' ? 'selected' : '' }}>2016
                                                    </option>
                                                    <option value="2017" {{ old('tahun') == '2017' ? 'selected' : '' }}>2017
                                                    </option>
                                                    <option value="2018" {{ old('tahun') == '2018' ? 'selected' : '' }}>2018
                                                    </option>
                                                    <option value="2019" {{ old('tahun') == '2019' ? 'selected' : '' }}>2019
                                                    </option>
                                                    <option value="2020" {{ old('tahun') == '2020' ? 'selected' : '' }}>2020
                                                    </option>
                                                    <option value="2021" {{ old('tahun') == '2021' ? 'selected' : '' }}>2021
                                                    </option>
                                                    <option value="2022" {{ old('tahun') == '2022' ? 'selected' : '' }}>2022
                                                    </option>
                                                    <option value="2023" {{ old('tahun') == '2023' ? 'selected' : '' }}>2023
                                                    </option>
                                                    <option value="2024" {{ old('tahun') == '2024' ? 'selected' : '' }}>2024
                                                    </option>
                                                    {{-- @endif --}}


                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Negeri</label>
                                                <select class="form-control" id="negeri_id" name="e_negeri">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($negeri as $data)
                                                        <option value="{{ $data->kod_negeri }}">
                                                            {{ $data->nama_negeri }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Daerah</label>
                                                <input type="text" class="form-control" placeholder="Negeri">
                                            </div>

                                        </div>

                                        <div class="col-md-5 mr-auto ">
                                            <div class="form-group">
                                                <label>No. Pelesen</label>
                                                <select class="form-control" name="e_np">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($users2 as $data)
                                                        <option value="{{ $data->e_nl }}">
                                                            {{ $data->e_nl }} - {{ $data->pelesen->e_np }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Data</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="laporan">
                                                        <option selected hidden disabled>Sila Pilih Jenis Data</option>
                                                        <option value="ebio_b5">Stok Awal Di Premis</option>
                                                        <option value="ebio_b6">Belian / Terimaan</option>
                                                        <option value="ebio_b7">Pengeluaran</option>
                                                        <option value="ebio_b8">Digunakan Untuk Proses Selanjutnya</option>
                                                        <option value="ebio_b9">Jualan / Edaran Tempatan</option>
                                                        <option value="ebio_b10">Eksport</option>
                                                        <option value="ebio_b11">Stok Akhir Dilapor</option>
                                                    </select>
                                                </fieldset>
                                            </div>


                                        </div>

                                    </div>


                                </div>
                                <div class="text-right col-md-6 mb-4 mt-4">
                                    <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                        data-target="#next">Cari</button>
                                </div>

                                <section class="section"><hr>
                                    <div class="card"><br>

                                        <h6 style="color: rgb(30, 28, 28); margin-left:40%">Stok Awal Bulan Di Premis</h6>
                                        <div class="table-responsive " id="example1">
                                            <table id="example" class="table table-bordered text-center" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="vertical-align: middle">Bil.</th>
                                                        <th scope="col" style="vertical-align: middle">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle">Nama Pelesen</th>
                                                        <th scope="col" style="vertical-align: middle">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle">Daerah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <th>-</th>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <th>-</th>
                                                        <td>-</td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- </div> --}}
                                    </div>

                                </section>
                            </div>
                        </div>

                        <div id="bahagian1" class="tabcontent">
                            <div class="row" style="padding: 10px">
                                <div class="col-1 align-self-center">
                                    <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                                </div>
                            </div>
                            <div class=" text-center">
                                <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Ringkasan Penyata Maklumat Bulanan</h3>
                                <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 1</h5>
                            </div>
                            <hr>

                            <div class="card-body">

                                <div class="container center">

                                    <div class="row">
                                        <div class="col-md-4 ml-auto ">

                                            <div class="form-group">
                                                <label>Tahun</label>
                                                <select class="form-control" name="tahun">
                                                    <option selected hidden disabled>Sila Pilih Tahun</option>
                                                    <option value="2011" {{ old('tahun') == '2011' ? 'selected' : '' }}>2011
                                                    </option>
                                                    <option value="2012" {{ old('tahun') == '2012' ? 'selected' : '' }}>2012
                                                    </option>
                                                    <option value="2013" {{ old('tahun') == '2013' ? 'selected' : '' }}>2013
                                                    </option>
                                                    <option value="2014" {{ old('tahun') == '2014' ? 'selected' : '' }}>2014
                                                    </option>
                                                    <option value="2015" {{ old('tahun') == '2015' ? 'selected' : '' }}>2015
                                                    </option>
                                                    <option value="2016" {{ old('tahun') == '2016' ? 'selected' : '' }}>2016
                                                    </option>
                                                    <option value="2017" {{ old('tahun') == '2017' ? 'selected' : '' }}>2017
                                                    </option>
                                                    <option value="2018" {{ old('tahun') == '2018' ? 'selected' : '' }}>2018
                                                    </option>
                                                    <option value="2019" {{ old('tahun') == '2019' ? 'selected' : '' }}>2019
                                                    </option>
                                                    <option value="2020" {{ old('tahun') == '2020' ? 'selected' : '' }}>2020
                                                    </option>
                                                    <option value="2021" {{ old('tahun') == '2021' ? 'selected' : '' }}>2021
                                                    </option>
                                                    <option value="2022" {{ old('tahun') == '2022' ? 'selected' : '' }}>2022
                                                    </option>
                                                    <option value="2023" {{ old('tahun') == '2023' ? 'selected' : '' }}>2023
                                                    </option>
                                                    <option value="2024" {{ old('tahun') == '2024' ? 'selected' : '' }}>2024
                                                    </option>
                                                    {{-- @endif --}}


                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Bulan</label>
                                                <select class="form-control" name="bulan"  id="bulan" onchange="showTable()">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    <option value="equal">Equal</option>
                                                    <option value="between">Between</option>
                                                </select>

                                            </div>
                                            <div id="equal_container" style="display:none">
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                        <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <select class="form-control" name="bulan" >
                                                                <option selected hidden disabled value="">Sila Pilih Bulan</option>
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

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="between_container" style="display:none">
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label>Dari</label>
                                                            <select class="form-control" name="bulan">
                                                                <option selected hidden disabled value="">Sila Pilih Bulan</option>
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

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label>Ke</label>
                                                            <select class="form-control" name="bulan">
                                                                <option selected hidden disabled value="">Sila Pilih Bulan</option>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="lain_container" style="display:none">
                                            </div>
                                            <div class="form-group">
                                                <label>Negeri</label>
                                                <select class="form-control" id="negeri_id" name="e_negeri">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($negeri as $data)
                                                        <option value="{{ $data->kod_negeri }}">
                                                            {{ $data->nama_negeri }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-5 mr-auto">
                                            <div class="form-group">
                                                <label>No. Pelesen</label>
                                                <select class="form-control" name="e_np">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($users2 as $data)
                                                        <option value="{{ $data->e_nl }}">
                                                            {{ $data->e_nl }} - {{ $data->pelesen->e_np }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Kod Produk</label>
                                                <select class="form-control" id="ebio_c3" name="ebio_c3" style="width: 100%" >
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($produk as $data)
                                                        <option value="{{ $data->prodid }}">
                                                            {{ $data->proddesc }} - {{ $data->prodid }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Data</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="laporan">
                                                        <option selected hidden disabled>Sila Pilih Jenis Data</option>
                                                        <option value="ebio_b5">Stok Awal Di Premis</option>
                                                        <option value="ebio_b6">Belian / Terimaan</option>
                                                        <option value="ebio_b7">Pengeluaran</option>
                                                        <option value="ebio_b8">Digunakan Untuk Proses Selanjutnya</option>
                                                        <option value="ebio_b9">Jualan / Edaran Tempatan</option>
                                                        <option value="ebio_b10">Eksport</option>
                                                        <option value="ebio_b11">Stok Akhir Dilapor</option>
                                                    </select>
                                                </fieldset>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="text-right col-md-6 mb-4 mt-4">
                                    <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                        data-target="#next">Cari</button>
                                </div>

                                <section class="section"><hr>
                                    <div class="card"><br>

                                        <h6 style="color: rgb(30, 28, 28); margin-left:40%">Stok Awal Bulan Di Premis</h6>
                                        <div class="table-responsive " id="example1">
                                            <table id="example" class="table table-bordered text-center" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="vertical-align: middle">Bil.</th>
                                                        <th scope="col" style="vertical-align: middle">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle">Nama Pelesen</th>
                                                        <th scope="col" style="vertical-align: middle">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle">Daerah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <th>-</th>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <th>-</th>
                                                        <td>-</td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- </div> --}}
                                    </div>

                                </section>
                            </div>
                        </div>


                        <div id="bahagian2" class="tabcontent">
                            <div class="row" style="padding: 10px">
                                <div class="col-1 align-self-center">
                                    <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                                </div>
                            </div>
                            <div class=" text-center">
                                <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Ringkasan Maklumat Operasi</h3>
                                <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 2</h5>
                            </div>
                            <hr>

                            <div class="card-body">

                                <div class="container center">

                                    <div class="row">
                                        <div class="col-md-4 ml-auto">
                                            <div class="form-group">
                                                <label>Tahun</label>
                                                <select class="form-control" name="tahun">
                                                    <option selected hidden disabled>Sila Pilih Tahun</option>
                                                    <option value="2011" {{ old('tahun') == '2011' ? 'selected' : '' }}>2011
                                                    </option>
                                                    <option value="2012" {{ old('tahun') == '2012' ? 'selected' : '' }}>2012
                                                    </option>
                                                    <option value="2013" {{ old('tahun') == '2013' ? 'selected' : '' }}>2013
                                                    </option>
                                                    <option value="2014" {{ old('tahun') == '2014' ? 'selected' : '' }}>2014
                                                    </option>
                                                    <option value="2015" {{ old('tahun') == '2015' ? 'selected' : '' }}>2015
                                                    </option>
                                                    <option value="2016" {{ old('tahun') == '2016' ? 'selected' : '' }}>2016
                                                    </option>
                                                    <option value="2017" {{ old('tahun') == '2017' ? 'selected' : '' }}>2017
                                                    </option>
                                                    <option value="2018" {{ old('tahun') == '2018' ? 'selected' : '' }}>2018
                                                    </option>
                                                    <option value="2019" {{ old('tahun') == '2019' ? 'selected' : '' }}>2019
                                                    </option>
                                                    <option value="2020" {{ old('tahun') == '2020' ? 'selected' : '' }}>2020
                                                    </option>
                                                    <option value="2021" {{ old('tahun') == '2021' ? 'selected' : '' }}>2021
                                                    </option>
                                                    <option value="2022" {{ old('tahun') == '2022' ? 'selected' : '' }}>2022
                                                    </option>
                                                    <option value="2023" {{ old('tahun') == '2023' ? 'selected' : '' }}>2023
                                                    </option>
                                                    <option value="2024" {{ old('tahun') == '2024' ? 'selected' : '' }}>2024
                                                    </option>
                                                    {{-- @endif --}}


                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Negeri</label>
                                                <select class="form-control" id="negeri_id" name="e_negeri">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($negeri as $data)
                                                        <option value="{{ $data->kod_negeri }}">
                                                            {{ $data->nama_negeri }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Daerah</label>
                                                <input type="text" class="form-control" placeholder="Negeri">
                                            </div>

                                        </div>

                                        <div class="col-md-5 mr-auto ">
                                            <div class="form-group">
                                                <label>No. Pelesen</label>
                                                <select class="form-control" name="e_np">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($users2 as $data)
                                                        <option value="{{ $data->e_nl }}">
                                                            {{ $data->e_nl }} - {{ $data->pelesen->e_np }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Data</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="laporan">
                                                        <option selected hidden disabled>Sila Pilih Jenis Data</option>
                                                        <option value="ebio_b5">Stok Awal Di Premis</option>
                                                        <option value="ebio_b6">Belian / Terimaan</option>
                                                        <option value="ebio_b7">Pengeluaran</option>
                                                        <option value="ebio_b8">Digunakan Untuk Proses Selanjutnya</option>
                                                        <option value="ebio_b9">Jualan / Edaran Tempatan</option>
                                                        <option value="ebio_b10">Eksport</option>
                                                        <option value="ebio_b11">Stok Akhir Dilapor</option>
                                                    </select>
                                                </fieldset>
                                            </div>


                                        </div>

                                    </div>


                                </div>
                                <div class="text-right col-md-6 mb-4 mt-4">
                                    <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                        data-target="#next">Cari</button>
                                </div>

                                <section class="section"><hr>
                                    <div class="card"><br>

                                        <h6 style="color: rgb(30, 28, 28); margin-left:40%">Stok Awal Bulan Di Premis</h6>
                                        <div class="table-responsive " id="example1">
                                            <table id="example" class="table table-bordered text-center" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="vertical-align: middle">Bil.</th>
                                                        <th scope="col" style="vertical-align: middle">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle">Nama Pelesen</th>
                                                        <th scope="col" style="vertical-align: middle">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle">Daerah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <th>-</th>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <th>-</th>
                                                        <td>-</td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- </div> --}}
                                    </div>

                                </section>
                            </div>
                        </div>

                        <div id="bahagian3" class="tabcontent">
                            <div class="row" style="padding: 10px">
                                <div class="col-1 align-self-center">
                                    <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                                </div>
                            </div>
                            <div class=" text-center">
                                <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Ringkasan Produk Biodiesel dan Glycerine</h3>
                                <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 3</h5>
                            </div>
                            <hr>

                            <div class="card-body">

                                <div class="container center">

                                    <div class="row">
                                        <div class="col-md-4 ml-auto">
                                            <div class="form-group">
                                                <label>Tahun</label>
                                                <select class="form-control" name="tahun">
                                                    <option selected hidden disabled>Sila Pilih Tahun</option>
                                                    <option value="2011" {{ old('tahun') == '2011' ? 'selected' : '' }}>2011
                                                    </option>
                                                    <option value="2012" {{ old('tahun') == '2012' ? 'selected' : '' }}>2012
                                                    </option>
                                                    <option value="2013" {{ old('tahun') == '2013' ? 'selected' : '' }}>2013
                                                    </option>
                                                    <option value="2014" {{ old('tahun') == '2014' ? 'selected' : '' }}>2014
                                                    </option>
                                                    <option value="2015" {{ old('tahun') == '2015' ? 'selected' : '' }}>2015
                                                    </option>
                                                    <option value="2016" {{ old('tahun') == '2016' ? 'selected' : '' }}>2016
                                                    </option>
                                                    <option value="2017" {{ old('tahun') == '2017' ? 'selected' : '' }}>2017
                                                    </option>
                                                    <option value="2018" {{ old('tahun') == '2018' ? 'selected' : '' }}>2018
                                                    </option>
                                                    <option value="2019" {{ old('tahun') == '2019' ? 'selected' : '' }}>2019
                                                    </option>
                                                    <option value="2020" {{ old('tahun') == '2020' ? 'selected' : '' }}>2020
                                                    </option>
                                                    <option value="2021" {{ old('tahun') == '2021' ? 'selected' : '' }}>2021
                                                    </option>
                                                    <option value="2022" {{ old('tahun') == '2022' ? 'selected' : '' }}>2022
                                                    </option>
                                                    <option value="2023" {{ old('tahun') == '2023' ? 'selected' : '' }}>2023
                                                    </option>
                                                    <option value="2024" {{ old('tahun') == '2024' ? 'selected' : '' }}>2024
                                                    </option>
                                                    {{-- @endif --}}


                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Negeri</label>
                                                <select class="form-control" id="negeri_id" name="e_negeri">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($negeri as $data)
                                                        <option value="{{ $data->kod_negeri }}">
                                                            {{ $data->nama_negeri }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Daerah</label>
                                                <input type="text" class="form-control" placeholder="Negeri">
                                            </div>

                                        </div>

                                        <div class="col-md-5 mr-auto ">
                                            <div class="form-group">
                                                <label>No. Pelesen</label>
                                                <select class="form-control" name="e_np">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($users2 as $data)
                                                        <option value="{{ $data->e_nl }}">
                                                            {{ $data->e_nl }} - {{ $data->pelesen->e_np }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Data</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="laporan">
                                                        <option selected hidden disabled>Sila Pilih Jenis Data</option>
                                                        <option value="ebio_b5">Stok Awal Di Premis</option>
                                                        <option value="ebio_b6">Belian / Terimaan</option>
                                                        <option value="ebio_b7">Pengeluaran</option>
                                                        <option value="ebio_b8">Digunakan Untuk Proses Selanjutnya</option>
                                                        <option value="ebio_b9">Jualan / Edaran Tempatan</option>
                                                        <option value="ebio_b10">Eksport</option>
                                                        <option value="ebio_b11">Stok Akhir Dilapor</option>
                                                    </select>
                                                </fieldset>
                                            </div>


                                        </div>

                                    </div>


                                </div>
                                <div class="text-right col-md-6 mb-4 mt-4">
                                    <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                        data-target="#next">Cari</button>
                                </div>

                                <section class="section"><hr>
                                    <div class="card"><br>

                                        <h6 style="color: rgb(30, 28, 28); margin-left:40%">Stok Awal Bulan Di Premis</h6>
                                        <div class="table-responsive " id="example1">
                                            <table id="example" class="table table-bordered text-center" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="vertical-align: middle">Bil.</th>
                                                        <th scope="col" style="vertical-align: middle">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle">Nama Pelesen</th>
                                                        <th scope="col" style="vertical-align: middle">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle">Daerah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <th>-</th>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <th>-</th>
                                                        <td>-</td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- </div> --}}
                                    </div>

                                </section>
                            </div>
                        </div>

                        <div id="biodiesel" class="tabcontent">
                            <div class="row" style="padding: 10px">
                                <div class="col-1 align-self-center">
                                    <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                                </div>
                            </div>
                            <div class=" text-center">
                                <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Ringkasan Jualan Biodiesel</h3>
                                <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 2</h5>
                            </div>
                            <hr>

                            <div class="card-body">

                                <div class="container center">

                                    <div class="row">
                                        <div class="col-md-4 ml-auto">
                                            <div class="form-group">
                                                <label>Tahun</label>
                                                <select class="form-control" name="tahun">
                                                    <option selected hidden disabled>Sila Pilih Tahun</option>
                                                    <option value="2011" {{ old('tahun') == '2011' ? 'selected' : '' }}>2011
                                                    </option>
                                                    <option value="2012" {{ old('tahun') == '2012' ? 'selected' : '' }}>2012
                                                    </option>
                                                    <option value="2013" {{ old('tahun') == '2013' ? 'selected' : '' }}>2013
                                                    </option>
                                                    <option value="2014" {{ old('tahun') == '2014' ? 'selected' : '' }}>2014
                                                    </option>
                                                    <option value="2015" {{ old('tahun') == '2015' ? 'selected' : '' }}>2015
                                                    </option>
                                                    <option value="2016" {{ old('tahun') == '2016' ? 'selected' : '' }}>2016
                                                    </option>
                                                    <option value="2017" {{ old('tahun') == '2017' ? 'selected' : '' }}>2017
                                                    </option>
                                                    <option value="2018" {{ old('tahun') == '2018' ? 'selected' : '' }}>2018
                                                    </option>
                                                    <option value="2019" {{ old('tahun') == '2019' ? 'selected' : '' }}>2019
                                                    </option>
                                                    <option value="2020" {{ old('tahun') == '2020' ? 'selected' : '' }}>2020
                                                    </option>
                                                    <option value="2021" {{ old('tahun') == '2021' ? 'selected' : '' }}>2021
                                                    </option>
                                                    <option value="2022" {{ old('tahun') == '2022' ? 'selected' : '' }}>2022
                                                    </option>
                                                    <option value="2023" {{ old('tahun') == '2023' ? 'selected' : '' }}>2023
                                                    </option>
                                                    <option value="2024" {{ old('tahun') == '2024' ? 'selected' : '' }}>2024
                                                    </option>
                                                    {{-- @endif --}}


                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Negeri</label>
                                                <select class="form-control" id="negeri_id" name="e_negeri">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($negeri as $data)
                                                        <option value="{{ $data->kod_negeri }}">
                                                            {{ $data->nama_negeri }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Daerah</label>
                                                <input type="text" class="form-control" placeholder="Negeri">
                                            </div>

                                        </div>

                                        <div class="col-md-5 mr-auto ">
                                            <div class="form-group">
                                                <label>No. Pelesen</label>
                                                <select class="form-control" name="e_np">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($users2 as $data)
                                                        <option value="{{ $data->e_nl }}">
                                                            {{ $data->e_nl }} - {{ $data->pelesen->e_np }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Data</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="laporan">
                                                        <option selected hidden disabled>Sila Pilih Jenis Data</option>
                                                        <option value="ebio_b5">Stok Awal Di Premis</option>
                                                        <option value="ebio_b6">Belian / Terimaan</option>
                                                        <option value="ebio_b7">Pengeluaran</option>
                                                        <option value="ebio_b8">Digunakan Untuk Proses Selanjutnya</option>
                                                        <option value="ebio_b9">Jualan / Edaran Tempatan</option>
                                                        <option value="ebio_b10">Eksport</option>
                                                        <option value="ebio_b11">Stok Akhir Dilapor</option>
                                                    </select>
                                                </fieldset>
                                            </div>


                                        </div>

                                    </div>


                                </div>
                                <div class="text-right col-md-6 mb-4 mt-4">
                                    <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                        data-target="#next">Cari</button>
                                </div>

                                <section class="section"><hr>
                                    <div class="card"><br>

                                        <h6 style="color: rgb(30, 28, 28); margin-left:40%">Stok Awal Bulan Di Premis</h6>
                                        <div class="table-responsive " id="example1">
                                            <table id="example" class="table table-bordered text-center" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="vertical-align: middle">Bil.</th>
                                                        <th scope="col" style="vertical-align: middle">Kod Produk</th>
                                                        <th scope="col" style="vertical-align: middle">No. Lesen</th>
                                                        <th scope="col" style="vertical-align: middle">Nama Pelesen</th>
                                                        <th scope="col" style="vertical-align: middle">Negeri</th>
                                                        <th scope="col" style="vertical-align: middle">Daerah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <th>-</th>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <th>-</th>
                                                        <td>-</td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- </div> --}}
                                    </div>

                                </section>
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
<script>
    function openInit(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>



    <script>
        function ajax_daerah(select) {
            negeri = select.value;
            console.log(negeri);
            //clear jenis_data selection
            $("#daerah_id").empty();
            //initialize selection
            $("#daerah_id").append('<option value="" selected disabled hidden>Sila Pilih Daerah</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-daerah/" + negeri, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        // console.log(respond[x]);
                        $("#daerah_id").append('<option value="' + respond[x].kod_daerah + '">' +
                            respond[x]
                            .nama_daerah + '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>
    <script>
        function ajax_kawasan(select) {
            negeri = select.value;
            console.log(negeri);
            //clear jenis_data selection
            $("#kawasan_id").empty();
            //initialize selection
            $("#kawasan_id").append('<option value="" selected disabled hidden>Sila Pilih Kawasan</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-kawasan/" + negeri, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        // console.log(respond[x]);
                        $("#kawasan_id").append('<option value="' + respond[x].kod_region + '">' +
                            respond[x]
                            .nama_region + '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>




    <script>
        function ajax_daerah_district(select) {
            negeri = select.value;
            console.log(negeri);
            //clear jenis_data selection
            $("#daerah_district").empty();
            //initialize selection
            $("#daerah_district").append('<option value="" selected disabled hidden>Sila Pilih Daerah</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-daerah/" + negeri, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        // console.log(respond[x]);
                        $("#daerah_district").append('<option value="' + respond[x].kod_daerah + '">' +
                            respond[x]
                            .nama_daerah + '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>
        <script>
            function ajax_kawasan_district(select) {
                negeri = select.value;
                console.log(negeri);
                //clear jenis_data selection
                $("#kawasan_district").empty();
                //initialize selection
                $("#kawasan_district").append('<option value="" selected disabled hidden>Sila Pilih Kawasan</option>');

                $.ajax({
                    type: "get",
                    url: "/ajax/fetch-kawasan/" + negeri, //penting

                    success: function(respond) {
                        //fetch data (id) from DB Senarai Harga
                        // console.log(respond);
                        //loop for data
                        var x = 0;
                        respond.forEach(function() { //penting

                            // console.log(respond[x]);
                            $("#kawasan_district").append('<option value="' + respond[x].kod_region + '">' +
                                respond[x]
                                .nama_region + '</option>');
                            x++;
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log("Status: " + textStatus);
                        console.log("Error: " + errorThrown);
                    }
                });
            }
        </script>






    <script>
        function ajax_daerah_region(select) {
            negeri = select.value;
            console.log(negeri);
            //clear jenis_data selection
            $("#daerah_region").empty();
            //initialize selection
            $("#daerah_region").append('<option value="" selected disabled hidden>Sila Pilih Daerah</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-daerah/" + negeri, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        // console.log(respond[x]);
                        $("#daerah_region").append('<option value="' + respond[x].kod_daerah + '">' +
                            respond[x]
                            .nama_daerah + '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>
        <script>
            function ajax_kawasan_region(select) {
                negeri = select.value;
                console.log(negeri);
                //clear jenis_data selection
                $("#kawasan_region").empty();
                //initialize selection
                $("#kawasan_region").append('<option value="" selected disabled hidden>Sila Pilih Kawasan</option>');

                $.ajax({
                    type: "get",
                    url: "/ajax/fetch-kawasan/" + negeri, //penting

                    success: function(respond) {
                        //fetch data (id) from DB Senarai Harga
                        // console.log(respond);
                        //loop for data
                        var x = 0;
                        respond.forEach(function() { //penting

                            // console.log(respond[x]);
                            $("#kawasan_region").append('<option value="' + respond[x].kod_region + '">' +
                                respond[x]
                                .nama_region + '</option>');
                            x++;
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log("Status: " + textStatus);
                        console.log("Error: " + errorThrown);
                    }
                });
            }
        </script>






    <script>
        function ajax_daerah_prod(select) {
            negeri = select.value;
            console.log(negeri);
            //clear jenis_data selection
            $("#daerah_prod").empty();
            //initialize selection
            $("#daerah_prod").append('<option value="" selected disabled hidden>Sila Pilih Daerah</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-daerah/" + negeri, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        // console.log(respond[x]);
                        $("#daerah_prod").append('<option value="' + respond[x].kod_daerah + '">' +
                            respond[x]
                            .nama_daerah + '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>
    <script>
        function ajax_kawasan_prod(select) {
            negeri = select.value;
            console.log(negeri);
            //clear jenis_data selection
            $("#kawasan_prod").empty();
            //initialize selection
            $("#kawasan_prod").append('<option value="" selected disabled hidden>Sila Pilih Kawasan</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-kawasan/" + negeri, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        // console.log(respond[x]);
                        $("#kawasan_prod").append('<option value="' + respond[x].kod_region + '">' +
                            respond[x]
                            .nama_region + '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>






    <script>
        function ajax_daerah_prodgroup(select) {
            negeri = select.value;
            console.log(negeri);
            //clear jenis_data selection
            $("#daerah_prodgroup").empty();
            //initialize selection
            $("#daerah_prodgroup").append('<option value="" selected disabled hidden>Sila Pilih Daerah</option>');

            $.ajax({
                type: "get",
                url: "/ajax/fetch-daerah/" + negeri, //penting

                success: function(respond) {
                    //fetch data (id) from DB Senarai Harga
                    // console.log(respond);
                    //loop for data
                    var x = 0;
                    respond.forEach(function() { //penting

                        // console.log(respond[x]);
                        $("#daerah_prodgroup").append('<option value="' + respond[x].kod_daerah + '">' +
                            respond[x]
                            .nama_daerah + '</option>');
                        x++;
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("Status: " + textStatus);
                    console.log("Error: " + errorThrown);
                }
            });
        }
    </script>
        <script>
            function ajax_kawasan_prodgroup(select) {
                negeri = select.value;
                console.log(negeri);
                //clear jenis_data selection
                $("#kawasan_prodgroup").empty();
                //initialize selection
                $("#kawasan_prodgroup").append('<option value="" selected disabled hidden>Sila Pilih Kawasan</option>');

                $.ajax({
                    type: "get",
                    url: "/ajax/fetch-kawasan/" + negeri, //penting

                    success: function(respond) {
                        //fetch data (id) from DB Senarai Harga
                        // console.log(respond);
                        //loop for data
                        var x = 0;
                        respond.forEach(function() { //penting

                            // console.log(respond[x]);
                            $("#kawasan_prodgroup").append('<option value="' + respond[x].kod_region + '">' +
                                respond[x]
                                .nama_region + '</option>');
                            x++;
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log("Status: " + textStatus);
                        console.log("Error: " + errorThrown);
                    }
                });
            }
        </script>



    <script type="text/javascript">
        $("document").ready(function() {
            setTimeout(function() {
                $("#message").remove(); //tambah untuk remove flash message
            }, 5000); // 5 secs  (1 sec = 1000)
        });
    </script>

    <script type="text/javascript">
        function showTable() {
            var bulan = $('#bulan').val();
            // console.log(oer);

            if (bulan == "equal") {
                document.getElementById('equal_container').style.display = "block";
                document.getElementById('lain_container').style.display = "block";
            } else {
                document.getElementById('equal_container').style.display = "none";
                document.getElementById('lain_container').style.display = "block";

            }

            if (bulan == "between") {
                document.getElementById('between_container').style.display = "block";
                document.getElementById('lain_container').style.display = "block";

            } else {
                document.getElementById('between_container').style.display = "none";
                document.getElementById('lain_container').style.display = "block";

            }
        }

    </script>
@endsection
