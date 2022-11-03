@extends('layouts.main')

@section('content')
    </style>
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
                    <h4 class="page-title">Papar Penyata</h4>
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
            <div class="tab" style="margin-left:2%">
                {{-- <button class="tablinks" onclick="openInit(event, 'All')" id="defaultOpen">Penyata Bulanan
                Terkini</button> --}}
                <a style="color:black; border-radius:unset; font-size:14px; background-color:rgb(255, 255, 255)"
                    class="btn btn-work tablinks" onclick="openInit(event, 'All')" id="defaultOpen">Penyata Bulanan
                    Terkini</a>
                {{-- <button class="tablinks" onclick="openInit(event, 'One')"> --}}
                <a href="{{ route('admin.5penyatabelumhantarbio') }}"
                    style="color:black; border-radius:unset; font-size:14px; margin-left:-0.315rem;"
                    class="btn btn-work tablinks" onclick="openInit(event, 'One')">Penyata Bulanan Belum Hantar</a>
                {{-- </button> --}}
                <a href="{{ route('admin.5penyatakemaskinibio') }}"
                style="color:black; border-radius:unset; font-size:14px; margin-left:-0.315rem;"
                class="btn btn-work tablinks" onclick="openInit(event, 'BioTab')">Kemaskini Penyata Biodiesel</a>

            </div>
            <div class="card" style="margin-right:2%; margin-left:2%">

                <div id="All" class="tabcontent">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>



                        <div class="pl-3">

                            <div class=" text-center">
                                <div id="title">
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Penyata Bulanan Biodiesel - MPOB(EL) <br> </h3>
                                    <h5 style="color: rgb(39, 80, 71); ">Senarai Penyata untuk Paparan dan Cetakan</h5>
                                <h6 id="tarikh">Bulan: <span id="Bulan"></span>&nbsp   Tahun: <span id="Tahun"></span></h6>

                                </div>

                                <script>
                                    var dt = new Date();
                                    document.getElementById("Bulan").innerHTML = (("0" + (dt.getMonth())).slice(-2)) ;

                                    var dt = new Date();
                                    document.getElementById("Tahun").innerHTML = (dt.getFullYear());
                                </script>
                                {{-- <p>Maklumat Kilang</p> --}}
                            </div>
                            <hr>


                            <section class="section">
                                <div class="card">
                                    <div class=" dropdown">
                                        <button class="btn btn-secondary dropdown-toggle"
                                            style="background-color: rgb(238, 70, 70); margin-right:20px" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Kilang Biodiesel
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if (auth()->user()->sub_cat)
                                                @foreach (json_decode(auth()->user()->sub_cat) as $cat)

                                                    @if ($cat == 'PL91')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.6penyatapaparcetakbuah') }}">Kilang
                                                            Buah</a>
                                                    @endif
                                                    @if ($cat == 'PL101')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.6penyatapaparcetakpenapis') }}">Kilang
                                                            Penapis</a>
                                                    @endif
                                                    @if ($cat == 'PL102')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.6penyatapaparcetakisirung') }}">Kilang
                                                            Isirung</a>
                                                    @endif
                                                    @if ($cat == 'PL104')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.6penyatapaparcetakoleo') }}">Kilang
                                                            Oleokimia</a>
                                                    @endif
                                                    @if ($cat == 'PL111')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.6penyatapaparcetaksimpanan') }}">Pusat
                                                            Simpanan</a>
                                                    @endif
                                                    @if ($cat == 'PLBIO')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.6penyatapaparcetakbio') }}">Kilang
                                                            Biodiesel</a>
                                                    @endif
                                                @endforeach
                                            @else
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.6penyatapaparcetakbuah') }}">Kilang
                                                    Buah</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.6penyatapaparcetakpenapis') }}">Kilang
                                                    Penapis</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.6penyatapaparcetakisirung') }}">Kilang
                                                    Isirung</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.6penyatapaparcetakoleo') }}">Kilang
                                                    Oleokimia</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.6penyatapaparcetaksimpanan') }}">Pusat
                                                    Simpanan</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.6penyatapaparcetakbio') }}">Kilang
                                                    Biodiesel</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('admin.6papar.bio.form') }}" method="post">
                                    @csrf

                                    <div class="table-responsive">
                                        <div id="tblData">
                                        <table id="examplebio" class="table table-bordered"
                                            style="width: 100%;">
                                            <thead>
                                                <tr style="background-color: #e9ecefbd">
                                                    <th style="width:7%; vertical-align: middle">Papar?
                                                        <input name="select-all" id="select-all" type="checkbox" required
                                                        value=""></th>
                                                        <th style="width: 7%; vertical-align: middle">Sudah Cetak?<br></th>

                                                    <th>No. Lesen<br></th>
                                                    <th>Nama Premis</th>
                                                    {{-- <th>Kod Pegawai</th> --}}
                                                    <th>Emel Pegawai</th>
                                                    <th>No. Telefon Kilang</th>
                                                    <th>Tarikh Hantar</th>


                                                    {{-- <th>No. Siri</th> --}}
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr style="background-color: #e9ecefbd">
                                                    <th style="width: 7%">Papar?</th>
                                                    <th style="width: 7%">Sudah Cetak?<br></th>
                                                    <th>No. Lesen<br></th>
                                                    <th>Nama Premis</th>
                                                    {{-- <th>Kod Pegawai</th> --}}
                                                    <th>Emel Pegawai</th>
                                                    <th>No. Telefon Kilang</th>
                                                    <th>Tarikh Hantar</th>

                                                    {{-- <th>No. Siri</th> --}}
                                                </tr>
                                            </tfoot>
                                            <tbody style="word-break: break-word; font-size:12px">
                                                 @foreach ($users as $data)
                                                    <tr>
                                                        <td class="text-center">
                                                            <input name="papar_ya[]" type="checkbox" required id="checkbox-1"
                                                                value="{{ $data->ebio_reg }}">&nbspYa
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $data->ebio_flagcetak ?? 'N' }}
                                                        </td>

                                                        <td>{{ $data->e_nl ?? '-' }}</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_np ?? '-' }}</td>
                                                        {{-- <td>{{ $data->kodpgw }}</td> --}}

                                                        <td>{{ $data->e_email ?? '-' }}</td>
                                                        <td>{{ $data->e_notel ?? '-' }}</td>
                                                        <td>{{ $data->sdate }}</td>

                                                        {{-- <td>{{ $data->nosiri }}</td> --}}



                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                        {{-- </div> --}}
                                        <div class="text-left col-md-8">
                                            <button type="submit" class="btn btn-primary ">Papar</button>



                                        </div>
                                    </div>
                                    {{-- <div class="text-left col-md-8">
                                        <button type="submit" class="btn btn-primary ">Papar</button>


                                    </div> --}}
                                </form>
                                </div>
                            </section>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('scripts')
    {{-- <script>
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
    </script> --}}
    <script>
        function openInit(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

    <script>
            $(function(){

        var requiredCheckboxes = $(':checkbox[required]');

        requiredCheckboxes.change(function(){

            if(requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            }

            else {
                requiredCheckboxes.attr('required', 'required');
            }
        });

        });
    </script>
    <script>

        $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#examplebio tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
        });

        // DataTable
            var table = $('#examplebio').DataTable({

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
                        $('xf', style).find("alignment[horizontal='center']").attr("wrapText", "1");
                        $('row', sheet).first().attr('ht', '40').attr('customHeight', "1");
                        },

                        filename: 'Penyata Bulan',

                        messageTop: function(doc) {
                            return $('#tarikh').text()
                        },

                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                        pageSize: 'TABLOID',
                        className: "prodpdf",

                        exportOptions: {
                            columns: [1,2,3,4,5]
                        },
                        title: function(doc) {
                                return $('#title').text() + $ ('#tarikh').text()
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

                        filename: 'Penyata Bulan',

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

    <script>
        // Listen for click on toggle checkbox
        $('#select-all').click(function(event) {
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>

@endsection
