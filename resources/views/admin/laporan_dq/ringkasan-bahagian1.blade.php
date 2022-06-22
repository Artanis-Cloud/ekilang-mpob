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
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Ringkasan Penyata Maklumat Bulanan</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 1</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">
                                <div class="row" style="margin-top:-2%">
                                    <div class="col-md-3 ml-auto">

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
                                    </div>
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <label>Bulan</label>
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
                                    <div class="col-md-3 mr-auto">

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
                                </div>
                                <div class="row">

                                    <div class="col-md-3 ml-auto">
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
                                    </div>
                                    <div class="col-md-3">
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
                                    </div>
                                    <div class="col-md-3 mr-auto">
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
                            <div class="text-right col-md-6 mb-4 mt-4"><a href="{{ route('admin.laporan.ringkasan') }}">
                                <button type="button"  class="btn btn-primary" data-toggle="modal"
                                   >Cari</button>
                                   </a>
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
@endsection

@section('scripts')

@endsection
