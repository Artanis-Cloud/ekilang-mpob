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
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Oleokimia</h3>
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
                </div>
            </div>
        </div>

    </div>




    </div>
@endsection

@section('scripts')
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


    <script type="text/javascript">
        $("document").ready(function() {
            setTimeout(function() {
                $("#message").remove(); //tambah untuk remove flash message
            }, 5000); // 5 secs  (1 sec = 1000)
        });
    </script>
@endsection
