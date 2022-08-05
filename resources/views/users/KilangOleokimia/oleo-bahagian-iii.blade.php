@extends('layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Kemasukan Penyata Bulanan
                        @if ($bulan == 1)
                            JANUARI
                        @elseif($bulan == 2)
                            FEBRUARI
                        @elseif($bulan == 3)
                            MAC
                        @elseif($bulan == 4)
                            APRIL
                        @elseif($bulan == 5)
                            MEI
                        @elseif($bulan == 6)
                            JUN
                        @elseif($bulan == 7)
                            JULAI
                        @elseif($bulan == 8)
                            OGOS
                        @elseif($bulan == 9)
                            SEPTEMBER
                        @elseif($bulan == 10)
                            OKTOBER
                        @elseif($bulan == 11)
                            NOVEMBER
                        @elseif($bulan == 12)
                            DISEMBER
                        @endif {{ $tahun }}
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
        <div class="card" style="margin-right:2%; margin-left:2%">
            <form action="{{ route('oleo.add.bahagian.iii') }}" method="post" class="sub-form">
                @csrf
                <div class="card-body">
                    <div class="">
                        <div class="mb-4 text-center">
                            <h3 style="color: rgb(39, 80, 71);">Bahagian 3</h3>
                            <h5 style="color: rgb(39, 80, 71)">Ringkasan Produk Oleokimia</h5>
                        </div>
                        <hr>
                        <p><i>* Produk oleokimia termasuk yang berasaskan minyak sawit, minyak isirong
                                sawit, minyak soya, minyak kelapa, minyak jagung, petrokimia dan lain-lain.
                            </i></p>
                        <p><i>** Termasuk di pusat simpanan
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </i></p>
                        <div class="container center mt-4">

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span>Nama Produk dan Kod</span>
                                </div>
                                <div class="col-md-7 mt-3">
                                    <select class="form-control select2" id="produk" name="e104_c3" required oninvalid="this.setCustomValidity('Sila buat pilihan di bahagian ini')" oninput="this.setCustomValidity('')">
                                        <option selected hidden disabled value="">Sila Pilih</option>
                                        @foreach ($produk as $data)
                                            <option value="{{ $data->prodid }}">
                                                {{ $data->prodname }} - {{ $data->proddesc }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('e104_c3')
                                        <div class="alert alert-danger">
                                            <strong>Sila buat pilihan di bahagian ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Belian/Terimaan &nbsp;<i class="fa fa-exclamation-circle"
                                        style="color: red; cursor: pointer;"
                                        title="Jumlah Belian/Terimaan adalah termasuk jumlah Import."></i></span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_c4' style="width:100%" onchange="autodecimal(this); FormatCurrency(this)"
                                        id="e104_c4" oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); invokeFunc()" required onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini.">
                                    @error('e104_c4')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Pengeluaran</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_c5' style="width:100%" onchange="autodecimal(this); FormatCurrency(this)"
                                        id="e104_c5" oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity(''); invokeFunc2()" required onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini.">
                                    @error('e104_c5')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Jualan/Edaran Tempatan</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_c6' style="width: 100%"
                                        id="e104_c6" oninvalid="this.setCustomValidity('Sila isi ruangan ini')" onchange="autodecimal(this); FormatCurrency(this)"
                                        oninput="this.setCustomValidity(''); invokeFunc3()" required onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini.">
                                    @error('e104_c3')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span class="">Eksport</span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_c7' style="width: 100%"
                                        id="e104_c7" oninvalid="this.setCustomValidity('Sila isi ruangan ini')" onchange="autodecimal(this); FormatCurrency(this)"
                                        oninput="this.setCustomValidity(''); invokeFunc4()" required onkeypress="return isNumberKey(event)"
                                        title="Sila isikan butiran ini.">
                                    @error('e104_c7')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <span class="">Stok Akhir &nbsp; **<span>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <input type="text" class="form-control" name='e104_c8' style="width:100%" onchange="autodecimal(this); FormatCurrency(this)"
                                        id="e104_c8" oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                        oninput="this.setCustomValidity('')" required
                                        onkeypress="return isNumberKey(event)" title="Sila isikan butiran ini.">
                                    @error('e104_c8')
                                        <div class="alert alert-danger">
                                            <strong>Sila isi butiran ini</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>


                        </div><br>


                        <div class="row justify-content-center form-group">
                            <button type="submit" class="btn btn-primary ">Tambah</button>
                        </div>
                    </div>

            </form>
            <br>
            <br>
            <hr>
            <h5 style="color: rgb(39, 80, 71); text-align:center">Ringkasan Produk Oleokimia</h5>

            <section class="section">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" style="font-size: 13px">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>Produk Oleokimia</th>
                                        <th>Kod Produk</th>
                                        <th>Belian/Terimaan</th>
                                        <th>Pengeluaran</th>
                                        <th>Jualan/Edaran Tempatan</th>
                                        <th>Eksport</th>
                                        <th>Stok Akhir</th>
                                        <th>Kemaskini</th>
                                        <th>Hapus?</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penyata as $data)
                                        <tr style="text-align: right">
                                            <td style="text-align: left">{{ $data->produk->proddesc }}</td>
                                            <td style="text-align: center">{{ $data->produk->prodid }}</td>
                                            <td>{{ number_format($data->e104_c4 ?? 0, 2) }}</td>
                                            <td>{{ number_format($data->e104_c5 ?? 0, 2) }}</td>
                                            <td>{{ number_format($data->e104_c6 ?? 0, 2) }}</td>
                                            <td>{{ number_format($data->e104_c7 ?? 0, 2) }}</td>
                                            <td>{{ number_format($data->e104_c8 ?? 0, 2) }}</td>
                                            <td>
                                                <div class="icon" style="text-align: center">
                                                    <a href="#" type="button" data-toggle="modal"
                                                        data-target="#modal{{ $data->e104_c1 }}">
                                                        <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                        </i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="icon" style="text-align: center">
                                                    <a href="#" type="button" data-toggle="modal"
                                                        data-target="#next2{{ $data->e104_c1 }}">
                                                        <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>

                                        <div class="col-md-6 col-12">

                                            <!--scrolling content Modal -->
                                            <div class="modal fade" id="modal{{ $data->e104_c1 }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                Kemaskini Maklumat Produk</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('oleo.edit.bahagian.iii', [$data->e104_c1]) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <label class="required">Nama Produk </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='e104_c3'
                                                                            class="form-control" required
                                                                            value="{{ $data->produk->proddesc }}"
                                                                            readonly>
                                                                    </div>
                                                                    <label class="">Belian/Terimaan </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='e104_c4' id="e104_ec4{{ $data->e104_c1 }}"
                                                                            oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_c1 }}); invoke_ec4({{ $data->e104_c1 }})"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                            value="{{ number_format($data->e104_c4 ,2) }}">
                                                                    </div>
                                                                    <label class="">Pengeluaran </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='e104_c5' id="e104_ec5{{ $data->e104_c1 }}"
                                                                            oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_c1 }}); invoke_ec5({{ $data->e104_c1 }})"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                            value="{{ number_format($data->e104_c5 ,2) }}">
                                                                    </div>
                                                                    <label class="">Jualan/Edaran Tempatan </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='e104_c6' id="e104_ec6{{ $data->e104_c1 }}"
                                                                            oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_c1 }}); invoke_ec6({{ $data->e104_c1 }})"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                            value="{{ number_format($data->e104_c6 ,2) }}">
                                                                    </div>
                                                                    <label class="">Eksport </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='e104_c7' id="e104_ec7{{ $data->e104_c1 }}"
                                                                            oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_c1 }}); invoke_ec7({{ $data->e104_c1 }})"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                            value="{{ number_format($data->e104_c7 ,2) }}">
                                                                    </div>
                                                                    <label class="">Stok Akhir</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name='e104_c8' id="e104_ec8{{ $data->e104_c1 }}"
                                                                            oninput="validate_two_decimal(this); enableKemaskini({{ $data->e104_c1 }}); invoke_ec8({{ $data->e104_c1 }})"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            class="form-control" onchange="autodecimal(this); FormatCurrency(this)"
                                                                            value="{{ number_format($data->e104_c8 ,2) }}">
                                                                    </div>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Batal</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1" disabled id="kemaskini{{ $data->e104_c1 }}">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Kemaskini</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal fade" id="next2{{ $data->e104_c1 }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
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
                                                            <a href="{{ route('oleo.delete.bahagianiii', [$data->e104_c1]) }}"
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
                                    <tr>

                                        <td colspan="2"><b>JUMLAH</b></td>
                                        {{-- <td>{{ $data->e102_b5 }}</td> --}}
                                        <td style="text-align: right"><b>{{ number_format($total ?? 0, 2) }}</b></td>
                                        <td style="text-align: right"><b>{{ number_format($total2 ?? 0, 2) }}</b></td>
                                        <td style="text-align: right"><b>{{ number_format($total3 ?? 0, 2) }}</b></td>
                                        <td style="text-align: right"><b>{{ number_format($total4 ?? 0, 2) }}</b></td>
                                        <td style="text-align: right"><b>{{ number_format($total5 ?? 0, 2) }}</b></td>

                                        <td colspan="2"></td>
                                        {{-- <td></td> --}}

                                    </tr>

                                    <br>

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>




                <div class="form-group" style="padding: 20px; ">
                    <a href="{{ route('oleo.bahagianii') }}" class="btn btn-primary" style="float: left;">Sebelumnya</a>
                    <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right; "
                        data-target="#next">Simpan & Seterusnya</button>

                </div>

                <!-- Vertically Centered modal Modal -->
                <div class="modal fade" id="next" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
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
                                    Anda pasti mahu menyimpan maklumat ini?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                </button>
                                <a href="{{ route('oleo.paparpenyata') }}" type="button" class="btn btn-primary ml-1">

                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Ya</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>


        {{-- <div id="preloader"></div> --}}
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

            @endsection
            @section('scripts')
        {{-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
        </script> --}}
        <script>

            function invoke_ec4(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e104_ec5'+key).focus();
                    }

                });
            }

            function invoke_ec5(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e104_ec6'+key).focus();
                    }

                });
            }

            function invoke_ec6(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e104_ec7'+key).focus();
                    }

                });
            }

            function invoke_ec7(key) {
                addEventListener('keydown', function(evt) {
                    var whichKey = checkKey(evt);
                    if (whichKey == 13) {
                        console.log('successful');
                        evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                        document.getElementById('e104_ec8'+key).focus();
                    }

                });
            }




            function checkKey(evt) {
                console.log(evt.which);
                return evt.which;
            }
        </script>
        <script language="javascript" type="text/javascript">
            function FormatCurrency(ctrl) {
                //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
                if (event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40) {
                    return;
                }

                var val = ctrl.value;

                val = val.replace(/,/g, "")
                ctrl.value = "";
                val += '';
                x = val.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';

                var rgx = /(\d+)(\d{3})/;

                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }

                ctrl.value = x1 + x2;
            }
        </script>

        <script>
            $('.sub-form').submit(function() {

                var x = $('#e104_c4').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#e104_c4').val(x);

                var x = $('#e104_c5').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#e104_c5').val(x);

                var x = $('#e104_c6').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#e104_c6').val(x);

                var x = $('#e104_c7').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#e104_c7').val(x);

                var x = $('#e104_c8').val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#e104_c8').val(x);

                return true;

        });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.calc').change(function() {
                    var total = 0;
                    $('.calc').each(function() {
                        if ($(this).val() != '') {
                            total += parseInt($(this).val());
                        }
                    });
                    $('#total').html(total);
                });
            });
        </script>
        <script>
            document.addEventListener('keypress', function(e) {
                if (e.keyCode === 13 || e.which === 13) {
                    e.preventDefault();
                    return false;
                }

            });
        </script>
            <script>
                function invokeFunc() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e104_c5').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc2() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e104_c6').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc3() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e104_c7').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc4() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e104_c8').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>
            <script>
                function invokeFunc5() {
                    addEventListener('keydown', function(evt) {
                        var whichKey = checkKey(evt);
                        if (whichKey == 13) {
                            console.log('successful');
                            evt.preventDefault(); // if it's inside <form> tag, you don't want to submit it
                            document.getElementById('e104_b11').focus();
                        }

                    });
                }

                function checkKey(evt) {
                    console.log(evt.which);
                    return evt.which;
                }
            </script>




        </body>

        </html>
    @endsection
