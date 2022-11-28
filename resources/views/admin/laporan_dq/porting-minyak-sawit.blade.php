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
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i
                                        class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71); margin-top:-1%; margin-bottom:1%">Porting Minyak Sawit Diproses
                            </h3>
                            <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Proses ini akan memindahkan data ini ke
                                dalam SYBASE</h5>
                        </div>
                        <hr>

                        <div class="card-body">
                            <form action="{{ route('porting.minyaksawit') }}" method="post" class="sub-form">
                                @csrf
                                @foreach ($minyaksawits as $minyaksawit)
                                {{ dd($minyaksawit) }}

                                <div class="container center">

                                    <div class="row ml-auto" style="margin-top:-1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label  align-items-center">Tahun
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="tahun" id="tahun1">
                                                <option value="{{ $minyaksawit->tahun }}">{{ $minyaksawit->tahun }}</option>
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
                                            <select class="form-control" name="bulan" id="bulan1">
                                                @if ($minyaksawit->bulan == '01')
                                                <option {{ $minyaksawit->bulan == '01' ? 'selected' : '' }}
                                                    value="01">
                                                    JANUARI</option>
                                            @elseif ($minyaksawit->bulan == '02')
                                                <option {{ $minyaksawit->bulan == '02' ? 'selected' : '' }}
                                                    value="02">
                                                    FEBRUARI</option>

                                                {{-- <option selected hidden disabled value="02">FEBRUARI</option> --}}
                                            @elseif ($minyaksawit->bulan == '03')
                                                <option {{ $minyaksawit->bulan == '03' ? 'selected' : '' }}
                                                    value="03">MAC
                                                </option>

                                                {{-- <option selected hidden disabled value="03">MAC</option> --}}
                                            @elseif ($minyaksawit->bulan == '04')
                                                <option {{ $minyaksawit->bulan == '04' ? 'selected' : '' }}
                                                    value="01">APRIL
                                                </option>

                                                {{-- <option selected hidden disabled value="04">APRIL</option> --}}
                                            @elseif ($minyaksawit->bulan == '05')
                                                <option {{ $minyaksawit->bulan == '05' ? 'selected' : '' }}
                                                    value="05">MEI
                                                </option>

                                                {{-- <option selected hidden disabled value="05">MEI</option> --}}
                                            @elseif ($minyaksawit->bulan == '06')
                                                <option {{ $minyaksawit->bulan == '06' ? 'selected' : '' }}
                                                    value="06">JUN
                                                </option>

                                                {{-- <option selected hidden disabled value="06">JUN</option> --}}
                                            @elseif ($minyaksawit->bulan == '07')
                                                <option {{ $minyaksawit->bulan == '07' ? 'selected' : '' }}
                                                    value="07">JULAI
                                                </option>

                                                {{-- <option selected hidden disabled value="07">JULAI</option> --}}
                                            @elseif ($minyaksawit->bulan == '08')
                                                <option {{ $minyaksawit->bulan == '08' ? 'selected' : '' }}
                                                    value="08">OGOS
                                                </option>

                                                {{-- <option selected hidden disabled value="08">OGOS</option> --}}
                                            @elseif ($minyaksawit->bulan == '09')
                                                <option {{ $minyaksawit->bulan == '09' ? 'selected' : '' }}
                                                    value="09">
                                                    SEPTEMBER</option>

                                                {{-- <option selected hidden disabled value="09">SEPTEMBER</option> --}}
                                            @elseif ($minyaksawit->bulan == '10')
                                                <option {{ $minyaksawit->bulan == '10' ? 'selected' : '' }}
                                                    value="10">
                                                    OKTOBER</option>

                                                {{-- <option selected hidden disabled value="10">OKTOBER</option> --}}
                                            @elseif ($minyaksawit->bulan == '11')
                                                <option {{ $minyaksawit->bulan == '11' ? 'selected' : '' }}
                                                    value="11">
                                                    NOVEMBER</option>

                                                {{-- <option selected hidden disabled value="11">NOVEMBER</option> --}}
                                            @elseif ($minyaksawit->bulan == '12')
                                                <option {{ $minyaksawit->bulan == '12' ? 'selected' : '' }}
                                                    value="12">
                                                    DISEMBER</option>

                                                {{-- <option selected hidden disabled value="12">DISEMBER</option> --}}
                                            @endif


                                                {{-- <option selected hidden disabled>Sila Pilih Bulan</option> --}}
                                            </select>

                                        </div>
                                    </div>
                                    {{-- <div class="col-12 mb-4 mt-4" style="margin-left:44%">

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#next2">Get Proses</button>
                                    </div> --}}
                                    <hr>
                                    <br>
                                    <div class="col-12 mt-2 mb-2" style="background-color:lightgrey"><b>Malaysia</b></div>
                                    <div class="row p-t-20">
                                        <div class="col-md-5 ml-auto">
                                            <label class="control-label">CPO</label>
                                            <input type="text" id="cpo1" name="cpo_msia" value="{{ number_format($minyaksawit->cpo_msia ?? 0,2) }}"
                                                class="form-control form-control-danger" placeholder="0.00">
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-5 mr-auto">
                                            <div class="form-group has-danger">
                                                <label class="control-label">PPO</label>
                                                <input type="text" id="ppo1" name="ppo_msia" value="{{ number_format($minyaksawit->ppo_msia ?? 0,2) }}"
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
                                                    placeholder="0.00" value="{{ number_format($minyaksawit->cpko_msia ?? 0,2) }}">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-5 mr-auto">
                                            <div class="form-group has-danger">
                                                <label class="control-label">PPKO</label>
                                                <input type="text" id="ppko1" name="ppko_msia" value="{{ number_format($minyaksawit->ppko_msia ?? 0,2) }}"
                                                    class="form-control form-control-danger" placeholder="0.00">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <br>
@endforeach



                                </div>
                                <div class="col-12 mb-4 mt-4" >
                                    {{-- <div class="text-left"> --}}
                                    {{-- <a href="{{ route('admin.stok.akhir') }}" type="button" class="btn btn-primary">Port</a> --}}
                                    {{-- </div> --}}
                                    {{-- <div class="text-right ml-auto"> --}}

                                    <button type="submit" style="display: block; margin:auto" class="btn btn-primary">Port</button>
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
