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
                    <h4 class="page-title">Pengurusan Pentadbir</h4>
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
                            <h4 style="color: rgb(39, 80, 71); margin-top:3%">Daftar Akaun Pentadbir</h4>
                        </div>
                        <hr>
                        <form action="{{ route('admin.pengurusan.pentadbir.process') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="container center ">

                                    <div class="row" style="margin-top: 1% ">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                            Nama</label>
                                        <div class="col-md-6">
                                            <input type="text" id="name" class="form-control" placeholder="Nama"
                                                name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 1% ">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                            Emel</label>
                                        <div class="col-md-6">
                                            <input type="text" id="email" class="form-control" placeholder="Emel"
                                                name="email" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row" style="margin-top: 1% ">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                            <i>Username</i></label>
                                        <div class="col-md-6">
                                            <input type="text" id="username" class="form-control" placeholder="Username"
                                                name="username" value="{{ old('username') }}">
                                            @error('username')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 1% ">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                            Kategori</label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="role"
                                                    value={{ old('category') }}>
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Kerani">Kerani</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Superadmin">Superadmin</option>
                                                    <option value="Supervisor">Supervisor</option>
                                                </select>
                                            </fieldset>
                                            @error('category')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>





                                    <div class="row center mt-3">
                                        <div class="col-md-12 center mb-3">
                                            <button type="button" class="btn btn-primary center" style="margin-left:45%"
                                                data-toggle="modal" data-target="#myModal">Daftar</button>
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
                                                        Anda pasti mahu mendaftarkan pentadbir ini?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-dismiss="modal">
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

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>




    </div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection
