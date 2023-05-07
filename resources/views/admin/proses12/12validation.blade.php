@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb mt-2">

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
                            <h4 style="color: rgb(39, 80, 71);">Validasi (Semakan Data)</h4>
                            <h6 style="color: rgb(242, 68, 68); margin-bottom:1%"><i>
                                    Perhatian: Proses ini menyemak data di PLEID</i>
                            </h6>
                        </div>
                        <hr>
                        <form action="{{ route('admin.validasi.proses') }}" method="post">
                            @csrf
                        <div class="card-body">
                            <div class="container center ">
                                <div class="row" style="margin-top:-2%">

                                    <label for="fname"
                                        class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                        Sektor Kilang</label>
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <select class="form-control" id="basicSelect" name="e_kat" required>
                                                <option selected hidden disabled>Sila Pilih</option>
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
                                                {{-- <option value="PL91">KILANG BUAH</option>
                                                <option value="PL101">KILANG PENAPIS</option>
                                                <option value="PL102">KILANG ISIRUNG</option>
                                                <option value="PL104">KILANG OLEOKIMIA</option>
                                                <option value="PL111">PUSAT SIMPANAN</option>
                                                <option value="PLBIO">KILANG BIODIESEL</option> --}}

                                            </select>

                                        </fieldset>
                                        @error('e_kat')
                                            <div class="alert alert-danger">
                                                <strong>Sila buat pilihan di bahagian ini</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="row" style="margin-top:-1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Tahun
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="tahun">
                                                    <option selected hidden disabled value="">Sila Pilih Tahun</option>
                                                @for ($i = 2011; $i <= date('Y'); $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor



                                                </select>
                                            </fieldset>
                                            @error('tahun')
                                            <div class="alert alert-danger">
                                                <strong>Sila buat pilihan di bahagian ini</strong>
                                            </div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:-1%">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Bulan
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="bulan">
                                                    <option selected hidden disabled>Sila Pilih Bulan</option>
                                                    <option value="01">JANUARI</option>
                                                    <option value="02">FEBRUARI</option>
                                                    <option value="03">MAC</option>
                                                    <option value="04">APRIL</option>
                                                    <option value="05">MEI</option>
                                                    <option value="06">JUN</option>
                                                    <option value="07">JULAI</option>
                                                    <option value="08">OGOS</option>
                                                    <option value="09">SEPTEMBER</option>
                                                    <option value="10">OKTOBER</option>
                                                    <option value="11">NOVEMBER</option>
                                                    <option value="12">DISEMBER</option>



                                                </select>
                                            </fieldset>
                                            @error('bulan')
                                            <div class="alert alert-danger">
                                                <strong>Sila buat pilihan di bahagian ini</strong>
                                            </div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="row center mt-3">
                                        <div class="col-md-12 center mb-3">
                                            <button type="submit" class="btn btn-primary center" style="margin-left:45%"
                                                data-toggle="modal" data-target="#myModal">Papar</button>
                                            {{-- <button type="submit">YA</button> --}}
                                        </div>
                                    </div>
                                </form>

                                    {{-- <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
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
                                                        Anda pasti mahu menghantar validasi ini?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1" data-bs="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Ya</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div> --}}

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
