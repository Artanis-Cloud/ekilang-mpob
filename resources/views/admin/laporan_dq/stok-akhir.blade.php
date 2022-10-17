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
                            <h3 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Stok Akhir
                            </h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Stok Akhir</h5> --}}
                        </div>
                        <hr>

                        <div class="text-left col-md-7 mx-3">


                            <a href="{{ route('admin.tambah.stok.akhir') }}" class="btn btn-primary" style="float: left">
                                Tambah Stok Akhir</a>
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
                                                        <th>CPO SM</th>
                                                        <th>PPO SM</th>
                                                        <th>CPKO SM</th>
                                                        <th>PPKO SM</th>
                                                        <th>CPO SBH</th>
                                                        <th>PPO SBH</th>
                                                        <th>CPKO SBH</th>
                                                        <th>PPKO SBH</th>
                                                        <th>CPO SRWK</th>
                                                        <th>PPO SRWK</th>
                                                        <th>CPKO SRWK</th>
                                                        <th>PPKO SRWK</th>
                                                        <th>Kemaskini</th>
                                                        <th>Padam</th>
                                                        <th>Port</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($stok_akhir as $key => $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data->tahun }}</td>
                                                            @if ($data->bulan == 1)
                                                                <td>Januari</td>
                                                            @elseif ($data->bulan == 2)
                                                                <td>Februari</td>
                                                            @elseif ($data->bulan == 3)
                                                                <td>Mac</td>
                                                            @elseif ($data->bulan == 4)
                                                                <td>April</td>
                                                            @elseif ($data->bulan == 5)
                                                                <td>Mei</td>
                                                            @elseif ($data->bulan == 6)
                                                                <td>Jun</td>
                                                            @elseif ($data->bulan == 7)
                                                                <td>Julai</td>
                                                            @elseif ($data->bulan == 8)
                                                                <td>Ogos</td>
                                                            @elseif ($data->bulan == 9)
                                                                <td>September</td>
                                                            @elseif ($data->bulan == 10)
                                                                <td>Oktober</td>
                                                            @elseif ($data->bulan == 11)
                                                                <td>November</td>
                                                            @elseif ($data->bulan == 12)
                                                                <td>Disember</td>
                                                            @endif
                                                            <td style="text-align: right">{{ number_format($data->cpo_sm ?? 0, 2) }}</td>
                                                            <td style="text-align: right">{{ number_format($data->ppo_sm ?? 0, 2) }}</td>
                                                            <td style="text-align: right">{{ number_format($data->cpko_sm ?? 0, 2) }}</td>
                                                            <td style="text-align: right">{{ number_format($data->ppko_sm ?? 0, 2) }}</td>
                                                            <td style="text-align: right">{{ number_format($data->cpo_sbh ?? 0, 2) }}</td>
                                                            <td style="text-align: right">{{ number_format($data->ppo_sbh ?? 0, 2) }}</td>
                                                            <td style="text-align: right">{{ number_format($data->cpko_sbh ?? 0, 2) }}</td>
                                                            <td style="text-align: right">{{ number_format($data->ppko_sbh ?? 0, 2) }}</td>
                                                            <td style="text-align: right">{{ number_format($data->cpo_srwk ?? 0, 2) }}</td>
                                                            <td style="text-align: right">{{ number_format($data->ppo_srwk ?? 0, 2) }}</td>
                                                            <td style="text-align: right">{{ number_format($data->cpko_srwk ?? 0, 2) }}</td>
                                                            <td style="text-align: right">{{ number_format($data->ppko_srwk ?? 0, 2) }}</td>
                                                            <td>
                                                                <div class="icon" style="text-align: center">
                                                                    <a href="#" type="button" data-toggle="modal"
                                                                        data-target="#edit{{ $key }}">
                                                                        <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                                        </i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="icon" style="text-align: center">
                                                                    <a href="#" type="button" data-toggle="modal"
                                                                        data-target="#next2{{ $data->id }}">
                                                                        <i class="fa fa-trash"
                                                                            style="color: #dc3545;font-size:18px"></i>

                                                                    </a>


                                                                </div>

                                                            </td>
                                                            <td>
                                                                <div class="icon" style="text-align: center">
                                                                    <a href="#" type="button" data-toggle="modal"
                                                                        data-target="#exampleModalCenter2">
                                                                        <i class="fas fa-arrow-circle-up"
                                                                            style="color: #31bc6d;font-size:18px"></i>

                                                                    </a>


                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade" id="next2{{ $data->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalCenterTitle">
                                                                            PENGESAHAN</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
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
                                                                        <a href="{{ route('admin.delete.stok.akhir', [$data->id]) }}"
                                                                            type="button" class="btn btn-light-secondary"
                                                                            style="color: #275047; background-color: #a1929238">

                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Ya</span>
                                                                        </a>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <!--scrolling content Modal -->
                                                    @foreach ($stok_akhir as $key => $data)
                                                        <div class="modal fade" id="edit{{ $key }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalScrollableTitle">
                                                                            Kemaskini Maklumat Produk</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <i data-feather="x"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ route('admin.edit.stok.akhir', [$data->id]) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                <label class="required">Tahun</label>
                                                                                <div class="form-group">
                                                                                    <input type="text" name='tahun'
                                                                                        class="form-control"
                                                                                        id="cpo_sm"
                                                                                        value="{{ old('tahun') ?? $data->tahun }}"
                                                                                        readonly>
                                                                                    {{-- <fieldset class="form-group">
                                                                            <select class="form-control" id="tahun" name="tahun1" required
                                                                            oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                                            oninput="setCustomValidity('')">
                                                                                <option selected hidden disabled value="">Sila Pilih
                                                                                    Tahun</option>
                                                                                @for ($i = 2011; $i <= date('Y'); $i++)
                                                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                                                @endfor

                                                                            </select>
                                                                        </fieldset> --}}

                                                                                </div>
                                                                                <label class="required">Bulan </label>
                                                                                <div class="form-group">
                                                                                    <select class="form-control"
                                                                                        id="bulan" name="bulan">
                                                                                        <option selected hidden disabled
                                                                                            value="">Sila Pilih Bulan
                                                                                        </option>
                                                                                        <option
                                                                                            {{ $data->bulan == '01' ? 'selected' : '' }}
                                                                                            value="01">Januari</option>
                                                                                        <option
                                                                                            {{ $data->bulan == '02' ? 'selected' : '' }}
                                                                                            value="02">Februari
                                                                                        </option>
                                                                                        <option
                                                                                            {{ $data->bulan == '03' ? 'selected' : '' }}
                                                                                            value="03">Mac</option>
                                                                                        <option
                                                                                            {{ $data->bulan == '04' ? 'selected' : '' }}
                                                                                            value="04">April</option>
                                                                                        <option
                                                                                            {{ $data->bulan == '05' ? 'selected' : '' }}
                                                                                            value="05">Mei</option>
                                                                                        <option
                                                                                            {{ $data->bulan == '06' ? 'selected' : '' }}
                                                                                            value="06">Jun</option>
                                                                                        <option
                                                                                            {{ $data->bulan == '07' ? 'selected' : '' }}
                                                                                            value="07">Julai</option>
                                                                                        <option
                                                                                            {{ $data->bulan == '08' ? 'selected' : '' }}
                                                                                            value="08">Ogos</option>
                                                                                        <option
                                                                                            {{ $data->bulan == '09' ? 'selected' : '' }}
                                                                                            value="09">September
                                                                                        </option>
                                                                                        <option
                                                                                            {{ $data->bulan == '10' ? 'selected' : '' }}
                                                                                            value="10">Oktober</option>
                                                                                        <option
                                                                                            {{ $data->bulan == '11' ? 'selected' : '' }}
                                                                                            value="11">November
                                                                                        </option>
                                                                                        <option
                                                                                            {{ $data->bulan == '12' ? 'selected' : '' }}
                                                                                            value="12">Disember
                                                                                        </option>
                                                                                    </select>
                                                                                    </fieldset>

                                                                                    {{-- <fieldset class="form-group">
                                                                            <select class="form-control" id="bulan" name="bulan1" required
                                                                            oninvalid="setCustomValidity('Sila buat pilihan di bahagian ini')"
                                                                            oninput="setCustomValidity('')">
                                                                                <option selected hidden disabled value="">Sila Pilih
                                                                                    Bulan</option>
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
                                                                        </fieldset> --}}

                                                                                </div>

                                                                            </div>
                                                                            <div class="mb-4"></div>

                                                                            <hr>
                                                                            <div class="col-12 mt-2 mb-2"
                                                                                style="background-color:lightgrey">
                                                                                <b>SEMENANJUNG MALAYSIA</b>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label>CPO: </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name='cpo_sm'
                                                                                            class="form-control"
                                                                                            id="cpo_sm"
                                                                                            value="{{ old('cpo_sm') ?? $data->cpo_sm }}">
                                                                                    </div>

                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <label>PPO: </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name='ppo_sm'
                                                                                            class="form-control"
                                                                                            id="ppo_sm"
                                                                                            value="{{ old('ppo_sm') ?? $data->ppo_sm }}">
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label>CPKO: </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name='cpko_sm'
                                                                                            class="form-control"
                                                                                            id="cpko_sm"
                                                                                            value="{{ old('cpko_sm') ?? $data->cpko_sm }}">
                                                                                    </div>

                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <label>PPKO: </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name='ppko_sm'
                                                                                            class="form-control"
                                                                                            id="ppko_sm"
                                                                                            value="{{ old('ppko_sm') ?? $data->ppko_sm }}">
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 mt-2 mb-2"
                                                                                style="background-color:lightgrey">
                                                                                <b>SABAH</b>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label>CPO: </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name='cpo_sbh'
                                                                                            class="form-control"
                                                                                            id="cpo_sbh"
                                                                                            value="{{ old('cpo_sbh') ?? $data->cpo_sbh }}">
                                                                                    </div>

                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <label>PPO: </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name='ppo_sbh'
                                                                                            class="form-control"
                                                                                            id="ppo_sbh"
                                                                                            value="{{ old('ppo_sbh') ?? $data->ppo_sbh }}">
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label>CPKO: </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name='cpko_sbh'
                                                                                            class="form-control"
                                                                                            id="cpko_sbh"
                                                                                            value="{{ old('cpko_sbh') ?? $data->cpko_sbh }}">
                                                                                    </div>

                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <label>PPKO: </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name='ppko_sbh'
                                                                                            class="form-control"
                                                                                            id="ppko_sbh"
                                                                                            value="{{ old('ppko_sbh') ?? $data->ppko_sbh }}">
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 mt-2 mb-2"
                                                                                style="background-color:lightgrey">
                                                                                <b>SARAWAK</b>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label>CPO: </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name='cpo_srwk'
                                                                                            class="form-control"
                                                                                            id="cpo_srwk"
                                                                                            value="{{ old('cpo_srwk') ?? $data->cpo_srwk }}">
                                                                                    </div>

                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <label>PPO: </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name='ppo_srwk'
                                                                                            class="form-control"
                                                                                            id="ppo_srwk"
                                                                                            value="{{ old('ppo_srwk') ?? $data->ppo_srwk }}">
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label>CPKO: </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name='cpko_srwk'
                                                                                            class="form-control"
                                                                                            id="cpko_srwk"
                                                                                            value="{{ old('cpko_srwk') ?? $data->cpko_srwk }}">
                                                                                    </div>

                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <label>PPKO: </label>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name='ppko_srwk'
                                                                                            class="form-control"
                                                                                            id="ppko_srwk"
                                                                                            value="{{ old('ppko_srwk') ?? $data->ppko_srwk }}">
                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-light-secondary"
                                                                            data-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Batal</span>
                                                                        </button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary ml-1">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span
                                                                                class="d-none d-sm-block">Kemaskini</span>
                                                                        </button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </tbody>

                                            </table>
                                            @endforeach

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

{{-- @section('scripts')
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
@endsection --}}
