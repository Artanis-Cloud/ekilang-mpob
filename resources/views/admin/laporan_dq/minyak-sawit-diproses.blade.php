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
                    <div class="card"><br>
                        <div class=" text-center">
                            {{-- <h2 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Hebahan 10hb - Biodiesel diproses</h2> --}}
                            <h3 style="color: rgb(39, 80, 71); margin-top:1%; margin-bottom:1%">
                                Minyak Sawit Diproses
                            </h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Stok Akhir</h5> --}}
                        </div>
                        <hr>

                            <div class="text-left col-md-7 mx-3">


                                <a href="{{ route('admin.tambah.proses') }}" class="btn btn-primary"
                                    style="float: left"> Tambah Proses</a>
                            </div>
                            <div class="row">
                                <div class="col-12 mr-auto ml-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="zero_config" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Bil.</th>
                                                            <th>Tahun</th>
                                                            <th>Bulan</th>
                                                            <th>CPO MSIA</th>
                                                            <th>PPO MSIA</th>
                                                            <th>CPKO MSIA</th>
                                                            <th>PPKO MSIA</th>
                                                            <th>Kemaskini</th>
                                                            <th>Padam</th>
                                                            <th>Port</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @foreach ($hebahan as $data)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $data->tahun }}</td>
                                                                <td>{{ $data->bulan }}</td>
                                                                <td>{{ $data->cpo_msia }}</td>
                                                                <td>{{ $data->ppo_msia }}</td>
                                                                <td>{{ $data->cpko_msia }}</td>
                                                                <td>{{ $data->ppko_msia }}</td>
                                                                <td>
                                                                    <div class="icon" style="text-align: center">
                                                                        <a href="#" type="button" data-toggle="modal"
                                                                            data-target="#modal{{ $data->id }}">
                                                                            <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                                            </i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="icon" style="text-align: center">
                                                                        <a href="#" type="button" data-toggle="modal"
                                                                        data-target="#next2{{ $data->id }}">
                                                                            <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>

                                                                        </a>


                                                                    </div>

                                                                </td>
                                                                <td> <div class="icon" style="text-align: center">
                                                                    <a href="#" type="button" data-toggle="modal"
                                                                        data-target="#exampleModalCenter2">
                                                                        <i class="fas fa-arrow-circle-up" style="color: #31bc6d;font-size:18px"></i>

                                                                    </a>


                                                                </div></td>
                                                            </tr>
                                                            <div class="col-md-6 col-12">

                                                                <!--scrolling content Modal -->
                                                                <div class="modal fade" id="modal{{ $data->id }}" tabindex="-1"
                                                                    role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                                    Kemaskini Biodiesel diproses </h5>
                                                                                <button type="button" class="close" data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <i data-feather="x"></i>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form
                                                                                    action="{{ route('admin.edit.minyak.sawit.diproses', [$data->id]) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    <div class="modal-body">
                                                                                        <label class="required">Tahun</label>
                                                                                        <div class="form-group">
                                                                                            <fieldset class="form-group">
                                                                                                <select class="form-control" id="tahun"
                                                                                                    name="tahun">
                                                                                                    <option hidden value="{{ $data->tahun }}">
                                                                                                        @for ($i = 2003; $i <= date('Y'); $i++)
                                                                                                        <option >{{ $i }}</option>
                                                                                                    @endfor

                                                                                                </select>
                                                                                            </fieldset>
                                                                                            {{-- <input type="text" name='e101_d3'
                                                                                                                        class="form-control"
                                                                                                                        value="{{ $data->kodsl[0]->catname }}"
                                                                                                                        readonly> --}}

                                                                                        </div>
                                                                                        <label class="required">Bulan </label>
                                                                                        <div class="form-group">
                                                                                            <fieldset class="form-group">
                                                                                                <select class="form-control" id="bulan"
                                                                                                    name="bulan">
                                                                                                        <option selected hidden disabled value="">Sila Pilih Bulan</option>
                                                                                                        <option {{ ($data->bulan == '01') ? 'selected' : '' }} value="01">Januari</option>
                                                                                                        <option {{ ($data->bulan == '02') ? 'selected' : '' }}  value="02">Februari</option>
                                                                                                        <option {{ ($data->bulan == '03') ? 'selected' : '' }}  value="03">Mac</option>
                                                                                                        <option {{ ($data->bulan == '04') ? 'selected' : '' }}  value="04">April</option>
                                                                                                        <option {{ ($data->bulan == '05') ? 'selected' : '' }}  value="05">Mei</option>
                                                                                                        <option {{ ($data->bulan == '06') ? 'selected' : '' }}  value="06">Jun</option>
                                                                                                        <option {{ ($data->bulan == '07') ? 'selected' : '' }}  value="07">Julai</option>
                                                                                                        <option {{ ($data->bulan == '08') ? 'selected' : '' }}  value="08">Ogos</option>
                                                                                                        <option {{ ($data->bulan == '09') ? 'selected' : '' }}  value="09">September</option>
                                                                                                        <option {{ ($data->bulan == '10') ? 'selected' : '' }}  value="10">Oktober</option>
                                                                                                        <option {{ ($data->bulan == '11') ? 'selected' : '' }}  value="11">November</option>
                                                                                                        <option {{ ($data->bulan == '12') ? 'selected' : '' }}  value="12">Disember</option>
                                                                                                </select>
                                                                                            </fieldset>

                                                                                        </div>
                                                                                        <label class="required">CPO MSIA</label>
                                                                                        <div class="form-group">
                                                                                            <input type="text" name='cpo_msia'
                                                                                                onkeypress="return isNumberKey(event)"
                                                                                                class="form-control" id='cpo_msia' oninput="validate_two_decimal(this)"
                                                                                                value="{{ old('cpo_msia') ?? $data->cpo_msia }}">
                                                                                        </div>
                                                                                        <label class="required">PPO MSIA</label>
                                                                                        <div class="form-group">
                                                                                            <input type="text" name='ppo_msia'
                                                                                                onkeypress="return isNumberKey(event)"
                                                                                                class="form-control" id='ppo_msia' oninput="validate_two_decimal(this)"
                                                                                                value="{{ old('ppo_msia') ?? $data->ppo_msia }}">
                                                                                        </div>
                                                                                        <label class="required">CPKO MSIA</label>
                                                                                        <div class="form-group">
                                                                                            <input type="text" name='cpko_msia'
                                                                                                onkeypress="return isNumberKey(event)"
                                                                                                class="form-control" id='cpko_msia' oninput="validate_two_decimal(this)"
                                                                                                value="{{ old('cpko_msia') ?? $data->cpko_msia }}">
                                                                                        </div>
                                                                                        <label class="required">PPKO MSIA</label>
                                                                                        <div class="form-group">
                                                                                            <input type="text" name='ppko_msia'
                                                                                                onkeypress="return isNumberKey(event)"
                                                                                                class="form-control" id='ppko_msia' oninput="validate_two_decimal(this)"
                                                                                                value="{{ old('ppko_msia') ?? $data->ppko_msia }}">
                                                                                        </div>
                                                                                    </div>


                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-light-secondary"
                                                                                    data-dismiss="modal">
                                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                                    <span class="d-none d-sm-block">Batal</span>
                                                                                </button>
                                                                                <button type="submit" class="btn btn-primary ml-1">
                                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                                    <span class="d-none d-sm-block">Kemaskini</span>
                                                                                </button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="modal fade" id="next2{{ $data->id }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                                PENGESAHAN</h5>
                                                                            <button type="button" class="close" data-dismiss="modal"
                                                                                aria-label="Close">
                                                                                <i data-feather="x"></i>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>
                                                                                Anda pasti mahu menghapus maklumat ini?
                                                                            </p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary ml-1"
                                                                                data-dismiss="modal">
                                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Tidak</span>
                                                                            </button>
                                                                            <a href="{{ route('admin.delete.minyak.sawit.diproses', [$data->id]) }}"
                                                                                type="button" class="btn btn-light-secondary" style="color: #275047; background-color: #a1929238">

                                                                                <i class="bx bx-x d-block d-sm-none" ></i>
                                                                                <span class="d-none d-sm-block" >Ya</span>
                                                                            </a>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </tbody>

                                                </table>
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
@endsection
