@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    @if (auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Manager' || auth()->user()->role == 'Supervisor')
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Konfigurasi</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                        @if (!$loop->last)
                                            <li class="breadcrumb-item">
                                                <a href="{{ $breadcrumb['link'] }}"
                                                    style="color: rgb(64, 69, 68) !important;"
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

                <div class="card" style="margin-right:2%; margin-left:2%">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        {{-- <div class="col-md-4 col-12"> --}}
                        <div class="pl-3">

                            <div class=" text-center">
                                {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                <h3 style="color: rgb(39, 80, 71); ">Pengurusan Pentadbir
                                </h3>
                                <h4 id="title" style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Pentadbir
                                </h4>
                                {{-- <p>Maklumat Kilang</p> --}}
                            </div>
                            <hr>
                            {{-- <section class="section"> --}}
                                <div>
                                    <a href="{{ route('admin.pengurusan.pentadbir') }}" class="btn btn-primary"
                                        style="float: left; margin-bottom: 2%"> Tambah Pentadbir Baru</a>
                                </div>

                                <div class="table-responsive" >
                                    <table id="exampleTadbir" class="table table-bordered" style="width: 100%;  ">
                                        <thead>
                                            <tr class="text-center" style="background-color: #e9ecefbd">
                                                {{-- <th>Bil.</th> --}}
                                                <th style="vertical-align:middle">Nama</th>
                                                <th style="vertical-align:middle">Username</th>
                                                <th style="vertical-align:middle">Alamat Emel</th>
                                                <th style="vertical-align:middle">Kategori</th>
                                                <th style="vertical-align:middle">Sub-Kategori</th>
                                                <th style="vertical-align:middle">Status</th>
                                                <th style="vertical-align:middle">Kemaskini</th>
                                                @if (auth()->user()->role == 'Superadmin')
                                                <th style="vertical-align:middle">Hapus</th>

                                                @endif

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="text-center" style="background-color: #e9ecefbd">
                                                {{-- <th>Bil.</th> --}}
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Alamat Emel</th>
                                                <th>Kategori</th>
                                                <th>Sub-Kategori</th>
                                                <th>Status</th>
                                                <th>Kemaskini</th>
                                                @if (auth()->user()->role == 'Superadmin')

                                                <th>Hapus</th>
                                                @endif
                                            </tr>
                                        </tfoot>
                                        <tbody style="word-break: break-word; font-size:12px">
                                            @foreach ($admin as $data)
                                                <tr class="text-left">
                                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                                    {{-- <td>
                                                                <a href="{{ route('admin.papar.maklumat', $data->e_id) }}"><u>
                                                                        {{ $data->e_nl }}</u></a>
                                                            </td> --}}
                                                    <td>{{ $data->name ?? '-' }}</td>
                                                    <td>{{ $data->username ?? '-' }}</td>
                                                    <td>{{ $data->email ?? '-' }}</td>
                                                    <td>{{ $data->role }}</td>
                                                    <td>
                                                        @if (is_array(json_decode($data->sub_cat)) || is_object(json_decode($data->sub_cat)))
                                                            @if ($data->sub_cat)
                                                                <ul>
                                                                    @forelse (json_decode($data->sub_cat) as $cat)
                                                                        <li>{{ $cat }}</li>
                                                                    @empty
                                                                        -
                                                                    @endforelse
                                                                </ul>
                                                            @else
                                                                -
                                                            @endif
                                                        @endif
                                                    </td>
                                                    @if ($data->status == '1')
                                                        <td>Aktif</td>
                                                    @elseif ($data->status == '2')
                                                        <td>Tidak Aktif</td>
                                                    @else
                                                    <td></td>
                                                    @endif

                                                    <td>
                                                        <div class="icon" style="text-align: center">
                                                            <a href="#" type="button" data-toggle="modal"
                                                                data-target="#modal{{ $data->id }}">
                                                                <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                @if (auth()->user()->role == 'Superadmin')

                                                    <td>
                                                        <div class="icon" style="text-align: center">
                                                            <a href="#" type="button" data-toggle="modal"
                                                                data-target="#next2{{ $data->id }}">
                                                                <i class="fas fa-trash"
                                                                    style="color: #dc3545;font-size:18px"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>


                                            @endforeach
                                        </tbody>

                                    </table>

                                    @foreach ( $admin as $data )
                                        <div class="col-md-6 col-12">

                                            <div class="modal fade" id="modal{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    @if (auth()->user()->role == 'Superadmin')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="exampleModalScrollableTitle">
                                                                    Kemaskini Maklumat Pentadbir</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">


                                                                <form
                                                                    action="{{ route('admin.edit.pentadbir', [$data->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <label>Nama </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='name'
                                                                                class="form-control"
                                                                                value="{{ $data->name }}">
                                                                        </div>
                                                                        <label>Emel </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='email'
                                                                                class="form-control"
                                                                                value="{{ old('email') ?? $data->email }}">
                                                                        </div>
                                                                        <label>Username </label>
                                                                        <div class="form-group">
                                                                            <input type="text" name='username'
                                                                                class="form-control"
                                                                                value="{{ $data->username }}">
                                                                        </div>
                                                                        <label>Kategori </label>
                                                                        <div class="form-group">
                                                                            <fieldset class="form-group">
                                                                                <select class="form-control"
                                                                                    name="role">
                                                                                    <option
                                                                                        {{ $data->role == 'Admin' ? 'selected' : '' }}>
                                                                                        Admin</option>
                                                                                    {{-- <option {{ ($data->role == 'Kerani') ? 'selected' : '' }}>Kerani</option> --}}
                                                                                    <option
                                                                                        {{ $data->role == 'Manager' ? 'selected' : '' }}>
                                                                                        Manager</option>
                                                                                    <option
                                                                                        {{ $data->role == 'Superadmin' ? 'selected' : '' }}>
                                                                                        Superadmin</option>
                                                                                    <option
                                                                                        {{ $data->role == 'Supervisor' ? 'selected' : '' }}>
                                                                                        Supervisor</option>
                                                                                        <option hidden disabled
                                                                                            {{ $data->role == '' ? 'selected' : '' }}
                                                                                            value="">
                                                                                            Sila Pilih Kategori
                                                                                        </option>
                                                                                </select>
                                                                            </fieldset>
                                                                        </div>
                                                                        <label>Sub-Kategori </label>
                                                                        <div class="form-group">
                                                                            <fieldset class="form-group">
                                                                                <select multiple="multiple"
                                                                                    size="10"
                                                                                    class="duallistbox-no-filter"
                                                                                    name="sub_cat[]">
                                                                                    <option value="PL91" {{ json_encode($data->sub_cat) == 'PL91' ? 'selected' : '' }}>Kilang Buah
                                                                                    </option>
                                                                                    <option value="PL101" {{ json_encode($data->sub_cat) == 'PL101' ? 'selected' : '' }}>Kilang
                                                                                        Penapis</option>
                                                                                    <option value="PL102" {{ json_encode($data->sub_cat) == 'PL102' ? 'selected' : '' }}>Kilang
                                                                                        Isirung</option>
                                                                                    <option value="PL104" {{ json_encode($data->sub_cat) == 'PL104' ? 'selected' : '' }}>Kilang
                                                                                        Oleokimia</option>
                                                                                    <option value="PL111" {{ json_encode($data->sub_cat) == 'PL111' ? 'selected' : '' }}>Pusat
                                                                                        Simpanan</option>
                                                                                    <option value="PLBIO" {{ json_encode($data->sub_cat) == 'PLBIO' ? 'selected' : '' }}>Kilang
                                                                                        Biodiesel</option>
                                                                                </select>
                                                                            </fieldset>
                                                                        </div>

                                                                        <label>Status </label>
                                                                        <div class="form-group">
                                                                            <fieldset class="form-group">
                                                                                <select class="form-control"
                                                                                    name="status">
                                                                                    {{-- @if ($data->status == null)
                                                                                        <option hidden selected
                                                                                            disabled>
                                                                                            Sila Pilih Status
                                                                                        </option>
                                                                                    @else
                                                                                        <option hidden selected
                                                                                            disabled>
                                                                                            {{ $data->status }}
                                                                                        </option>
                                                                                    @endif --}}
                                                                                    <option
                                                                                        {{ $data->status == '1' ? 'selected' : '' }}
                                                                                        value="1">
                                                                                        Aktif</option>
                                                                                    {{-- <option {{ ($data->role == 'Kerani') ? 'selected' : '' }}>Kerani</option> --}}
                                                                                    <option
                                                                                        {{ $data->status == '2' ? 'selected' : '' }}
                                                                                        value="2">
                                                                                        Tidak Aktif</option>
                                                                                        <option hidden disabled
                                                                                            {{ $data->status == '' ? 'selected' : '' }}
                                                                                            value="">
                                                                                            Sila Pilih Status
                                                                                        </option>
                                                                                </select>
                                                                            </fieldset>
                                                                        </div>


                                                                    </div>





                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-light-secondary"
                                                                            data-dismiss="modal">
                                                                            <i
                                                                                class="bx bx-x d-block d-sm-none"></i>
                                                                            <span
                                                                                class="d-none d-sm-block">Batal</span>
                                                                        </button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary ml-1">
                                                                            <i
                                                                                class="bx bx-check d-block d-sm-none"></i>
                                                                            <span
                                                                                class="d-none d-sm-block">Kemaskini</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @elseif (auth()->user()->role == 'Manager')
                                                        @if ($data->role == 'Supervisor' || $data->role == 'Admin' || $data->role == '')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalScrollableTitle">
                                                                        Kemaskini Maklumat Pentadbir</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">

                                                                    <form
                                                                        action="{{ route('admin.edit.pentadbir', [$data->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <label>Nama </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='name'
                                                                                    class="form-control"
                                                                                    value="{{ $data->name }}">
                                                                            </div>
                                                                            <label>Emel </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='email'
                                                                                    class="form-control"
                                                                                    value="{{ old('email') ?? $data->email }}">
                                                                            </div>
                                                                            <label>Username </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='username'
                                                                                    class="form-control"
                                                                                    value="{{ $data->username }}">
                                                                            </div>
                                                                            <label>Kategori </label>
                                                                            <div class="form-group">
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-control"
                                                                                        name="role">
                                                                                        <option
                                                                                            {{ $data->role == 'Admin' ? 'selected' : '' }}>
                                                                                            Admin</option>
                                                                                        <option
                                                                                            {{ $data->role == 'Supervisor' ? 'selected' : '' }}>
                                                                                            Supervisor</option>
                                                                                        <option hidden disabled
                                                                                            {{ $data->role == '' ? 'selected' : '' }}
                                                                                            value="">
                                                                                            Sila Pilih Kategori
                                                                                        </option>
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>
                                                                            <label>Sub-Kategori </label>
                                                                            <div class="form-group">
                                                                                <fieldset class="form-group">
                                                                                    <select multiple="multiple"
                                                                                        size="10"
                                                                                        class="duallistbox-no-filter"
                                                                                        name="sub_cat[]">
                                                                                        <option value="PL91">Kilang
                                                                                            Buah
                                                                                        </option>
                                                                                        <option value="PL101">Kilang
                                                                                            Penapis</option>
                                                                                        <option value="PL102">Kilang
                                                                                            Isirung</option>
                                                                                        <option value="PL104">Kilang
                                                                                            Oleokimia</option>
                                                                                        <option value="PL111">Pusat
                                                                                            Simpanan</option>
                                                                                        <option value="PLBIO">Kilang
                                                                                            Biodiesel</option>
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>

                                                                            <label>Status </label>
                                                                            <div class="form-group">
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-control"
                                                                                        name="status">
                                                                                        {{-- @if ($data->status == null)
                                                                                            <option hidden selected
                                                                                                disabled>
                                                                                                Sila Pilih Status
                                                                                            </option>
                                                                                        @else
                                                                                            <option hidden selected
                                                                                                disabled>
                                                                                                {{ $data->status }}
                                                                                            </option>
                                                                                        @endif --}}
                                                                                        <option
                                                                                            {{ $data->status == '1' ? 'selected' : '' }}
                                                                                            value="1">
                                                                                            Aktif</option>
                                                                                        {{-- <option {{ ($data->role == 'Kerani') ? 'selected' : '' }}>Kerani</option> --}}
                                                                                        <option
                                                                                            {{ $data->status == '2' ? 'selected' : '' }}
                                                                                            value="2">
                                                                                            Tidak Aktif</option>
                                                                                        <option hidden disabled
                                                                                            {{ $data->status == '' ? 'selected' : '' }}
                                                                                            value="">
                                                                                            Sila Pilih Status
                                                                                        </option>
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>



                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-light-secondary"
                                                                                data-dismiss="modal">
                                                                                <i
                                                                                    class="bx bx-x d-block d-sm-none"></i>
                                                                                <span
                                                                                    class="d-none d-sm-block">Batal</span>
                                                                            </button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary ml-1">
                                                                                <i
                                                                                    class="bx bx-check d-block d-sm-none"></i>
                                                                                <span
                                                                                    class="d-none d-sm-block">Kemaskini</span>
                                                                            </button>
                                                                        </div>
                                                                    </form>

                                                                </div>

                                                            </div>
                                                        @else
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalScrollableTitle">
                                                                        Kemaskini Maklumat Pentadbir</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <label>Nama </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='name'
                                                                            class="form-control"
                                                                            value="{{ $data->name }}" readonly>
                                                                    </div>
                                                                    <label>Emel </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='email'
                                                                            class="form-control"
                                                                            value="{{ old('email') ?? $data->email }}"
                                                                            readonly>
                                                                    </div>
                                                                    <label>Username </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='username'
                                                                            class="form-control"
                                                                            value="{{ $data->username }}"
                                                                            readonly>
                                                                    </div>
                                                                    <label>Kategori </label>
                                                                    <div class="form-group">
                                                                        <fieldset class="form-group">
                                                                            <input type="text" name='username'
                                                                                class="form-control"
                                                                                value="{{ $data->role }}"
                                                                                readonly>

                                                                        </fieldset>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        @endif
                                                    @elseif (auth()->user()->role == 'Supervisor')
                                                        @if ($data->role == '' || $data->role == 'Admin')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalScrollableTitle">
                                                                        Kemaskini Maklumat Pentadbir</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">

                                                                    <form
                                                                        action="{{ route('admin.edit.pentadbir', [$data->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <label>Nama </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='name'
                                                                                    class="form-control"
                                                                                    value="{{ $data->name }}">
                                                                            </div>
                                                                            <label>Emel </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='email'
                                                                                    class="form-control"
                                                                                    value="{{ old('email') ?? $data->email }}">
                                                                            </div>
                                                                            <label>Username </label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='username'
                                                                                    class="form-control"
                                                                                    value="{{ $data->username }}">
                                                                            </div>
                                                                            <label>Kategori </label>
                                                                            <div class="form-group">
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-control"
                                                                                        name="role">
                                                                                        <option
                                                                                            {{ $data->role == 'Admin' ? 'selected' : '' }}>
                                                                                            Admin</option>
                                                                                        <option
                                                                                            {{ $data->role == 'Supervisor' ? 'selected' : '' }}>
                                                                                            Supervisor</option>
                                                                                        <option hidden disabled
                                                                                            {{ $data->role == '' ? 'selected' : '' }}
                                                                                            value="">
                                                                                            Sila Pilih Kategori
                                                                                        </option>
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>
                                                                            <label>Sub-Kategori </label>
                                                                            <div class="form-group">
                                                                                <fieldset class="form-group">
                                                                                    <select multiple="multiple"
                                                                                        size="10"
                                                                                        class="duallistbox-no-filter"
                                                                                        name="sub_cat[]">
                                                                                        <option value="PL91">Kilang
                                                                                            Buah
                                                                                        </option>
                                                                                        <option value="PL101">Kilang
                                                                                            Penapis</option>
                                                                                        <option value="PL102">Kilang
                                                                                            Isirung</option>
                                                                                        <option value="PL104">Kilang
                                                                                            Oleokimia</option>
                                                                                        <option value="PL111">Pusat
                                                                                            Simpanan</option>
                                                                                        <option value="PLBIO">Kilang
                                                                                            Biodiesel</option>
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>

                                                                            <label>Status </label>
                                                                            <div class="form-group">
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-control"
                                                                                        name="status">
                                                                                        {{-- @if ($data->status == null)
                                                                                            <option hidden selected
                                                                                                disabled>
                                                                                                Sila Pilih Status
                                                                                            </option>
                                                                                        @else
                                                                                            <option hidden selected
                                                                                                disabled>
                                                                                                {{ $data->status }}
                                                                                            </option>
                                                                                        @endif --}}
                                                                                        <option
                                                                                            {{ $data->status == '1' ? 'selected' : '' }}
                                                                                            value="1">
                                                                                            Aktif</option>
                                                                                        {{-- <option {{ ($data->role == 'Kerani') ? 'selected' : '' }}>Kerani</option> --}}
                                                                                        <option
                                                                                            {{ $data->status == '2' ? 'selected' : '' }}
                                                                                            value="2">
                                                                                            Tidak Aktif</option>
                                                                                        <option hidden disabled
                                                                                            {{ $data->status == '' ? 'selected' : '' }}
                                                                                            value="">
                                                                                            Sila Pilih Status
                                                                                        </option>
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>



                                                                        </div>


                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-light-secondary"
                                                                                data-dismiss="modal">
                                                                                <i
                                                                                    class="bx bx-x d-block d-sm-none"></i>
                                                                                <span
                                                                                    class="d-none d-sm-block">Batal</span>
                                                                            </button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary ml-1">
                                                                                <i
                                                                                    class="bx bx-check d-block d-sm-none"></i>
                                                                                <span
                                                                                    class="d-none d-sm-block">Kemaskini</span>
                                                                            </button>
                                                                        </div>
                                                                    </form>

                                                                </div>

                                                            </div>
                                                        @else
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalScrollableTitle">
                                                                        Kemaskini Maklumat Pentadbir</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <label>Nama </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='name'
                                                                            class="form-control"
                                                                            value="{{ $data->name }}" readonly>
                                                                    </div>
                                                                    <label>Emel </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='email'
                                                                            class="form-control"
                                                                            value="{{ old('email') ?? $data->email }}"
                                                                            readonly>
                                                                    </div>
                                                                    <label>Username </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='username'
                                                                            class="form-control"
                                                                            value="{{ $data->username }}"
                                                                            readonly>
                                                                    </div>
                                                                    <label>Kategori </label>
                                                                    <div class="form-group">
                                                                        <fieldset class="form-group">
                                                                            <input type="text" name='username'
                                                                                class="form-control"
                                                                                value="{{ $data->role }}"
                                                                                readonly>

                                                                        </fieldset>
                                                                    </div>


                                                                </div>

                                                            </div>
                                                        @endif
                                                    @elseif (auth()->user()->role == 'Admin' || auth()->user()->role == '')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                    Kemaskini Maklumat Pentadbir</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <label>Nama </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='name' class="form-control"
                                                                        value="{{ $data->name }}" readonly>
                                                                </div>
                                                                <label>Emel </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='email' class="form-control"
                                                                        value="{{ old('email') ?? $data->email }}" readonly>
                                                                </div>
                                                                <label>Username </label>
                                                                <div class="form-group">
                                                                    <input type="text" name='username' class="form-control"
                                                                        value="{{ $data->username }}" readonly>
                                                                </div>
                                                                <label>Kategori </label>
                                                                <div class="form-group">
                                                                    <fieldset class="form-group">
                                                                        <input type="text" name='username' class="form-control"
                                                                            value="{{ $data->role }}" readonly>

                                                                    </fieldset>
                                                                </div>


                                                            </div>

                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="next2{{ $data->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                                            PENGESAHAN</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Anda pasti mahu menghapus pentadbir ini?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                        </button>
                                                        <a href="{{ route('admin.delete.pentadbir', [$data->id]) }}" type="button"
                                                            class="btn btn-primary ml-1">

                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Ya</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            {{-- </section> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            RALAT
        </div>
    @endif

@endsection

@section('scripts')
<script>

    $(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#exampleTadbir tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
    });

    // DataTable
        var table = $('#exampleTadbir').DataTable({

            initComplete: function () {

                // Apply the search
                this.api()
                    .columns()
                    .every(function () {
                        var that = this;
                        $('input', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
            dom: 'Bfrtip',

            buttons: [

                'pageLength',

                {

                    extend: 'excel',
                    text: '<a class="bi bi-file-earmark-excel-fill" aria-hidden="true"  > Excel</a>',
                    className: "fred",

                    title: function(doc) {
                        return $('#title').text()
                    },

                    customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    var style = xlsx.xl['styles.xml'];
                    $( 'row c', sheet ).attr( 's', '25' );
                    $('xf', style).find("alignment[horizontal='center']").attr("wrapText", "1");
                    $('row', sheet).first().attr('ht', '40').attr('customHeight', "1");
                    },

                    filename: 'Senarai Pentadbir',



                },
                {
                    extend: 'pdfHtml5',
                    text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                    pageSize: 'TABLOID',
                    className: "prodpdf",

                    exportOptions: {
                        columns: [0,1,2,3,4,5]
                    },
                    title: function(doc) {
                            return $('#title').text()
                            },
                    customize: function (doc) {
                        let table = doc.content[1].table.body;
                        for (i = 1; i < table.length; i++) // skip table header row (i = 0)
                        {
                            var test = table[i][0];
                        }

                    },
                    customize: function(doc) {
                    doc.content[1].table.body[0].forEach(function(h) {
                        h.fillColor = '#0a7569';

                    });
                    },

                    filename: 'Senarai Pentadbir',

                },
            ],
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
