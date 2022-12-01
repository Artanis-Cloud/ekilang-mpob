@extends('layouts.main')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> --}}
<style>
    body {
        counter-reset: section;
    }

    .count:before {
        counter-increment: section;
        content: counter(section);
    }
</style>
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
                    {{-- <h4 class="page-title">Kemasukan Penyata Bulanan
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
                    </h4> --}}
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
            <br>
            <p style="text-align: center; vertical-align:middle; font-size: 20px">

                <b> PENYATA BULANAN KILANG OLEOKIMIA (BIODIESEL) - MPOB (EL) CM 4<br>

                    BULAN :&nbsp;&nbsp;
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
                    @endif
                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun }}
                </b>
            </p>
        </div>

        {{-- <div class="container-fluid"> --}}

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
                    {{-- @foreach ($penyata as $key => $data) --}}

                    <form action="{{ route('admin.edit.bahagian.iii.sykt2', $penyata->ebio_c1 ?? '' ) }}" method="post" class="sub-form" id="myForm">
                        @csrf

                        <div class="table-responsive col-10 ml-auto mr-auto">
                            <table class="table table-bordered" style="font-size: 13px" id="data_table">
                                <thead style="text-align: center">
                                    <tr style="vertical-align: middle; background-color: #d3d3d34d">
                                        <th style="vertical-align: middle; ">Bil</th>
                                        <th style="vertical-align: middle; ">Nama Syarikat</th>
                                        <th style="vertical-align: middle;" colspan="2"> Jualan / Edaran</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($senarai_syarikat as $data)
                                        <tr id="row{{ $data->ebio_cc1 }}">

                                            <td style="text-align: center" class="count"></td>
                                            <td><input type="text" id="ebio_cc3" class="form-control"
                                                    style="text-align: center" placeholder="Nama Syarikat" name="ebio_cc3[]"
                                                    value="{{ $data->syarikat->pembeli ?? 0 }}" readonly></td>
                                            {{-- <div class="modal-body">
                                                    <table align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
                                                        <tr>
                                                            <th>Nama Syarikat</th>
                                                            <th>Jumlah Jualan / Edaran</th>
                                                        </tr>
                                                        <td><input type="text" id="new_syarikat[]" name='new_syarikat[]'></td> --}}
                                            <td><input type="text" id="ebio_cc4{{ $data->ebio_cc1 }}" class="form-control"
                                                    style="text-align: center" placeholder=" Jualan / Edaran" onchange="validation_jumlah({{ $data->ebio_cc1 }}) ; autodecimal(this);FormatCurrency(this);"
                                                    name="ebio_cc4[]" onkeypress="return isNumberKey(event)" onClick="this.select();"
                                                    value="{{ number_format($data->ebio_cc4 ?? 0, 2) }}"></td>
                                            <td><input type="button" class="add btn btn-danger"
                                                    style="display: block; margin: auto;"
                                                    onclick="deleteRow({{ $data->ebio_cc1 }});" value="Hapus">
                                            </td>


                                        </tr>
                                    @endforeach

                                    <tr>
                                        {{-- @endforeach --}}
                                        <td></td>
                                        <td class="field"><select class="form-control select2 " id="new_syarikat[]"
                                                name="new_syarikat[]">
                                                <option selected hidden disabled value="">Sila Pilih</option>
                                                @foreach ($syarikat as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->pembeli }}
                                                    </option>
                                                @endforeach

                                            </select></td>
                                        <td class="field"><input type="text" id="new_jumlah[]" class="form-control"
                                                style="text-align: center" name='new_jumlah[]' placeholder="Jualan/Edaran"
                                                onkeypress="return isNumberKey(event)"></td>
                                        <td class="actions"><input type="button" class="add btn btn-primary" style="display: block; margin: auto;"
                                                disabled="disabled" onclick="add_row();" value="Tambah Maklumat">
                                        </td>
                                    </tr>
                                    <tr style="background-color: #d3d3d34d; text-align: center">

                                        <td colspan="2"><b>JUMLAH</b></td>
                                        <td ><b><span id="total" name="total">
                                                </span>
                                                <input type="hidden" id="total_hidden" name="total_hidden">
                                            </b>
                                        </td>
                                        <td></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>


                        <table id="cc3_4">
                            {{-- @foreach ($senarai_syarikat as $key => $data)
                                <tr id='row_input{{$key}}'>
                                    <td>
                                        <input type="text" id="new_syarikat_hidden{{ $key }}" name="new_syarikat_hidden[]" value="{{ $data->ebio_cc3 }}">
                                        <input type="text" id="ebio_cc4_hidden{{ $key }}" name="ebio_cc4_hidden[]" value="{{ $data->ebio_cc3 }}">
                                    </td>
                                </tr>
                            @endforeach --}}
                        </table>
                        {{-- <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Batal</span>
                                            </button>
                                            <button type="submit" class="btn btn-primary ml-1">
                                                <i class=" bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Kemaskini</span>
                                            </button>
                                        </div>
                                    </form> --}}

                        {{-- @endforeach --}}
                        <div class="col-md-12 mt-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#next"
                                style="float: right">
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
                                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                            </button>
                                            <button type="submit" class="btn btn-primary ml-1" id="submit-form">
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
    function validation_jumlah(key) {


        let total = 0;

        for (var i = 0; i < document.getElementsByName("ebio_cc4[]").length; i++) {
                var hidden_value = document.getElementsByName("ebio_cc4[]")[i].value;
                // console.log('hidden_value',hidden_value);
                x = hidden_value.replace(/,/g, '');

                total += parseFloat(x);
            }

        //     let total2 = 0;
        // for (var i = 0; i < document.getElementsByName("ebio_cc4_hidden[]").length; i++) {
        //         var hidden_value2 = document.getElementsByName("ebio_cc4_hidden[]")[i].value;
        //         console.log('hidden_value',hidden_value2);
        //         x = hidden_value2.replace(/,/g, '');

        //         total2 += parseFloat(x);
        //     }

        //     var ftotal = total + total2;
        //     console.log("validation", ftotal);

        document.getElementById("total").innerHTML = (total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");




    }
    function deleteRow(key) {
            document.getElementById("row" + key).remove();
            let total = 0;
            //  console.log(total2);

            for (var i = 0; i < document.getElementsByName("ebio_cc4[]").length; i++) {
                var hidden_value = document.getElementsByName("ebio_cc4[]")[i].value;
                // console.log('hidden_value',hidden_value);
                x = hidden_value.replace(/,/g, '');

                total += parseFloat(x);

            }
            console.log("delete", total);

            // let total2 = 0;
            // for (var i = 0; i < document.getElementsByName("ebio_cc4_hidden[]").length; i++) {
            //     var hidden_value2 = document.getElementsByName("ebio_cc4_hidden[]")[i].value;
            //     console.log('hidden_value',hidden_value2);
            //     x = hidden_value2.replace(/,/g, '');

            //     total2 += parseFloat(x);
            // }

            // var ftotal = total + total2;
            // console.log("validation", ftotal);

        document.getElementById("total").innerHTML = (total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        // console.log("delete", ftotal);


            // document.getElementById("row_input" + no + "").outerHTML = "";

            // document.getElementById("jumlah_row_hidden" + (no - 1)).remove();
            // document.getElementById("new_syarikat_hidden" + (no - 1)).remove();
        }
</script>

    <script>
        $(document).ready(function() {
            $('.field input').keyup(function() {

                var empty = false;
                $('.field input').each(function() {
                    if ($(this).val().length == 0) {
                        empty = true;
                    }
                });

                if (empty) {
                    $('.actions input').attr('disabled', 'disabled');
                } else {
                    $('.actions input').attr('disabled', false);
                }
            });
        });
    </script>
        <script>
            document.getElementById("myForm").onsubmit = function() {commas()};
            function commas() {

                var x = $('#ebio_cc4'+ key).val();
                x = x.replace(/,/g, '');
                x = parseFloat(x, 10);
                $('#ebio_cc4'+key).val(x);



                return true;

            };



        </script>
    <script>
        $(function() {
            let total = 0;
            for (var i = 0; i < document.getElementsByName("ebio_cc4[]").length; i++) {
                var hidden_value = document.getElementsByName("ebio_cc4[]")[i].value;
                // console.log(hidden_value);
                x = hidden_value.replace(/,/g, '');

                // console.log('hidden_value',hidden_value);
                total += parseFloat(x);
            }
            console.log("initial", total);
            document.getElementById("total").innerHTML = (total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });


        function add_row() {
            // var seq = $seq;
            // seq += 1
            var new_syarikat = document.getElementById("new_syarikat[]").value;
            var new_jumlah = document.getElementById("new_jumlah[]").value;
            // x = new_jumlah.replace(/,/g, '');


            var nama_syarikat = document.getElementById("new_syarikat[]").options[document.getElementById("new_syarikat[]")
                .selectedIndex].text;
            var table = document.getElementById("data_table");
            var table_len = (table.rows.length) - 2;
            // console.log(parseFloat(new_jumlah).toFixed(2));

            // var newnjumlah = new_jumlah.toFixed(2);

            var row = table.insertRow(table_len).outerHTML = "<tr id='row" + table_len +
                "'><td style='text-align:center' class='count'></td><td id='syarikat_row" +
                table_len + "' style='text-align:center' >" + nama_syarikat + "</td><td id='jumlah_row" + table_len +
                "' style='text-align:center'>" + (parseFloat(new_jumlah).toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +
                "</td><td><input type='hidden' id='jumlah_row'" + table_len +
                " name='ebio_cc4[]' value=" + new_jumlah +
                "> <input type='button' value='Hapus' style='display: block; margin: auto' class='delete btn btn-danger' onclick='delete_row(" +
                table_len + ")'></td></tr>";

            var table_input = document.getElementById("cc3_4");
            var table_input_len = (table_input.rows.length);
            var row_input = table_input.insertRow(table_input_len).outerHTML =
                "<tr id='row_input" +  table_len + "'><td><input type='hidden' id='ebio_cc4_hidden" +
                table_input_len +
                "' name='ebio_cc4_hidden[]' value=" + new_jumlah +
                "><input type='hidden' id='new_syarikat_hidden" + table_input_len +
                "' name='new_syarikat_hidden[]' value=" + new_syarikat +
                "></td></tr>";

            document.getElementById("new_syarikat[]").value = "";
            document.getElementById("new_jumlah[]").value = "";

            // console.log("tl",table_len);
            // console.log("til",(table_input_len + table_len));

            let total = 0;
            //  console.log(total2);

            for (var i = 0; i < document.getElementsByName("ebio_cc4[]").length; i++) {
                var hidden_value = document.getElementsByName("ebio_cc4[]")[i].value;
                // console.log('hidden_value',hidden_value);
                x = hidden_value.replace(/,/g, '');

                total += parseFloat(x);
            }




            // let total2 = 0;
            // for (var i = 0; i < document.getElementsByName("ebio_cc4_hidden[]").length; i++) {
            //     var hidden_value = document.getElementsByName("ebio_cc4_hidden[]")[i].value;
            //     x = hidden_value.replace(/,/g, '');

            //     total2 += parseFloat(x);
            // }
            // console.log("add row1", total);

            // var ftotal = total + total2;

            // console.log("add row full total", ftotal);
            document.getElementById("total").innerHTML = (total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function delete_row(no) {
            document.getElementById("row" + no + "").remove();
            document.getElementById("row_input" + (no)).remove();

            // document.getElementById("ebio_cc4_hidden" + (no - 2)).remove();
            // document.getElementById("new_syarikat_hidden" + (no - 2)).remove();
            // console.log("tild", no);
            // console.log("tld",no);
            let total = 0;

        for (var i = 0; i < document.getElementsByName("ebio_cc4[]").length; i++) {
                var hidden_value = document.getElementsByName("ebio_cc4[]")[i].value;
                // console.log('hidden_value',hidden_value);
                x = hidden_value.replace(/,/g, '');

                total += parseFloat(x);
            }

        //     let total2 = 0;
        // for (var i = 0; i < document.getElementsByName("ebio_cc4_hidden[]").length; i++) {
        //         var hidden_value2 = document.getElementsByName("ebio_cc4_hidden[]")[i].value;
        //         console.log('hidden_value',hidden_value2);
        //         x = hidden_value2.replace(/,/g, '');

        //         total2 += parseFloat(x);
        //     }

        //     var ftotal = total + total2;
        //     console.log("validation", ftotal);

        document.getElementById("total").innerHTML = (total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");



        }
    </script>
    {{-- <script>
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
    </script> --}}
    <script>
        document.addEventListener('keypress', function(e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                return false;
            }

        });
    </script>
@endsection
