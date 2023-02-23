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
                        <div class="row" style="padding: 20px; background-color: white; margin-right:2%; margin-left:2%">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-1%; margin-bottom:1%">Stok Akhir
                            </h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Tambah Stok Akhir</h5>
                        </div>
                        <hr>

                        <div class="card-body">
                            <form action="{{ route('admin.tambah.stok.akhir.proses2') }}" method="post" class="sub-form">
                                @csrf
                            <div class="container center">
                                {{-- @if ($errors->any())
                                        {{ implode('', $errors->all('<div>:message</div>')) }}
                                        @endif --}}
                                <div class="row ml-auto" style="margin-top:-1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label  align-items-center">Tahun
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="tahun" id="tahun1"  required
                                        oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                        oninput="setCustomValidity('')">
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
                                        <select class="form-control" name="bulan" id="bulan1" >
                                        <option selected hidden disabled value="">Sila Pilih Bulan</option>

                                            <option value="1">JANUARI</option>
                                            <option value="2">FEBRUARI</option>
                                            <option value="3">MAC</option>
                                            <option value="4">APRIL</option>
                                            <option value="5">MEI</option>
                                            <option value="6">JUN</option>
                                            <option value="7">JULAI</option>
                                            <option value="8">OGOS</option>
                                            <option value="9">SEPTEMBER</option>
                                            <option value="10">OKTOBER</option>
                                            <option value="11">NOVEMBER</option>
                                            <option value="12">DISEMBER</option>


                                        </select>

                                    </div>
                                </div>
                                <div class="col-12 mb-4 mt-4" style="margin-left:44%">

                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#stock">Get Stock</button>
                                    {{-- </div> --}}
                                </div>
                                <hr>
                                <br>
                                <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Semenanjung Malaysia</b>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-5 ml-auto">
                                        <label class="control-label">CPO</label>
                                        <input type="text" id="cpo_sm_1" name="cpo_sm" class="form-control form-control-danger"
                                            placeholder="0.00">
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">PPO</label>
                                            <input type="text" id="ppo_sm_1" name="ppo_sm" class="form-control form-control-danger"
                                                placeholder="0.00" value="">
                                        </div>
                                    </div>
                                    <!--/span-->

                                </div>
                                <div class="row ">
                                    <div class="col-md-5 ml-auto">
                                        <div class="form-group">
                                            <label class="control-label">CPKO</label>
                                            <input type="text" id="cpko_sm_1" name="cpko_sm" class="form-control" placeholder="0.00">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">PPKO</label>
                                            <input type="text" id="ppko_sm_1" name="ppko_sm" class="form-control form-control-danger"
                                                placeholder="0.00">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <br>
                                <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sabah</b></div>
                                <div class="row p-t-20">
                                    <div class="col-md-5 ml-auto">
                                        <label class="control-label">CPO</label>
                                        <input type="text" id="cpo_sbh_1" name="cpo_sbh" class="form-control form-control-danger"
                                            placeholder="0.00">
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">PPO</label>
                                            <input type="text" id="ppo_sbh_1" name="ppo_sbh" class="form-control form-control-danger"
                                                placeholder="0.00" value="">
                                        </div>
                                    </div>
                                    <!--/span-->

                                </div>
                                <div class="row ">
                                    <div class="col-md-5 ml-auto">
                                        <div class="form-group">
                                            <label class="control-label">CPKO</label>
                                            <input type="text" id="cpko_sbh_1" name="cpko_sbh" class="form-control"
                                                placeholder="0.00">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">PPKO</label>
                                            <input type="text" id="ppko_sbh_1" name="ppko_sbh"
                                                class="form-control form-control-danger" placeholder="0.00">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <br>
                                <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sarawak</b></div>
                                <div class="row p-t-20">
                                    <div class="col-md-5 ml-auto">
                                        <label class="control-label">CPO</label>
                                        <input type="text" id="cpo_srwk_1" class="form-control form-control-danger"
                                            placeholder="0.00" name="cpo_srwk">
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">PPO</label>
                                            <input type="text" id="ppo_srwk_1"
                                                class="form-control form-control-danger" placeholder="0.00"
                                                value="" name="ppo_srwk">
                                        </div>
                                    </div>
                                    <!--/span-->

                                </div>
                                <div class="row ">
                                    <div class="col-md-5 ml-auto">
                                        <div class="form-group">
                                            <label class="control-label">CPKO</label>
                                            <input type="text" id="cpko_srwk_1" class="form-control"
                                                placeholder="0.00" name="cpko_srwk">
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-5 mr-auto">
                                        <div class="form-group has-danger">
                                            <label class="control-label">PPKO</label>
                                            <input type="text" id="ppko_srwk_1" name="ppko_srwk"
                                                class="form-control form-control-danger" placeholder="0.00">
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                            </div>

                        </div>
                    </div>
                    {{-- </div> --}}



                    <div class="col-12 mb-4 mt-4" style="margin-left:41%">
                        {{-- <div class="text-left"> --}}
                        <a href="{{ route('admin.stok.akhir') }}" type="button" class="btn btn-primary">Kembali</a>
                        {{-- </div> --}}
                        {{-- <div class="text-right ml-auto"> --}}

                        <button type="submit" class="btn btn-primary" >Tambah</button>
                        {{-- </div> --}}
                    </div>

                </form>
                <!--scrolling content Modal -->
                <div class="modal fade" id="stock" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                STOK AKHIR</h5>
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
                                            <select class="form-control" id="tahun" name="tahun1" required
                                            oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                            oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih
                                                    Tahun</option>
                                                @for ($i = 2011; $i <= date('Y'); $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor

                                            </select>
                                        </fieldset>

                                    </div>
                                    <label class="required">Bulan </label>
                                    <div class="form-group">
                                        <fieldset class="form-group">
                                            <select class="form-control" id="bulan" name="bulan1" required
                                            oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                            oninput="setCustomValidity('')">
                                                <option selected hidden disabled value="">Sila Pilih
                                                    Bulan</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Mac</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Jun</option>
                                                <option value="7">Julai</option>
                                                <option value="8">Ogos</option>
                                                <option value="9">September</option>
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
                                <div class="mb-4"></div>

                                <hr>
                                <div class="col-12 mt-2 mb-2" style="background-color:lightgrey">
                                    <b>SEMENANJUNG MALAYSIA</b>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>CPO: </label>
                                        <div class="form-group">
                                            <input type="text" name='cpo' class="form-control"
                                                id="cpo_sm" value="0" readonly>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <label>PPO: </label>
                                        <div class="form-group">
                                            <input type="text" name='ppo' class="form-control"
                                                id="ppo_sm" value="0" readonly>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>CPKO: </label>
                                        <div class="form-group">
                                            <input type="text" name='cpko' class="form-control"
                                                id="cpko_sm" value="0" readonly>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <label>PPKO: </label>
                                        <div class="form-group">
                                            <input type="text" name='ppko' class="form-control"
                                                id="ppko_sm" value="0" readonly>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 mt-2 mb-2" style="background-color:lightgrey">
                                    <b>SABAH</b>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>CPO: </label>
                                        <div class="form-group">
                                            <input type="text" name='cpo' class="form-control"
                                                id="cpo_sbh" value="0" readonly>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <label>PPO: </label>
                                        <div class="form-group">
                                            <input type="text" name='ppo' class="form-control"
                                                id="ppo_sbh" value="0" readonly>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>CPKO: </label>
                                        <div class="form-group">
                                            <input type="text" name='cpko' class="form-control"
                                                id="cpko_sbh" value="0" readonly>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <label>PPKO: </label>
                                        <div class="form-group">
                                            <input type="text" name='ppko' class="form-control"
                                                id="ppko_sbh" value="0" readonly>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 mt-2 mb-2" style="background-color:lightgrey">
                                    <b>SARAWAK</b>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>CPO: </label>
                                        <div class="form-group">
                                            <input type="text" name='cpo' class="form-control"
                                                id="cpo_srwk" value="0" readonly>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <label>PPO: </label>
                                        <div class="form-group">
                                            <input type="text" name='ppo' class="form-control"
                                                id="ppo_srwk" value="0" readonly>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>CPKO: </label>
                                        <div class="form-group">
                                            <input type="text" name='cpko' class="form-control"
                                                id="cpko_srwk" value="0" readonly>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <label>PPKO: </label>
                                        <div class="form-group">
                                            <input type="text" name='ppko' class="form-control"
                                                id="ppko_srwk" value="0" readonly>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                            </button> --}}
                                    <button type="button" class="btn btn-primary ml-1"
                                        data-dismiss="modal" onclick="Copy()">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">COPY</span>
                                    </button>
                                </div>
                            </form>

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
            console.log(bulan);

            $.ajax({
                url: "{{ route('admin.tambah.stok.akhir.proses') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    tahun: tahun,
                    bulan: bulan,
                },
                success: function(response) {
                    console.log(JSON.stringify(response));
                    // $('#cpo_sm').val(response.success.cpo_sm ?? 0);
                    $('#cpo_sm').val(response.success.cposm ?? 0 );
                    $('#ppo_sm').val(response.success.pposm ?? 0 );
                    $('#cpko_sm').val(response.success.cpkosm ?? 0 );
                    $('#ppko_sm').val(response.success.ppkosm ?? 0);
                    $('#cpo_sbh').val(response.success.cposbh ?? 0 );
                    $('#ppo_sbh').val(response.success.pposbh ?? 0 );
                    $('#cpko_sbh').val(response.success.cpkosbh ?? 0 );
                    $('#ppko_sbh').val(response.success.ppkosbh ?? 0 );
                    $('#cpo_srwk').val(response.success.cposrwk ?? 0 );
                    $('#ppo_srwk').val(response.success.pposrwk ?? 0 );
                    $('#cpko_srwk').val(response.success.cpkosrwk ?? 0 );
                    $('#ppko_srwk').val(response.success.ppkosrwk ?? 0 );
                },
                // (total.toFixed(2)) );
                error: function(response) {
                    alert(JSON.stringify(response));
                },
            });
        });
    </script>

    <script>
        function Copy() {
            $('#tahun1').val($('#tahun').val());
            $('#bulan1').val($('#bulan').val());
            $('#cpo_sm_1').val($('#cpo_sm').val());
            $('#ppo_sm_1').val($('#ppo_sm').val());
            $('#cpko_sm_1').val($('#cpko_sm').val());
            $('#ppko_sm_1').val($('#ppko_sm').val());
            $('#cpo_sbh_1').val($('#cpo_sbh').val());
            $('#ppo_sbh_1').val($('#ppo_sbh').val());
            $('#cpko_sbh_1').val($('#cpko_sbh').val());
            $('#ppko_sbh_1').val($('#ppko_sbh').val());
            $('#cpo_srwk_1').val($('#cpo_srwk').val());
            $('#ppo_srwk_1').val($('#ppo_srwk').val());
            $('#cpko_srwk_1').val($('#cpko_srwk').val());
            $('#ppko_srwk_1').val($('#ppko_srwk').val());
            // console.log('masuk');
            // $('#ppo_sm').val(response.success.ppo_sm);
            // $('#cpko_sm').val(response.success.cpko_sm ?? 0);
            // $('#ppko_sm').val(response.success.ppko_sm);
        }
    </script>

<script>
    $('.sub-form').submit(function() {

        //add form
        var x = $('#cpo_sm_1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#cpo_sm_1').val(x);

        var x = $('#ppo_sm_1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#ppo_sm_1').val(x);

        var x = $('#cpko_sm_1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#cpko_sm_1').val(x);


        var x = $('#ppko_sm_1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#ppko_sm_1').val(x);

        var x = $('#cpo_sbh_1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#cpo_sbh_1').val(x);

        var x = $('#ppo_sbh_1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#ppo_sbh_1').val(x);

        var x = $('#cpko_sbh_1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#cpko_sbh_1').val(x);


        var x = $('#ppko_sbh_1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#ppko_sbh_1').val(x);

        var x = $('#cpo_srwk_1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#cpo_srwk_1').val(x);

        var x = $('#ppo_srwk_1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#ppo_srwk_1').val(x);

        var x = $('#cpko_srwk_1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#cpko_srwk_1').val(x);


        var x = $('#ppko_srwk_1').val();
        x = x.replace(/,/g, '');
        x = parseFloat(x, 10);
        $('#ppko_srwk_1').val(x);




        return true;

    });
</script>
@endsection
