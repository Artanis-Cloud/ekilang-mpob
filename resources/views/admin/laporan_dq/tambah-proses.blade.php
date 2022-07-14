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
                    <h4 class="page-title">Hebahan 10hb
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
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Minyak Sawit Diproses
                            </h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Tambah Proses</h5>
                        </div>
                        <hr>

                        <div class="card-body">
                            <form action="{{ route('admin.add.minyak.sawit.diproses') }}" method="post">
                                @csrf
                                <div class="container center">

                                    <div class="row ml-auto" style="margin-top:-1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label  align-items-center">Tahun
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="tahun" id="tahun1">
                                                <option selected hidden disabled value="">Sila Pilih Tahun</option>
                                                @for ($i = 2011; $i <= date('Y'); $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row mt-2 ml-auto">
                                        <label
                                            class="text-right col-sm-4 control-label col-form-label  align-items-center">Bulan
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="bulan" id="bulan1">
                                                <option value="01">JANUARI</option>
                                                <option value="02">FEBRUARI</option>
                                                <option value="03">MAC</option>
                                                <option value="04">APRIL</option>
                                                <option value="05">MEI</option>
                                                <option value="06">JUN</option>
                                                <option value="07">JULAI</option>
                                                <option value="08">OGOS</option>
                                                <option value="09">SEPTEMBER</option>
                                                <option value="10">OKTOBER</option>
                                                <option value="11">NOVEMBER</option>
                                                <option value="12">DISEMBER</option>


                                                <option selected hidden disabled>Sila Pilih Bulan</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-12 mb-4 mt-4" style="margin-left:44%">

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#next2">Get Proses</button>
                                        {{-- </div> --}}
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Malaysia</b></div>
                                    <div class="row p-t-20">
                                        <div class="col-md-5 ml-auto">
                                            <label class="control-label">CPO</label>
                                            <input type="text" id="cpo1" name="cpo_msia"
                                                class="form-control form-control-danger" placeholder="0.00">
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-5 mr-auto">
                                            <div class="form-group has-danger">
                                                <label class="control-label">PPO</label>
                                                <input type="text" id="ppo1" name="ppo_msia"
                                                    class="form-control form-control-danger" placeholder="0.00"
                                                    value="">
                                            </div>
                                        </div>
                                        <!--/span-->

                                    </div>
                                    <div class="row ">
                                        <div class="col-md-5 ml-auto">
                                            <div class="form-group">
                                                <label class="control-label">CPKO</label>
                                                <input type="text" id="cpko1" name="cpko_msia" class="form-control"
                                                    placeholder="0.00">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-5 mr-auto">
                                            <div class="form-group has-danger">
                                                <label class="control-label">PPKO</label>
                                                <input type="text" id="ppko1" name="ppko_msia"
                                                    class="form-control form-control-danger" placeholder="0.00">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <br>




                                </div>
                                <div class="col-12 mb-4 mt-4" style="margin-left:41%">
                                    {{-- <div class="text-left"> --}}
                                    <a href="{{ route('admin.minyak.sawit.diproses') }}" type="button"
                                        class="btn btn-primary">Kembali</a>
                                    {{-- </div> --}}
                                    {{-- <div class="text-right ml-auto"> --}}

                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    {{-- </div> --}}
                                </div>
                            </form>
                            <div class="col-md-6 col-12">

                                <!--scrolling content Modal -->
                                <div class="modal fade" id="next2" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                    Kemaskini Maklumat Produk</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" id="SubmitForm">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label class="required">Tahun</label>
                                                        <div class="form-group">
                                                            <fieldset class="form-group">
                                                                <select class="form-control" id="tahun"
                                                                    name="tahun">
                                                                    <option selected hidden disabled value="">Sila
                                                                        Pilih Tahun</option>
                                                                    @for ($i = 2011; $i <= date('Y'); $i++)
                                                                        <option value="{{ $i }}">
                                                                            {{ $i }}</option>
                                                                    @endfor

                                                                </select>
                                                            </fieldset>

                                                        </div>
                                                        <label class="required">Bulan </label>
                                                        <div class="form-group">
                                                            <fieldset class="form-group">
                                                                <select class="form-control" id="bulan"
                                                                    name="bulan">
                                                                    <option selected hidden disabled value="">Sila
                                                                        Pilih Bulan</option>
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

                                                        <div class="float-right ">
                                                            <button type="submit" class="btn btn-primary ml-1">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Query</span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    {{-- </div> --}}
                                                    <div class="mb-4"></div>

                                                    <hr>
                                                </form>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>CPO: </label>
                                                        <div class="form-group">
                                                            <input type="text" name='cpo' class="form-control"
                                                                value="0" id="cpo" readonly>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>PPO: </label>
                                                        <div class="form-group">
                                                            <input type="text" name='ppo' class="form-control"
                                                                value="0" id="ppo" readonly>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>CPKO: </label>
                                                        <div class="form-group">
                                                            <input type="text" name='cpko' class="form-control"
                                                                value="0" id="cpko" readonly>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>PPKO: </label>
                                                        <div class="form-group">
                                                            <input type="text" name='ppko' class="form-control"
                                                                id="ppko" value="0" readonly>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    {{-- <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                                </button> --}}
                                                    <button type="button" class="btn btn-primary ml-1"
                                                        data-dismiss="modal" onclick="copy()">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">COPY</span>
                                                    </button>
                                                </div>
                                                {{-- </form> --}}

                                            </div>

                                        </div>
                                    </div>
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
    <script>
        $('#SubmitForm').on('submit', function(e) {
            e.preventDefault();

            let tahun = $('#tahun').val();
            let bulan = $('#bulan').val();

            $.ajax({
                url: "{{ route('admin.tambah.proses.proses') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    tahun: tahun,
                    bulan: bulan,
                },
                success: function(response) {
                    console.log(JSON.stringify(response));
                    $('#cpo').val(response.success.cpo_msia ?? 0);
                    $('#ppo').val(response.success.ppo_msia ?? 0);
                    $('#cpko').val(response.success.cpko_msia ?? 0);
                    $('#ppko').val(response.success.ppko_msia ?? 0);
                },
                error: function(response) {
                    alert(JSON.stringify(response));
                },
            });
        });
    </script>

    <script>
        function copy() {
            $('#tahun1').val($('#tahun').val());
            $('#bulan1').val($('#bulan').val());
            $('#cpo1').val($('#cpo').val());
            $('#ppo1').val($('#ppo').val());
            $('#cpko1').val($('#cpko').val());
            $('#ppko1').val($('#ppko').val());
            // $('#ppo_sm').val(response.success.ppo_sm);
            // $('#cpko_sm').val(response.success.cpko_sm ?? 0);
            // $('#ppko_sm').val(response.success.ppko_sm);
        }
    </script>
@endsection
