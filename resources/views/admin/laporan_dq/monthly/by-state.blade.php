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
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OCA1::OLEOKIMIA</h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Bulanan Mengikut Negeri</h5>
                        </div>
                        <hr>
                        <form action="{{ route('admin.laporan.bulanan.process') }}" method="get">
                            @csrf
                            <div class="card-body">

                                <div class="container center">

                                    <div class="row">
                                        <div class="col-md-4 ml-auto">

                                            <div class="form-group">
                                                <label>Tahun</label>
                                                <div class="row">
                                                    <select class="form-control col-5 ml-2" name="tahun">
                                                        <option selected hidden disabled value="">Sila Pilih Tahun</option>
                                                        @for ($i = 2003; $i <= date('Y'); $i++)
                                                            <option>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                <input type="text" class="form-control col-5 ml-2" placeholder="Tahun">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mr-auto" >
                                            <div class="form-group">
                                                <label>Kumpulan Produk</label>
                                                <select class="form-control" name="kump_prod">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($kumpproduk as $data)
                                                        <option value="{{ $data->kumpulan }}">
                                                            {{ $data->nama_kumpulan }}
                                                        </option>
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
                                                    <select class="form-control col-5 ml-2" name="bulan">
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
                                                <input type="text" class="form-control col-5 ml-2" placeholder="Month">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mr-auto">
                                            <div class="form-group">
                                                <label>Sub-Kumpulan Produk</label>
                                                <select class="form-control" name="sub_prod">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($subproduct as $data)
                                                        <option value="{{ $data->kod_subgroup }}">
                                                            {{ $data->nama_subgroup }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 ml-auto">

                                            <div class="form-group">
                                                <label>Negeri</label>
                                                {{-- <select class="form-control col-11" name="e_kat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="between">Between</option>
                                                </select> --}}
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="negeri_id" name="e_negeri"
                                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                        oninput="setCustomValidity('')"
                                                        onchange="ajax_daerah(this);ajax_kawasan(this)">
                                                        <option selected hidden disabled value="">Sila Pilih</option>
                                                        @foreach ($negeri as $data)
                                                            <option value="{{ $data->kod_negeri }}">
                                                                {{ $data->nama_negeri }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mr-auto">
                                            <div class="form-group">
                                                <label>Produk</label>
                                                <select class="form-control" name="produk">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($produk as $data)
                                                        <option value="{{ $data->namapanjang_produk }}">
                                                            {{ $data->namapanjang_produk }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 ml-auto">

                                            <div class="form-group">
                                                <label>Daerah</label>
                                                <select class="form-control" id="daerah_id" name='e_daerah'
                                                    placeholder="Daerah"
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')">
                                                    <option selected hidden disabled value="">Sila Pilih Negeri Terlebih Dahulu
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mr-auto">
                                            <div class="form-group">
                                                <label>Kategori Produk</label>
                                                <select class="form-control" name="prod_cat">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    @foreach ($prodcat as $data)
                                                        <option value="{{ $data->ProductGroupName }}">
                                                            {{ $data->ProductGroupName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 ml-auto">

                                            <div class="form-group">
                                                <label>Kawasan</label>
                                                <select class="form-control" id="kawasan_id" name='e_kawasan'
                                                    oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                    oninput="setCustomValidity('')">
                                                    <option value="" selected hidden disabled>Sila Pilih
                                                        Daerah Terlebih Dahulu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mr-auto">
                                            <div class="form-group">
                                                <label>No. Lesen</label>
                                                <select class="form-control" name="e_nl">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($users2 as $data)
                                                        <option value="{{ $data->e_nl }}">
                                                            {{ $data->e_nl }} - {{ $data->pelesen->e_np }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" style="margin-left: 8.5%">

                                            <div class="form-group">
                                                <label>Nama Pelesen</label>
                                                <select class="form-control" name="e_np">
                                                    <option selected hidden disabled value="">Sila Pilih</option>
                                                    @foreach ($users2 as $data)
                                                        <option value="{{ $data->e_nl }}">
                                                            {{ $data->pelesen->e_np }} - {{ $data->e_nl }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="text-right col-md-6 mb-4 mt-4">
                                    <button type="submit" class="btn btn-primary" style="margin-left:90%" data-toggle="modal"
                                        >Cari</button>
                                </div>
                            </div>
                        </form>

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


@endsection
