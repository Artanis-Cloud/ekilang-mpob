@extends('layouts.main')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> --}}

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

        <div class="container-fluid">

            <div class="card" style="margin-right:2%; margin-left:2%">
                <div class="card-body">

                    <div class="row">
                        <div class="col-1 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i
                                    class="fa fa-angle-left">&ensp;</i>Kembali</a>
                        </div>

                    </div>
                    <div class="pl-3">
                        <div class="row">

                            <div class="col-md-12 text-center">

                                {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 3
                                </h3>
                                <h4 style="color: rgb(39, 80, 71); font-size:18px;"><b>Maklumat Syarikat Jualan/Edaran</b>
                                </h4>

                                {{-- <p>Maklumat Kilang</p> --}}
                            </div>

                        </div>
                        <hr>
                        <form action="{{ route('bio.update.bahagian.iii.sykt', [$senarai_syarikat[0]->ebio_cc1]) }}"
                            method="post">
                            @csrf
                            <section class="section">
                                <div class="card">

                                    <br>
                                    @foreach ($penyata as $key => $data)

                                    <div class="table-responsive col-10 ml-auto mr-auto" id="data_table{{ $key }}">
                                        <table class="table table-bordered text-center" style="width: 100%;">
                                            <thead>
                                                <tr style="background-color: #e9ecefbd;  word-wrap:normal">
                                                    <th>Bil.</th>
                                                    <th>Nama Syarikat</th>
                                                    <th colspan="2">Jumlah Jualan/Edaran</th>
                                                </tr>
                                            </thead>
                                            <tbody style="word-break: break-word; font-size:12px">
                                                @foreach ($data->ebiocc as $ebiocc_data)
                                                    <tr class="text-left">
                                                        <td>{{ $loop->iteration }}
                                                        </td>
                                                        <td style="text-align: center">{{ $data->ebiocc->ebio_cc3 ?? 0 }}
                                                        </td>
                                                        <td style="text-align: center" colspan="2"><input type="text"
                                                                size="10" name='ebio_cc4' id='4bio_cc4'
                                                                style="text-align: center; width:50%" required
                                                                oninvalid="this.setCustomValidity('Sila isi ruangan ini')"
                                                                oninput="this.setCustomValidity('')"
                                                                onkeyup="FormatCurrency(this)"
                                                                onkeypress="return isNumberKey(event)"
                                                                value="{{ $data->ebiocc->ebio_cc4 ?? 0 }}"></td>

                                                        {{-- <td>-</td> --}}
                                                    </tr>
                                                    @endforeach

                                                    <tr class="text-left">
                                                        <td><input type="text" id="new_syarikat{{ $key }}[]"
                                                                name='new_syarikat{{ $key }}[]'></td>
                                                        <td><input type="text" id="new_jumlah{{ $key }}[]"
                                                                name='new_jumlah{{ $key }}[]'></td>
                                                        <td><input type="button" class="add"
                                                                onclick="add_row1({{ $key }});"
                                                                value="Tambah Maklumat">
                                                        </td>
                                                        {{-- <td></td>
                                                    <td><select class="form-control select2 " id="new_syarikat[]"
                                                        name="new_syarikat[]" required onchange="showDetail()"
                                                        oninvalid="this.setCustomValidity('Sila buat pilihan dibahagian ini')"
                                                        oninput="this.setCustomValidity(''); validate_two_decimal('')">
                                                        <option selected hidden disabled value="">Sila Pilih</option>
                                                        @foreach ($syarikat as $data)
                                                            <option value="{{ $data->id }}">
                                                                {{ $data->pembeli }}
                                                            </option>
                                                        @endforeach

                                                    </select></td>
                                                    <td><input type="text" id="new_jumlah[]" name='new_jumlah[]'></td>
                                                <td style="size: 10ch"><input type="button" class="add"
                                                        onclick="add_row();" value="Tambah Maklumat">
                                                </td> --}}
                                                        {{-- <td>-</td> --}}
                                                    </tr>

                                            </tbody>
                                            @endforeach

                                        </table>
                                        <div class="col-md-12 mt-3">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#next" style="float: right">
                                                Kemaskini
                                            </button>
                                            <!-- Vertically Centered modal Modal -->
                                            <div class="modal fade" id="next" tabindex="-1" role="dialog"
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
                                                                Anda pasti mahu menyimpan maklumat ini?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block"
                                                                    style="color:#275047">Tidak</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary ml-1"
                                                                id="submit-form">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Ya</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        </form>
                    </div>
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
        function add_row1(key) {
            console.log("new_syarikat" + key + "[]");
            var new_syarikat1 = document.getElementById("new_syarikat" + key + "[]").value;
            var new_jumlah1 = document.getElementById("new_jumlah" + key + "[]").value;

            var table1 = document.getElementById("data_table" + key);
            var table_len1 = (table1.rows.length) - 1;
            var row1 = table1.insertRow(table_len1).outerHTML = "<tr id='row" + key + table_len1 +
                "'><td id='syarikat_row" + key +
                table_len1 + "'>" + new_syarikat1 + "</td><td id='jumlah_row" + key + table_len1 + "'>" + new_jumlah1 +
                "</td><td><input type='hidden' id='jumlah_row" + key + table_len1 +
                "' name='jumlah_row_hidden" + key + "[]' value=" + new_jumlah1 +
                "> <input type='button' value='Hapus' class='delete' onclick='delete_row1(" + table_len1 + ")'></td></tr>";

            var table_input1 = document.getElementById("cc3_4");
            var table_input_len1 = (table_input1.rows.length);
            var row_input1 = table_input1.insertRow(table_input_len1).outerHTML =
                "<tr id='row_input" + key + table_input_len1 + "'><td><input type='hidden' id='jumlah_row_hidden" + key +
                table_input_len1 +
                "' name='jumlah_row_hidden" + key + "[]' value=" + new_jumlah1 +
                "><input type='hidden' id='new_syarikat_hidden" + key + table_input_len1 +
                "' name='new_syarikat_hidden" + key + "[]' value=" + new_syarikat1 +
                "></td></tr>";

            document.getElementById("new_syarikat" + key + "[]").value = "";
            document.getElementById("new_jumlah" + key + "[]").value = "";
        }

        function delete_row1(no) {
            document.getElementById("row" + key + "").outerHTML = "";
            // document.getElementById("row_input" + no + "").outerHTML = "";

            document.getElementById("jumlah_row_hidden1" + (no - 1)).value = "";
            document.getElementById("new_syarikat_hidden1" + (no - 1)).value = "";
        }
    </script>
@endsection
