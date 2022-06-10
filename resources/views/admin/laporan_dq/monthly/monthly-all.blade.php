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
                    <h4 class="page-title">Oleokimia
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
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Bulanan Mengikut
                                Pelesen</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Laporan Bulanan</label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OML1">OML1 - Stok Awal Di Premis</option>
                                                    <option value="OML2">OML2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OML3">OML3 - Belian/Terimaan</option>
                                                    <option value="OML4">OML4 - Import</option>
                                                    <option value="OML5">OML5 - Pengeluaran</option>
                                                    <option value="OML6">OML6 - Diproses</option>
                                                    <option value="OML7">OML7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OML8">OML8 - Eksport</option>
                                                    <option value="OML9">OML9 - Stok Akhir Di Premis</option>
                                                    <option value="OML10">OML10 - Stok Akhir Di Pusat Simpanan</option>
                                                    <option value="OML11">OML11 - CPO + CPKO Diproses</option>
                                                    <option value="OML12">OML12 - PPO Diproses</option>
                                                    <option value="OML13">OML13 - PPKO Diproses</option>
                                                    <option value="OML14">OML14 - CPO+CPKO+PPO+PPKO Diproses</option>
                                                    <option value="OML15">OML15 - CPO Utilrate</option>
                                                    <option value="OML16">OML16 - CPKO Utilrate</option>
                                                    <option value="OML17">OML17 - CPO + CPKO Utilrate</option>
                                                    <option value="OML18">OML18 - PPO Utilrate</option>
                                                    <option value="OML19">OML19 - PPKO Utilrate</option>
                                                    <option value="OML20">OML20 - CPO+CPKO+PPO+PPKO Utilrate</option>
                                                    <option value="OML21">OML21 - Utilrate Keseluruhan</option>
                                                    <option value="OML22">OML22 - Kapasiti</option>
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
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Bulanan Mengikut
                                Negeri</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Laporan Bulanan</label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OMS1">OMS1 - Stok Awal Di Premis</option>
                                                    <option value="OMS2">OMS2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OMS3">OMS3 - Belian/Terimaan</option>
                                                    <option value="OMS4">OMS4 - Import</option>
                                                    <option value="OMS5">OMS5 - Pengeluaran</option>
                                                    <option value="OMS6">OMS6 - Diproses</option>
                                                    <option value="OMS7">OMS7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OMS8">OMS8 - Eksport</option>
                                                    <option value="OMS9">OMS9 - Stok Akhir Di Premis</option>
                                                    <option value="OMS10">OMS10 - Stok Akhir Di Pusat Simpanan</option>
                                                    <option value="OMS11">OMS11 - CPO + CPKO Diproses</option>
                                                    <option value="OMS12">OMS12 - PPO Diproses</option>
                                                    <option value="OMS13">OMS13 - PPKO Diproses</option>
                                                    <option value="OMS14">OMS14 - CPO+CPKO+PPO+PPKO Diproses</option>
                                                    <option value="OMS15">OMS15 - CPO Utilrate</option>
                                                    <option value="OMS16">OMS16 - CPKO Utilrate</option>
                                                    <option value="OMS17">OMS17 - CPO + CPKO Utilrate</option>
                                                    <option value="OMS18">OMS18 - PPO Utilrate</option>
                                                    <option value="OMS19">OMS19 - PPKO Utilrate</option>
                                                    <option value="OMS20">OMS20 - CPO+CPKO+PPO+PPKO Utilrate</option>
                                                    <option value="OMS21">OMS21 - Kapasiti</option>
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



                        <div id="District" class="tabcontent">
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Oleokimia</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Bulanan Mengikut
                                Daerah</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Laporan Bulanan</label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OMS1">OMS1 - Stok Awal Di Premis</option>
                                                    <option value="OMS2">OMS2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OMS3">OMS3 - Belian/Terimaan</option>
                                                    <option value="OMS4">OMS4 - Import</option>
                                                    <option value="OMS5">OMS5 - Pengeluaran</option>
                                                    <option value="OMS6">OMS6 - Diproses</option>
                                                    <option value="OMS7">OMS7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OMS8">OMS8 - Eksport</option>
                                                    <option value="OMS9">OMS9 - Stok Akhir Di Premis</option>
                                                    <option value="OMS10">OMS10 - Stok Akhir Di Pusat Simpanan</option>
                                                    <option value="OMS11">OMS11 - CPO + CPKO Diproses</option>
                                                    <option value="OMS12">OMS12 - PPO Diproses</option>
                                                    <option value="OMS13">OMS13 - PPKO Diproses</option>
                                                    <option value="OMS14">OMS14 - CPO+CPKO+PPO+PPKO Diproses</option>
                                                    <option value="OMS15">OMS15 - CPO Utilrate</option>
                                                    <option value="OMS16">OMS16 - CPKO Utilrate</option>
                                                    <option value="OMS17">OMS17 - CPO + CPKO Utilrate</option>
                                                    <option value="OMS18">OMS18 - PPO Utilrate</option>
                                                    <option value="OMS19">OMS19 - PPKO Utilrate</option>
                                                    <option value="OMS20">OMS20 - CPO+CPKO+PPO+PPKO Utilrate</option>
                                                    <option value="OMS21">OMS21 - Kapasiti</option>
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



                        <div id="Region" class="tabcontent">
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-2%; margin-bottom:1%">Oleokimia</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Bulanan Mengikut
                                Kawasan</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Laporan Bulanan</label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OMR1">OMR1 - Stok Awal Di Premis</option>
                                                    <option value="OMR2">OMR2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OMR3">OMR3 - Belian/Terimaan</option>
                                                    <option value="OMR4">OMR4 - Import</option>
                                                    <option value="OMR5">OMR5 - Pengeluaran</option>
                                                    <option value="OMR6">OMR6 - Diproses</option>
                                                    <option value="OMR7">OMR7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OMR8">OMR8 - Eksport</option>
                                                    <option value="OMR9">OMR9 - Stok Akhir Di Premis</option>
                                                    <option value="OMR10">OMR10 - Stok Akhir Di Pusat Simpanan</option>
                                                    <option value="OMR11">OMR11 - CPO + CPKO Diproses</option>
                                                    <option value="OMR12">OMR12 - PPO Diproses</option>
                                                    <option value="OMR13">OMR13 - PPKO Diproses</option>
                                                    <option value="OMR14">OMR14 - CPO+CPKO+PPO+PPKO Diproses</option>
                                                    <option value="OMR15">OMR15 - CPO Utilrate</option>
                                                    <option value="OMR16">OMR16 - CPKO Utilrate</option>
                                                    <option value="OMR17">OMR17 - CPO + CPKO Utilrate</option>
                                                    <option value="OMR18">OMR18 - PPO Utilrate</option>
                                                    <option value="OMR19">OMR19 - PPKO Utilrate</option>
                                                    <option value="OMR20">OMR20 - CPO+CPKO+PPO+PPKO Utilrate</option>
                                                    <option value="OMR21">OMR21 - Kapasiti</option>
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
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Bulanan Mengikut
                                Produk</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Laporan Bulanan</label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OMT1">OMT1 - Stok Awal Di Premis</option>
                                                    <option value="OMT2">OMT2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OMT3">OMT3 - Belian/Terimaan</option>
                                                    <option value="OMT4">OMT4 - Import</option>
                                                    <option value="OMT5">OMT5 - Pengeluaran</option>
                                                    <option value="OMT6">OMT6 - Diproses</option>
                                                    <option value="OMT7">OMT7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OMT8">OMT8 - Eksport</option>
                                                    <option value="OMT9">OMT9 - Stok Akhir Di Premis</option>
                                                    <option value="OMT10">OMT10 - Stok Akhir Di Pusat Simpanan</option>
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
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Laporan Bulanan Mengikut
                                Kumpulan Produk</h5>
                        </div>
                        <hr>

                        <div class="card-body">

                            <div class="container center">

                                <div class="row">
                                    <div class="col-md-4 ml-auto">

                                        <div class="form-group">
                                            <label>Laporan Bulanan</label>
                                            <div class="row col-12">
                                                <select class="form-control" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="OMG1">OMG1 - Stok Awal Di Premis</option>
                                                    <option value="OMG2">OMG2 - Stok Awal Di Pusat Simpanan</option>
                                                    <option value="OMG3">OMG3 - Belian/Terimaan</option>
                                                    <option value="OMG4">OMG4 - Import</option>
                                                    <option value="OMG5">OMG5 - Pengeluaran</option>
                                                    <option value="OMG6">OMG6 - Diproses</option>
                                                    <option value="OMG7">OMG7 - Jualan/Edaran Tempatan</option>
                                                    <option value="OMG8">OMG8 - Eksport</option>
                                                    <option value="OMG9">OMG9 - Stok Akhir Di Premis</option>
                                                    <option value="OMG10">OMG10 - Stok Akhir Di Pusat Simpanan</option>
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
@endsection
