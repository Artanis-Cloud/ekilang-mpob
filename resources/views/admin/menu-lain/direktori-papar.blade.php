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
                    <h4 class="page-title">Direktori</h4>
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
                            <h4 style="color: rgb(39, 80, 71); margin-top:3%">Senarai Direktori</h4>

                        </div>
                        <hr>
                        <div class="row col-md-12" style=" float:right; margin-left:85%">

                            <div class="text-left col-md-8">
                                <button class="btn btn-primary" onclick="exportTableToExcel('tblData')">Cetak</button>


                            </div>
                        </div>


                            <div class="card-body">
                                <div class="container center ">
                                    <table id="tblData" style="margin-left:2%; margin-top:-7%">

                                        @foreach ($query as $data)
                                            <tr style="margin-left:2%">
                                                <td><b>{{ $loop->iteration }}.</b></td>
                                                <td colspan=3><b>{{ $data->e_np }}</b></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp</td>
                                                <td>Postal add </td>
                                                <td>:</td>
                                                <td>{{ $data->e_as1 }}</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td>{{ $data->e_as2 }}</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td>{{ $data->e_as3 }}</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp</td>
                                                <td>Factory add</td>
                                                <td>:</td>
                                                <td>{{ $data->e_ap1 }}</td>
                                            </tr>

                                            <tr>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td>{{ $data->e_ap2 }}</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td>{{ $data->e_ap3 }}</td>
                                            </tr>

                                            <tr>
                                                <td>&nbsp</td>
                                                <td>Tel. No. </td>
                                                <td>:</td>
                                                <td>{{ $data->e_notel }}</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp</td>
                                                <td>Fax No.</td>
                                                <td>:</td>
                                                <td>{{ $data->e_nofax }}</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp</td>
                                                <td>E-mail add </td>
                                                <td>:</td>
                                                <td>{{ $data->e_email }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan=4>&nbsp</td>
                                            </tr>
                                        @endforeach
                                        <br>
                                    </table>




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
    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'direktori.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>
@endsection
