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
                        <div class="row" style="padding: 10px">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>
                        <div class=" text-center">
                            <h3 style="color: rgb(39, 80, 71);">Direktori</h3>
                            <h4 style="color: rgb(39, 80, 71); margin-top:1%">Senarai Pelesen</h4>

                        </div>
                        <hr>
                        <form action="{{ route('admin.direktori.process') }}"
                            method="GET">
                            @csrf
                            <div class="card-body">
                                <div class="container center ">

                                    <div class="container center">
                                        <div class="row" style="margin-bottom:2%;">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                Sektor Kilang</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="basicSelect" name="e_kat" required>
                                                        <option selected hidden disabled>Sila Pilih</option>
                                                        {{-- <option value="PL91">KILANG BIODIESEL</option> --}}


                                                        @if (auth()->user()->sub_cat)
                                                        @foreach (json_decode(auth()->user()->sub_cat) as $cat)
                                                        @if ($cat == 'PL91')
                                                        <option value="PL91">KILANG BUAH</option>
                                                        @endif
                                                        @if ($cat == 'PL101')
                                                        <option value="PL101">KILANG PENAPIS</option>
                                                        @endif
                                                        @if ($cat == 'PL102')
                                                        <option value="PL102">KILANG ISIRUNG</option>
                                                        @endif
                                                        @if ($cat == 'PL104')
                                                        <option value="PL104">KILANG OLEOKIMIA</option>
                                                        @endif
                                                        @if ($cat == 'PL111')
                                                        <option value="PL111">PUSAT SIMPANAN</option>
                                                        @endif
                                                        @if ($cat == 'PLBIO')
                                                        <option value="PLBIO">KILANG BIODIESEL</option>
                                                        @endif
                                                        @endforeach
                                                        @endif

                                                    </select>

                                                </fieldset>
                                                @error('e_kat')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila buat pilihan di bahagian ini</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                Negeri Premis</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="basicSelect" name="nama_negeri"
                                                        required>
                                                        <option selected hidden disabled>Sila Pilih</option>
                                                        <option value="All">ALL</option>
                                                        @foreach (App\Models\Negeri::distinct()->orderBy('kod_negeri')->get() as $data)
                                                            <option value="{{ $data->kod_negeri }}">
                                                                {{ $data->nama_negeri }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                </fieldset>
                                                @error('nama_negeri')
                                                    <div class="alert alert-danger">
                                                        <strong>Sila buat pilihan di bahagian ini</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row justify-content-center mt-3">

                                            <button type="submit" class="btn btn-primary center"
                                                style="margin: 10px">Papar Direktori</button>
                                            {{-- <button type="submit">YA</button> --}}
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
