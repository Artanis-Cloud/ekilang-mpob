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
                    <h4 class="page-title">Oleokimia - Laporan Tahunan
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
                    onclick="openInit(event, 'Licensee')" id="defaultOpen"> Mengikut Pelesen</a>
                {{-- <button class="tablinks" onclick="openInit(event, 'One')"> --}}
                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'State')"> Mengikut Negeri</a>
                {{-- </button> --}}
                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'District')"> Mengikut Daerah</a>
                {{-- </button> --}}
                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'Region')"> Mengikut Kawasan</a>
                {{-- </button> --}}
                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'Product')"> Mengikut Produk</a>
                {{-- </button> --}}
                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'Productgroup')"> Mengikut Kumpulan Produk</a>
                {{-- </button> --}}
                <a style="color:black; border-radius:unset; font-size:14.4px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'Month')"> Mengikut Bulan</a>
                {{-- </button> --}}

            </div>
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card" style="margin-right:2%; margin-left:2%">
                        <div id="Licensee" class="tabcontent">
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Oleokimia</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Tahunan Mengikut
                                Pelesen</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Laporan Tahunan</label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OYL1">OYL1 - Stok Awal Di Premis</option>
                                                    <option value="OYL2">OYL2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OYL3">OYL3 - Belian/Terimaan</option>
                                                    <option value="OYL4">OYL4 - Import</option>
                                                    <option value="OYL5">OYL5 - Pengeluaran</option>
                                                    <option value="OYL6">OYL6 - Diproses</option>
                                                    <option value="OYL7">OYL7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OYL8">OYL8 - Eksport</option>
                                                    <option value="OYL9">OYL9 - Stok Akhir Di Premis</option>
                                                    <option value="OYL10">OYL10 - Stok Akhir Di Pusat Simpanan</option>
                                                    <option value="OYL11">OYL11 - CPO + CPKO Diproses</option>
                                                    <option value="OYL12">OYL12 - CPO Utilrate</option>
                                                    <option value="OYL13">OYL13 - CPKO Utilrate</option>
                                                    <option value="OYL14">OYL14 - CPO + CPKO Utilrate</option>
                                                    <option value="OYL15">OYL15 - Utilrate Keseluruhan</option>
                                                    <option value="OYL16">OYL16 - Kapasiti</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodcat as $prodcats)
                                                    <option value="">{{ $prodcats->prodcat_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="equal">Equal</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Sub-Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodsubgroup as $prodsubgroups)
                                                    <option value="">{{ $prodsubgroups->nama_subgroup }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="between">Between</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($produk as $produks)
                                                    <option value="">{{ $produks->proddesc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Negeri</label>
                                            <div class="row col-12">
                                            <select class="form-control" id="negeri_id" name="e_negeri"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')"
                                                onchange="ajax_daerah(this);ajax_kawasan(this)" required>
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
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Kategori Produk </label>
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($prodgroup as $prodgroups)
                                                        <option value="">{{ $prodgroups->ProductGroupName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Daerah</label>
                                            <div class="row col-12">

                                            <select class="form-control" id="daerah_id" name='e_daerah' required
                                                placeholder="Daerah"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih Negeri Terlebih Dahulu
                                                </option>
                                            </select>
                                        </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>No. Lesen </label>
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($users as $user)
                                                        <option value="">{{ $user->username }} - {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Kawasan</label>
                                            <div class="row col-12">
                                            <select class="form-control" id="kawasan_id" name='e_kawasan' required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option value="" selected hidden disabled>Sila Pilih
                                                    Daerah Terlebih Dahulu</option>
                                            </select>
                                        </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Nama Pelesen</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($users as $user)
                                                    <option value="">{{ $user->username }} - {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="text-right col-md-6 mb-4 mt-4">
                                <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                    data-target="#next">Cari</button>
                            </div>
                        </div>
                        </div>



                        <div id="State" class="tabcontent">
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Oleokimia</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Tahunan Mengikut
                                Negeri</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-6 ml-auto mr-auto">

                                        <div class="form-group">
                                            <label>Laporan Tahunan</label>
                                            <div class="row">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OYS1">OYS1 - Stok Awal Di Premis</option>
                                                    <option value="OYS2">OYS2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OYS3">OYS3 - Belian/Terimaan</option>
                                                    <option value="OYS4">OYS4 - Import</option>
                                                    <option value="OYS5">OYS5 - Pengeluaran</option>
                                                    <option value="OYS6">OYS6 - Diproses</option>
                                                    <option value="OYS7">OYS7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OYS8">OYS8 - Eksport</option>
                                                    <option value="OYS9">OYS9 - Stok Akhir Di Premis</option>
                                                    <option value="OYS10">OYS10 - Stok Akhir Di Pusat Simpanan</option>
                                                    <option value="OYS11">OYS11 - CPO + CPKO Diproses</option>
                                                    <option value="OYS12">OYS12 - CPO Utilrate</option>
                                                    <option value="OYS13">OYS13 - CPKO Utilrate</option>
                                                    <option value="OYS14">OYS14 - CPO + CPKO Utilrate</option>
                                                    <option value="OYS15">OYS15 - Kapasiti</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="equal">Equal</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodcat as $prodcats)
                                                    <option value="">{{ $prodcats->prodcat_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="between">Between</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Sub-Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodsubgroup as $prodsubgroups)
                                                    <option value="">{{ $prodsubgroups->nama_subgroup }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Kategori Produk </label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($prodgroup as $prodgroups)
                                                        <option value="">{{ $prodgroups->ProductGroupName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($produk as $produks)
                                                    <option value="">{{ $produks->proddesc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>





                            </div>
                            <div class="text-right col-md-6 mb-4 mt-4">
                                <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                    data-target="#next">Cari</button>
                            </div>
                        </div>
                        </div>



                        <div id="District" class="tabcontent">
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Oleokimia</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Tahunan Mengikut
                                Daerah</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-6 ml-auto mr-auto">

                                        <div class="form-group">
                                            <label>Laporan Tahunan</label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OYD1">OYD1 - Stok Awal Di Premis</option>
                                                    <option value="OYD2">OYD2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OYD3">OYD3 - Belian/Terimaan</option>
                                                    <option value="OYD4">OYD4 - Import</option>
                                                    <option value="OYD5">OYD5 - Pengeluaran</option>
                                                    <option value="OYD6">OYD6 - Diproses</option>
                                                    <option value="OYD7">OYD7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OYD8">OYD8 - Eksport</option>
                                                    <option value="OYD9">OYD9 - Stok Akhir Di Premis</option>
                                                    <option value="OYD10">OYD10 - Stok Akhir Di Pusat Simpanan</option>
                                                    <option value="OYD11">OYD11 - CPO + CPKO Diproses</option>
                                                    <option value="OYD12">OYD12 - CPO Utilrate</option>
                                                    <option value="OYD13">OYD13 - CPKO Utilrate</option>
                                                    <option value="OYD14">OYD14 - CPO + CPKO Utilrate</option>
                                                    <option value="OYD15">OYD15 - Kapasiti</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="equal">Equal</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodcat as $prodcats)
                                                    <option value="">{{ $prodcats->prodcat_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="between">Between</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Sub-Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodsubgroup as $prodsubgroups)
                                                    <option value="">{{ $prodsubgroups->nama_subgroup }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Negeri</label>
                                            <div class="row col-12">
                                                <select class="form-control" id="negeri_id" name="e_negeri"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')"
                                                    onchange="ajax_daerah_district(this);ajax_kawasan_district(this)" required>
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
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($produk as $produks)
                                                    <option value="">{{ $produks->proddesc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Kawasan</label>
                                            <div class="row col-12">
                                                <select class="form-control" id="kawasan_district" name='e_kawasan' required
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')">
                                                    <option value="" selected hidden disabled>Sila Pilih
                                                        Negeri Terlebih Dahulu</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Kategori Produk </label>
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($prodgroup as $prodgroups)
                                                        <option value="">{{ $prodgroups->ProductGroupName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>No. Lesen </label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($users as $user)
                                                        <option value="">{{ $user->username }} - {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Nama Pelesen</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($users as $user)
                                                    <option value="">{{ $user->username }} - {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="text-right col-md-6 mb-4 mt-4">
                                <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                    data-target="#next">Cari</button>
                            </div>
                        </div>

                        </div>



                        <div id="Region" class="tabcontent">
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Oleokimia</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Tahunan Mengikut
                                Kawasan</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Laporan Tahunan</label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OYR1">OYR1 - Stok Awal Di Premis</option>
                                                    <option value="OYR2">OYR2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OYR3">OYR3 - Belian/Terimaan</option>
                                                    <option value="OYR4">OYR4 - Import</option>
                                                    <option value="OYR5">OYR5 - Pengeluaran</option>
                                                    <option value="OYR6">OYR6 - Diproses</option>
                                                    <option value="OYR7">OYR7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OYR8">OYR8 - Eksport</option>
                                                    <option value="OYR9">OYR9 - Stok Akhir Di Premis</option>
                                                    <option value="OYR10">OYR10 - Stok Akhir Di Pusat Simpanan</option>
                                                    <option value="OYR11">OYR11 - CPO + CPKO Diproses</option>
                                                    <option value="OYR12">OYR12 - CPO Utilrate</option>
                                                    <option value="OYR13">OYR13 - CPKO Utilrate</option>
                                                    <option value="OYR14">OYR14 - CPO + CPKO Utilrate</option>
                                                    <option value="OYR15">OYR15 - Kapasiti</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodcat as $prodcats)
                                                    <option value="">{{ $prodcats->prodcat_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="equal">Equal</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Sub-Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodsubgroup as $prodsubgroups)
                                                    <option value="">{{ $prodsubgroups->nama_subgroup }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="between">Between</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($produk as $produks)
                                                    <option value="">{{ $produks->proddesc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Negeri</label>
                                            <div class="row col-12">
                                            <select class="form-control" id="negeri_id" name="e_negeri"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')"
                                                onchange="ajax_daerah_region(this);ajax_kawasan_region(this)" required>
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
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Kategori Produk </label>
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($prodgroup as $prodgroups)
                                                        <option value="">{{ $prodgroups->ProductGroupName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Daerah</label>
                                            <div class="row col-12">

                                            <select class="form-control" id="daerah_region" name='e_daerah' required
                                                placeholder="Daerah"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih Negeri Terlebih Dahulu
                                                </option>
                                            </select>
                                        </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>No. Lesen </label>
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($users as $user)
                                                        <option value="">{{ $user->username }} - {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Kawasan</label>
                                            <div class="row col-12">
                                            <select class="form-control" id="kawasan_region" name='e_kawasan' required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option value="" selected hidden disabled>Sila Pilih
                                                    Daerah Terlebih Dahulu</option>
                                            </select>
                                        </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Nama Pelesen</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($users as $user)
                                                    <option value="">{{ $user->username }} - {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="text-right col-md-6 mb-4 mt-4">
                                <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                    data-target="#next">Cari</button>
                            </div>
                        </div>
                        </div>



                        <div id="Product" class="tabcontent">
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Oleokimia</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Tahunan Mengikut
                                Produk</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Laporan Tahunan</label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OYT1">OYT1 - Stok Awal Di Premis</option>
                                                    <option value="OYT2">OYT2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OYT3">OYT3 - Belian/Terimaan</option>
                                                    <option value="OYT4">OYT4 - Import</option>
                                                    <option value="OYT5">OYT5 - Pengeluaran</option>
                                                    <option value="OYT6">OYT6 - Diproses</option>
                                                    <option value="OYT7">OYT7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OYT8">OYT8 - Eksport</option>
                                                    <option value="OYT9">OYT9 - Stok Akhir Di Premis</option>
                                                    <option value="OYT10">OYT10 - Stok Akhir Di Pusat Simpanan</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodcat as $prodcats)
                                                    <option value="">{{ $prodcats->prodcat_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="equal">Equal</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Sub-Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodsubgroup as $prodsubgroups)
                                                    <option value="">{{ $prodsubgroups->nama_subgroup }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="between">Between</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($produk as $produks)
                                                    <option value="">{{ $produks->proddesc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Negeri</label>
                                            <div class="row col-12">
                                            <select class="form-control" id="negeri_id" name="e_negeri"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')"
                                                onchange="ajax_daerah_prod(this);ajax_kawasan_prod(this)" required>
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
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Kategori Produk </label>
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($prodgroup as $prodgroups)
                                                        <option value="">{{ $prodgroups->ProductGroupName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Daerah</label>
                                            <div class="row col-12">

                                            <select class="form-control" id="daerah_prod" name='e_daerah' required
                                                placeholder="Daerah"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih Negeri Terlebih Dahulu
                                                </option>
                                            </select>
                                        </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>No. Lesen </label>
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($users as $user)
                                                        <option value="">{{ $user->username }} - {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Kawasan</label>
                                            <div class="row col-12">
                                            <select class="form-control" id="kawasan_prod" name='e_kawasan' required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option value="" selected hidden disabled>Sila Pilih
                                                    Daerah Terlebih Dahulu</option>
                                            </select>
                                        </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Nama Pelesen</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($users as $user)
                                                    <option value="">{{ $user->username }} - {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="text-right col-md-6 mb-4 mt-4">
                                <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                    data-target="#next">Cari</button>
                            </div>
                        </div>
                        </div>



                        <div id="Productgroup" class="tabcontent">
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Oleokimia</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Tahunan Mengikut
                                Kumpulan Produk</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Laporan Tahunan</label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OYG1">OYG1 - Stok Awal Di Premis</option>
                                                    <option value="OYG2">OYG2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OYG3">OYG3 - Belian/Terimaan</option>
                                                    <option value="OYG4">OYG4 - Import</option>
                                                    <option value="OYG5">OYG5 - Pengeluaran</option>
                                                    <option value="OYG6">OYG6 - Diproses</option>
                                                    <option value="OYG7">OYG7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OYG8">OYG8 - Eksport</option>
                                                    <option value="OYG9">OYG9 - Stok Akhir Di Premis</option>
                                                    <option value="OYG10">OYG10 - Stok Akhir Di Pusat Simpanan</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodcat as $prodcats)
                                                    <option value="">{{ $prodcats->prodcat_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="equal">Equal</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Sub-Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodsubgroup as $prodsubgroups)
                                                    <option value="">{{ $prodsubgroups->nama_subgroup }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="between">Between</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($produk as $produks)
                                                    <option value="">{{ $produks->proddesc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Negeri</label>
                                            <div class="row col-12">
                                            <select class="form-control" id="negeri_id" name="e_negeri"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')"
                                                onchange="ajax_daerah_prodgroup(this);ajax_kawasan_prodgroup(this)" required>
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
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Kategori Produk </label>
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($prodgroup as $prodgroups)
                                                        <option value="">{{ $prodgroups->ProductGroupName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Daerah</label>
                                            <div class="row col-12">

                                            <select class="form-control" id="daerah_prodgroup" name='e_daerah' required
                                                placeholder="Daerah"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih Negeri Terlebih Dahulu
                                                </option>
                                            </select>
                                        </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>No. Lesen </label>
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($users as $user)
                                                        <option value="">{{ $user->username }} - {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Kawasan</label>
                                            <div class="row col-12">
                                            <select class="form-control" id="kawasan_prodgroup" name='e_kawasan' required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option value="" selected hidden disabled>Sila Pilih
                                                    Daerah Terlebih Dahulu</option>
                                            </select>
                                        </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Nama Pelesen</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($users as $user)
                                                    <option value="">{{ $user->username }} - {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="text-right col-md-6 mb-4 mt-4">
                                <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                    data-target="#next">Cari</button>
                            </div>
                        </div>

                        </div>



                        <div id="Month" class="tabcontent">
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Oleokimia</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Tahunan Mengikut
                                Bulan</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Laporan Tahunan</label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OYM1">OYM1 - Stok Awal Di Premis</option>
                                                    <option value="OYM2">OYM2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OYM3">OYM3 - Belian/Terimaan</option>
                                                    <option value="OYM4">OYM4 - Import</option>
                                                    <option value="OYM5">OYM5 - Pengeluaran</option>
                                                    <option value="OYM6">OYM6 - Diproses</option>
                                                    <option value="OYM7">OYM7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OYM8">OYM8 - Eksport</option>
                                                    <option value="OYM9">OYM9 - Stok Akhir Di Premis</option>
                                                    <option value="OYM10">OYM10 - Stok Akhir Di Pusat Simpanan</option>
                                                    <option value="OYM11">OYM11 - CPO + CPKO Diproses</option>
                                                    <option value="OYM12">OYM12 - CPO Utilrate</option>
                                                    <option value="OYM13">OYM13 - CPKO Utilrate</option>
                                                    <option value="OYM14">OYM14 - CPO + CPKO Utilrate</option>
                                                    <option value="OYM15">OYM15 - Kapasiti</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodcat as $prodcats)
                                                    <option value="">{{ $prodcats->prodcat_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="equal">Equal</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Sub-Kumpulan Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($prodsubgroup as $prodsubgroups)
                                                    <option value="">{{ $prodsubgroups->nama_subgroup }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <div class="row">
                                                <select class="form-control col-5 ml-2" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="between">Between</option>
                                                </select>
                                                <input type="text" class="form-control col-5 ml-3" placeholder="Month">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Produk</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($produk as $produks)
                                                    <option value="">{{ $produks->proddesc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Negeri</label>
                                            <div class="row col-12">
                                            <select class="form-control" id="negeri_id" name="e_negeri"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')"
                                                onchange="ajax_daerah_month(this);ajax_kawasan_month(this)" required>
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
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Kategori Produk </label>
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($prodgroup as $prodgroups)
                                                        <option value="">{{ $prodgroups->ProductGroupName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Daerah</label>
                                            <div class="row col-12">

                                            <select class="form-control" id="daerah_month" name='e_daerah' required
                                                placeholder="Daerah"
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih Negeri Terlebih Dahulu
                                                </option>
                                            </select>
                                        </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>No. Lesen </label>
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($users as $user)
                                                        <option value="">{{ $user->username }} - {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-auto">
                                        <div class="form-group">
                                            <label>Kawasan</label>
                                            <div class="row col-12">
                                            <select class="form-control" id="kawasan_month" name='e_kawasan' required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option value="" selected hidden disabled>Sila Pilih
                                                    Daerah Terlebih Dahulu</option>
                                            </select>
                                        </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mr-auto">
                                        <div class="form-group">
                                            <label>Nama Pelesen</label>
                                            <select class="form-control" name="e_kat">
                                                <option selected hidden disabled>Sila Pilih</option>
                                                @foreach ($users as $user)
                                                    <option value="">{{ $user->username }} - {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="text-right col-md-6 mb-4 mt-4">
                                <button type="button" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                    data-target="#next">Cari</button>
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






    <script>
        function ajax_daerah_month(select) {
            negeri = select.value;
            console.log(negeri);
            //clear jenis_data selection
            $("#daerah_month").empty();
            //initialize selection
            $("#daerah_month").append('<option value="" selected disabled hidden>Sila Pilih Daerah</option>');

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
                        $("#daerah_month").append('<option value="' + respond[x].kod_daerah + '">' +
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
            function ajax_kawasan_month(select) {
                negeri = select.value;
                console.log(negeri);
                //clear jenis_data selection
                $("#kawasan_month").empty();
                //initialize selection
                $("#kawasan_month").append('<option value="" selected disabled hidden>Sila Pilih Kawasan</option>');

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
                            $("#kawasan_month").append('<option value="' + respond[x].kod_region + '">' +
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
@endsection
