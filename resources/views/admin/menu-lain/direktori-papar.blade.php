@extends($layout)

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css" />

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> --}}

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-md-12" style="margin-top:-3%">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: rgb(63, 60, 60) !important;"
                                                            onMouseOver="this.style.color='lightblue'"
                                                            onMouseOut="this.style.color='black'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #fff03e  !important;">
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
                        {{-- <div class="card-header border-bottom">
                            <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                        </div> --}}

                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4 col-12"> --}}
                                <div class="pl-3">

                                    <div class="text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Direktori</h3>

                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>
                                    <div class="row" style=" float:right">

                                        <div class="text-left col-md-8">
                                            <button class="btn btn-primary" onclick="exportTableToExcel('tblData')">Cetak</button>


                                        </div>
                                </div>
                                <br>
                                    <table id="tblData">

                                        @foreach ($query as $data)
                                            <tr>
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




                                {{-- <div class="row form-group">



                                    <div class="text-right col-md-12  ">
                                        {{-- <button type="button" class="btn btn-primary " data-toggle="modal"
                                            style="float: right" data-target="#confirmation">Direktori</button> --}}
                                {{-- <button type="submit">YA</button>
                                    </div>

                                </div> --}}



                                <button onclick="exportTableToExcel('tblData')">Export Table Data To Excel File</button>


                            </div>



                        </div>

                        {{-- </div> --}}
                    </div>
                    <br>
                    <br>







    </section><!-- End Hero -->




    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>


    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "language": {
                    "lengthMenu": "Memaparkan _MENU_ rekod per halaman",
                    "zeroRecords": "Maaf, tiada rekod.",
                    "info": "Memaparkan halaman _PAGE_ dari _PAGES_",
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

        $(window).on('changed', (e) => {
            // if($('#example').DataTable().clear().destroy()){
            // $('#example').DataTable();
            // }
        });

        // document.getElementById("form_type").onchange = function() {
        //     myFunction()
        // };

        // function myFunction() {
        //     console.log('asasa');
        //     table.clear().draw();
        // }
    </script>
    <script>
        function exportTableToExcel(tableID, filename = '') {
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            filename = filename ? filename + '.xls' : 'excel_data.xls';

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
