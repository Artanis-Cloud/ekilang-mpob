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
                <div class="col-12 align-self-center">
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
                <div class="col-7 align-self-center" id="breadcrumb">
                    <div class="d-flex align-items-center justify-content-end">

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
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i
                                        class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-1%; margin-bottom:1%">Porting Stok Akhir
                            </h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Proses ini akan memindahkan data ini ke
                                dalam PLEID.</h5>
                        </div>
                        <hr>

                        <div class="card-body">
                            <form action="{{ route('porting.stokakhir') }}" method="get" class="sub-form">
                                @csrf
                                @foreach ($stokakhirs as $stokakhir)
                                {{-- {{ dd($stokakhir) }} --}}

                                <div class="container center">
                                    {{-- @if ($errors->any())
                                        {{ implode('', $errors->all('<div>:message</div>')) }}
                                        @endif --}}
                                    {{-- {{ dd($stokakhir->tahun) }} --}}
                                    <div class="row ml-auto" style="margin-top:-1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label  align-items-center">Tahun
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="tahun" id="tahun1" required
                                                oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                oninput="setCustomValidity('')">
                                                <option selected value="{{ $stokakhir->tahun }}">{{ $stokakhir->tahun }}</option>
                                                {{-- <option selected hidden disabled value="{{ $stokakhir->tahun }}">{{ $stokakhir->tahun }}
                                                </option> --}}

                                                {{-- @for ($i = 2011; $i <= date('Y'); $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor --}}


                                            </select>

                                        </div>
                                    </div>
                                    <div class="row mt-2 ml-auto">
                                        <label
                                            class="text-right col-sm-4 control-label col-form-label  align-items-center">Bulan
                                        </label>
                                        <div class="col-md-4">

                                            <select class="form-control" name="bulan" id="bulan1" >
                                                @if ($stokakhir->bulan == '01')
                                                    <option {{ $stokakhir->bulan == '01' ? 'selected' : '' }}
                                                        value="1">
                                                        JANUARI</option>
                                                @elseif ($stokakhir->bulan == '02')
                                                    <option {{ $stokakhir->bulan == '02' ? 'selected' : '' }}
                                                        value="02">
                                                        FEBRUARI</option>

                                                    {{-- <option selected hidden disabled value="02">FEBRUARI</option> --}}
                                                @elseif ($stokakhir->bulan == '03')
                                                    <option {{ $stokakhir->bulan == '03' ? 'selected' : '' }}
                                                        value="03">MAC
                                                    </option>

                                                    {{-- <option selected hidden disabled value="03">MAC</option> --}}
                                                @elseif ($stokakhir->bulan == '04')
                                                    <option {{ $stokakhir->bulan == '04' ? 'selected' : '' }}
                                                        value="01">APRIL
                                                    </option>

                                                    {{-- <option selected hidden disabled value="04">APRIL</option> --}}
                                                @elseif ($stokakhir->bulan == '05')
                                                    <option {{ $stokakhir->bulan == '05' ? 'selected' : '' }}
                                                        value="05">MEI
                                                    </option>

                                                    {{-- <option selected hidden disabled value="05">MEI</option> --}}
                                                @elseif ($stokakhir->bulan == '06')
                                                    <option {{ $stokakhir->bulan == '06' ? 'selected' : '' }}
                                                        value="06">JUN
                                                    </option>

                                                    {{-- <option selected hidden disabled value="06">JUN</option> --}}
                                                @elseif ($stokakhir->bulan == '07')
                                                    <option {{ $stokakhir->bulan == '07' ? 'selected' : '' }}
                                                        value="07">JULAI
                                                    </option>

                                                    {{-- <option selected hidden disabled value="07">JULAI</option> --}}
                                                @elseif ($stokakhir->bulan == '08')
                                                    <option {{ $stokakhir->bulan == '08' ? 'selected' : '' }}
                                                        value="08">OGOS
                                                    </option>

                                                    {{-- <option selected hidden disabled value="08">OGOS</option> --}}
                                                @elseif ($stokakhir->bulan == '09')
                                                    <option {{ $stokakhir->bulan == '09' ? 'selected' : '' }}
                                                        value="9">
                                                        SEPTEMBER</option>

                                                    {{-- <option selected hidden disabled value="09">SEPTEMBER</option> --}}
                                                @elseif ($stokakhir->bulan == '10')
                                                    <option {{ $stokakhir->bulan == '10' ? 'selected' : '' }}
                                                        value="10">
                                                        OKTOBER</option>

                                                    {{-- <option selected hidden disabled value="10">OKTOBER</option> --}}
                                                @elseif ($stokakhir->bulan == '11')
                                                    <option {{ $stokakhir->bulan == '11' ? 'selected' : '' }}
                                                        value="11">
                                                        NOVEMBER</option>

                                                    {{-- <option selected hidden disabled value="11">NOVEMBER</option> --}}
                                                @elseif ($stokakhir->bulan == '12')
                                                    <option {{ $stokakhir->bulan == '12' ? 'selected' : '' }}
                                                        value="12">
                                                        DISEMBER</option>

                                                    {{-- <option selected hidden disabled value="12">DISEMBER</option> --}}
                                                @endif

                                            </select>

                                        </div>
                                    </div>
                                    {{-- <div class="col-12 mb-4 mt-4" style="margin-left:44%">

                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#stock">Get Stock</button>
                                    {{-- </div> --}}
                                    {{-- </div>  --}}
                                    <hr>
                                    <br>
                                    <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Semenanjung
                                            Malaysia</b>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-5 ml-auto">
                                            <label class="control-label">CPO</label>
                                            <input type="text" id="cpo_sm" name="cpo_sm"
                                                value="{{ number_format($stokakhir->cpo_sm ?? 0, 2) }}"
                                                class="form-control form-control-danger" placeholder="0.00">
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-5 mr-auto">
                                            <div class="form-group has-danger">
                                                <label class="control-label">PPO</label>
                                                <input type="text" id="ppo_sm" name="ppo_sm"
                                                    value="{{ number_format($stokakhir->ppo_sm ?? 0, 2) }}"
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
                                                <input type="text" id="cpko_sm" name="cpko_sm" class="form-control"
                                                    placeholder="0.00"
                                                    value="{{ number_format($stokakhir->cpko_sm ?? 0, 2) }}">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-5 mr-auto">
                                            <div class="form-group has-danger">
                                                <label class="control-label">PPKO</label>
                                                <input type="text" id="ppko_sm" name="ppko_sm"
                                                    value="{{ number_format($stokakhir->ppko_sm ?? 0, 2) }}"
                                                    class="form-control form-control-danger" placeholder="0.00">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <br>
                                    <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Sabah</b></div>
                                    <div class="row p-t-20">
                                        <div class="col-md-5 ml-auto">
                                            <label class="control-label">CPO</label>
                                            <input type="text" id="cpo_sbh" name="cpo_sbh"
                                                value="{{ number_format($stokakhir->cpo_sbh ?? 0, 2) }}"
                                                class="form-control form-control-danger" placeholder="0.00">
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-5 mr-auto">
                                            <div class="form-group has-danger">
                                                <label class="control-label">PPO</label>
                                                <input type="text" id="ppo_sbh" name="ppo_sbh"
                                                    value="{{ number_format($stokakhir->ppo_sbh ?? 0, 2) }}"
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
                                                <input type="text" id="cpko_sbh" name="cpko_sbh"
                                                    class="form-control" placeholder="0.00"
                                                    value="{{ number_format($stokakhir->cpko_sbh ?? 0, 2) }}">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-5 mr-auto">
                                            <div class="form-group has-danger">
                                                <label class="control-label">PPKO</label>
                                                <input type="text" id="ppko_sbh" name="ppko_sbh"
                                                    value="{{ number_format($stokakhir->ppko_sbh ?? 0, 2) }}"
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
                                            <input type="text" id="cpo_srwk"
                                                value="{{ number_format($stokakhir->cpo_srwk ?? 0, 2) }}"
                                                class="form-control form-control-danger" placeholder="0.00"
                                                name="cpo_srwk">
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-5 mr-auto">
                                            <div class="form-group has-danger">
                                                <label class="control-label">PPO</label>
                                                <input type="text" id="ppo_srwk"
                                                    value="{{ number_format($stokakhir->ppo_srwk ?? 0, 2) }}"
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
                                                <input type="text" id="cpko_srwk" class="form-control"
                                                    placeholder="0.00" name="cpko_srwk"
                                                    value="{{ number_format($stokakhir->cpko_srwk ?? 0, 2) }}">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-5 mr-auto">
                                            <div class="form-group has-danger">
                                                <label class="control-label">PPKO</label>
                                                <input type="text" id="ppko_srwk" name="ppko_srwk"
                                                    value="{{ number_format($stokakhir->ppko_srwk ?? 0, 2) }}"
                                                    class="form-control form-control-danger" placeholder="0.00">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    @endforeach

                                </div>


                                {{-- </div> --}}



                                <div class="col-12 mb-4 mt-4">
                                    {{-- <div class="text-left"> --}}
                                    {{-- <a href="{{ route('admin.stok.akhir') }}" type="button" class="btn btn-primary">Port</a> --}}
                                    {{-- </div> --}}
                                    {{-- <div class="text-right ml-auto"> --}}

                                    <button type="submit" style="display: block; margin:auto"
                                        class="btn btn-primary">Port</button>
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
                url: "{{ route('admin.tambah.stok.akhir.proses') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    tahun: tahun,
                    bulan: bulan,
                },
                success: function(response) {
                    console.log(JSON.stringify(response));
                    $('#cpo_sm').val(response.success.cpo_sm ?? 0);
                    $('#ppo_sm').val(response.success.ppo_sm ?? 0);
                    $('#cpko_sm').val(response.success.cpko_sm ?? 0);
                    $('#ppko_sm').val(response.success.ppko_sm ?? 0);
                    $('#cpo_sbh').val(response.success.cpo_sbh ?? 0);
                    $('#ppo_sbh').val(response.success.ppo_sbh ?? 0);
                    $('#cpko_sbh').val(response.success.cpko_sbh ?? 0);
                    $('#ppko_sbh').val(response.success.ppko_sbh ?? 0);
                    $('#cpo_srwk').val(response.success.cpo_srwk ?? 0);
                    $('#ppo_srwk').val(response.success.ppo_srwk ?? 0);
                    $('#cpko_srwk').val(response.success.cpko_srwk ?? 0);
                    $('#ppko_srwk').val(response.success.ppko_srwk ?? 0);
                },
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

            var x = $('#cpo_sm').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#cpo_sm').val(x);

            var x = $('#ppo_sm').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#ppo_sm').val(x);

            var x = $('#cpko_sm').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#cpko_sm').val(x);

            var x = $('#ppko_sm').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#ppko_sm').val(x);

            var x = $('#cpo_sbh').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#cpo_sbh').val(x);

            var x = $('#ppo_sbh').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#ppo_sbh').val(x);

            var x = $('#cpko_sbh').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#cpko_sbh').val(x);

            var x = $('#ppko_sbh').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#ppko_sbh').val(x);

            var x = $('#cpo_srwk').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#cpo_srwk').val(x);

            var x = $('#ppo_srwk').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#ppo_srwk').val(x);

            var x = $('#cpko_srwk').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#cpko_srwk').val(x);

            var x = $('#ppko_srwk').val();
            x = x.replace(/,/g, '');
            x = parseFloat(x, 10);
            $('#ppko_srwk').val(x);




            return true;

        });
    </script>
@endsection
