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
                    <h4 class="page-title">Maklumat Pentadbir</h4>
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
                            <h4 style="color: rgb(39, 80, 71); margin-top:3%">Maklumat Akaun Pentadbir</h4>
                        </div>
                        <hr>
                        <form action="{{ route('admin.akaun.pentadbir.process') }}" method="post">
                            @csrf
                        <div class="card-body">
                            <div class="container center" style="margin-top: -1%">


                                <div class="row">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                        Nama</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" placeholder="Nama" name="name"
                                            value="{{ auth()->user()->name }}">
                                        {{-- @error('nombor_siri')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                        Alamat Emel</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email" class="form-control" placeholder="Alamat Emel"
                                            name="email" value="{{ auth()->user()->email }}">
                                        {{-- @error('nombor_siri')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                </div>


                                <div class="row" style="margin-top: 1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                        Username</label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" class="form-control" placeholder="Username"
                                            name="username" value="{{ auth()->user()->username }}">
                                        {{-- @error('nombor_siri')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                        Kategori</label>
                                    <div class="col-md-6">
                                        <input type="text" id="role" class="form-control" placeholder="Kategori"
                                            name="role" value="{{ auth()->user()->role }}" readonly>


                                        {{-- <fieldset class="form-group">
                                            <select class="form-control" name="role" readonly>
                                                <option {{ auth()->user()->role == 'Admin' ? 'selected' : '' }}>Admin
                                                </option>
                                                <option {{ auth()->user()->role == 'Kerani' ? 'selected' : '' }}>Kerani
                                                </option>
                                                <option {{ auth()->user()->role == 'Manager' ? 'selected' : '' }}>
                                                    Manager</option>
                                                <option {{ auth()->user()->role == 'Superadmin' ? 'selected' : '' }}>
                                                    Superadmin</option>
                                                <option {{ auth()->user()->role == 'Supervisor' ? 'selected' : '' }}>
                                                    Supervisor</option>
                                            </select>
                                        </fieldset> --}}

                                    </div>
                                </div>
                                {{-- {{ $selected = explode(",", auth()->user()->sub_cat); }}

                                <select  name="sub_cat[]" multiple="multiple">
                                   @foreach($sub as $supplier)
                                     <option value="{{ $supplier->id }}" {{ (in_array($supplier->id, $selected)) ? 'selected' : '' }}>{{ $supplier->name}}</option>
                                   @endforeach
                                </select> --}}
                                    <div class="row">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Sub
                                            Kategori</label>
                                        <div class="col-md-6">

                                            <select multiple="multiple" size="10" class="duallistbox-no-filter" name="sub_cat[]">
                                                <option value="PL91">Kilang Buah</option>
                                                <option value="PL101">Kilang Penapis</option>
                                                <option value="PL102">Kilang Isirung</option>
                                                <option value="PL104">Kilang Oleokimia</option>
                                                <option value="PL111">Pusat Simpanan</option>
                                                <option value="PLBIO">Kilang Biodiesel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Status</label>
                                        <div class="col-md-6">

                                            <select class="form-control" name="status">
                                                <option selected hidden disabled value="">Sila Pilih Status</option>
                                                <option value="1">Aktif</option>
                                                <option value="2">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group mt-2" style="padding-top: 10px; ">
                                        <div class="text-right col-md-12 center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#myModal">Kemaskini</button>
                                            {{-- <button type="submit">YA</button> --}}
                                        </div>
                                    </div>

                                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">PENGESAHAN</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Anda pasti mahu mengemaskini maklumat ini?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Ya</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
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
            });
        });
    </script>
@endsection
