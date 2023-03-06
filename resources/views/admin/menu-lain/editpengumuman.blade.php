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
        <form action="{{ route('admin.updatepengumuman', [$pengumuman->Id]) }}" method="post">
            @csrf
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="row" style="padding: 15px">
                                <div class="col-1 align-self-center">
                                    <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                                </div>
                            </div>
                            <div class=" text-center">
                                <h4 style="color: rgb(39, 80, 71); ">Kemaskini Pengumuman</h4>
                            </div>
                            <hr>

                            <div class="card-body">
                                <div class="container center ">

                                    <div class="container center mt-2">

                                        <div class="row" style="margin-top: -2%">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                Tarikh Mula</label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name='Start_date' id="Start_date"
                                                    required title="Sila isikan butiran ini."
                                                    value="{{ old('Start_date') ?? $pengumuman->Start_date }}">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 1%">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                Tarikh Akhir</label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name='End_date' id="End_date"
                                                    required title="Sila isikan butiran ini."
                                                    value="{{ old('End_date') ?? $pengumuman->End_date }}">
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 1%">
                                            <label for="fname"
                                                class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                                Icon New</label>
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="basicSelect" name="Icon_new">
                                                        <option value="Y"
                                                            {{ $pengumuman->Icon_new == 'Y' ? 'selected' : '' }}>Ya
                                                        </option>
                                                        <option value="N"
                                                            {{ $pengumuman->Icon_new == 'N' ? 'selected' : '' }}>Tidak
                                                        </option>
                                                    </select>
                                                </fieldset>
                                                {{-- @error('alamat_kilang_1')
                                                    <div class="alert alert-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror --}}
                                            </div>
                                        </div>

                                        <div class="row" style="margin-bottom: 5%; margin-top: 1%" ">
                                            <label for=" fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                            Mesej</label>

                                            <div class="col-md-6">

                                                <div id="editor" oninput="add_message()">
                                                    {!! old('Message') ?? $pengumuman->Message !!}
                                                </div>

                                            </div>

                                            <input type="hidden" id="quill_html" name="Message"
                                                value="">


                                        </div>
                                    </div>


                                    <br>
                                    <div class="row center mt-3">
                                        <div class="col-md-12 center mb-3">
                                            <button type="button" class="btn btn-primary center" style="margin-left:45%"
                                                data-toggle="modal" data-target="#myModal">Kemaskini</button>
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
                                                        Anda pasti mahu mengemaskini pengumuman ini?
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
                        </div>
                    </div>
                </div>

            </div>
        </form>




    </div>
@endsection

@section('scripts')
    <script src="{{ asset('nice-admin/assets/libs/quill/dist/quill.min.js') }}"></script>

    {{-- <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script> --}}

<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    function add_message() {
        // var content = document.querySelector("#snow").innerHTML;
        // alert(quill.getContents());
        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("quill_html").value = quill.root.innerHTML;
        });
    }
</script>
@endsection
