@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mt-2">

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

        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Kapasiti Kilang Biodiesel
                            </h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">PMB2 :: Butiran Urusniaga Pelesen</h5> --}}
                        </div>
                        <hr>

                        <div class="card-body">
                            <form action="{{ route('admin.edit.kapasiti.proses', $pelesen->e_id) }}" method="post">
                                @csrf
                            <div class="container center">

                                <div class="row ml-auto" style="margin-top:-1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label  align-items-center">Nama
                                        Premis
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Nama Premis"
                                            value="{{ $pelesen->e_np ?? ''}}" readonly>

                                    </div>
                                </div>
                                <div class="row mt-2 ml-auto">
                                    <label
                                        class="text-right col-sm-4 control-label col-form-label  align-items-center">Negeri
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Negeri"
                                            value="{{ $pelesen->e_negeri ?? ''}}" readonly>

                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-5 ml-auto">
                                        <label class="control-label">Bulan</label>
                                        <select class="form-control" name="bulan">
                                            <option {{ $pelesen->bulan == '01' ? 'selected' : '' }} value="01">
                                                JANUARI</option>
                                            <option {{ $pelesen->bulan == '02' ? 'selected' : '' }} value="02">
                                                FEBRUARI</option>
                                            <option {{ $pelesen->bulan == '03' ? 'selected' : '' }} value="03">
                                                MAC</option>
                                            <option {{ $pelesen->bulan == '04' ? 'selected' : '' }} value="04">
                                                APRIL</option>
                                            <option {{ $pelesen->bulan == '05' ? 'selected' : '' }} value="05">
                                                MEI</option>
                                            <option {{ $pelesen->bulan == '06' ? 'selected' : '' }} value="06">
                                                JUN</option>
                                            <option {{ $pelesen->bulan == '07' ? 'selected' : '' }} value="07">
                                                JULAI</option>
                                            <option {{ $pelesen->bulan == '08' ? 'selected' : '' }} value="08">
                                                OGOS</option>
                                            <option {{ $pelesen->bulan == '09' ? 'selected' : '' }} value="09">
                                                SEPTEMBER</option>
                                            <option {{ $pelesen->bulan == '10' ? 'selected' : '' }} value="10">
                                                OKTOBER</option>
                                            <option {{ $pelesen->bulan == '11' ? 'selected' : '' }} value="11">
                                                NOVEMBER</option>
                                            <option {{ $pelesen->bulan == '12' ? 'selected' : '' }} value="12">
                                                DISEMBER</option>
                                            {{-- <option selected hidden disabled>Sila Pilih Bulan</option> --}}
                                        </select>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Tahun</label>
                                            <input type="text" id="lastName" name="tahun" class="form-control form-control-danger"
                                                placeholder="Tahun" value="{{ $pelesen->tahun ?? '' }}">
                                        </div>
                                    </div>
                                    <!--/span-->

                                </div>
                                <div class="row ">
                                    <div class="col-md-5 ml-auto">
                                        <div class="form-group">
                                            <label class="control-label">Kategori</label>
                                            <input type="text" id="firstName" class="form-control"
                                                value='Kilang Biodiesel' readonly>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Kapasiti</label>
                                            <input type="text" id="lastName" name='kap_proses' class="form-control form-control-danger"
                                                placeholder="0.00" value="{{ $pelesen->kap_proses ?? '' }}">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                            </div>
                            <div class="col-12 mb-4 mt-4" style="margin-left:41%">
                                {{-- <div class="text-left"> --}}
                                    <a href="{{ route('admin.kapasiti') }}" type="button" class="btn btn-primary">Kembali</a>
                                {{-- </div> --}}
                                {{-- <div class="text-right ml-auto"> --}}

                                    <button type="submit" class="btn btn-primary" data-toggle="modal"
                                        data-target="#next">Simpan</button>
                                {{-- </div> --}}
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
                "columnDefs": [{
                    'targets': [0, 7, 8],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }]

            });
        });
    </script>
@endsection
