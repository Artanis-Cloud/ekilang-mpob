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

            <div class="card" style="margin-right:2%; margin-left:2%">
                <div class="card-body">
                    {{-- <div class="col-md-4 col-12"> --}}
                    <div class="pl-3">

                        <div class=" text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Pentadbir
                            </h3>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>


                        <section class="section">
                            <div class="card">
                                {{-- <div class="card-header">
                                                            Simple Datatable
                                                        </div> --}}
                                <div class="col-md-12">
                                    <a href="{{ route('admin.pengurusan.pentadbir') }}" class="btn btn-primary"
                                        style="float: left"> Tambah Pentadbir Baru</a>
                                </div>
                            </div>

                            <div class="table-responsive" style="margin-top: -6%">
                                <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Bil.</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Alamat Emel</th>
                                            <th>Kategori</th>
                                            <th>Kemaskini</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody style="word-break: break-word; font-size:12px">
                                        @foreach ($admin as $data)
                                            <tr class="text-left">
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td>
                                                            <a href="{{ route('admin.papar.maklumat', $data->e_id) }}"><u>
                                                                    {{ $data->e_nl }}</u></a>
                                                        </td> --}}
                                                <td>{{ $data->name ?? '-' }}</td>
                                                <td>{{ $data->username ?? '-' }}</td>
                                                <td>{{ $data->email ?? '-' }}</td>
                                                <td>{{ $data->role }}</td>
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
                                                            <i class="fas fa-trash"
                                                                style="color: #dc3545;font-size:18px"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                                <div class="col-md-6 col-12">

                                                    <!--scrolling content Modal -->
                                                    <div class="modal fade" id="modal{{ $data->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalScrollableTitle">
                                                                        Kemaskini Maklumat Pentadbir</h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
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
                                                                                    value="{{ $data->name}}">
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
                                                                                    <select class="form-control" name="role">
                                                                                        <option {{ ($data->role == 'Admin') ? 'selected' : '' }}>Admin</option>
                                                                                        <option {{ ($data->role == 'Kerani') ? 'selected' : '' }}>Kerani</option>
                                                                                        <option {{ ($data->role == 'Manager') ? 'selected' : '' }}>Manager</option>
                                                                                        <option {{ ($data->role == 'Superadmin') ? 'selected' : '' }}>Superadmin</option>
                                                                                        <option {{ ($data->role == 'Supervisor') ? 'selected' : '' }}>Supervisor</option>
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>


                                                                        </div>

                                                                </div>


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
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
                                            {{-- </tr> --}}
                                            <div class="modal fade" id="next2{{ $data->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                PENGESAHAN</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Anda pasti mahu menghapus pentadbir ini?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                            </button>
                                                            <a href="{{ route('admin.delete.pentadbir',[$data->id]) }}" type="button"
                                                                class="btn btn-primary ml-1">

                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Ya</span>
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
                    </section>
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
                    "lengthMenu": "Memaparkan _MENU_ rekod per  ",
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
