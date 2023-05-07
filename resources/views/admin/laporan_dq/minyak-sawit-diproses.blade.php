@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <head>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    </head>
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
                    <div class="card"><br>
                        <div class=" text-center">
                            {{-- <h2 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">Hebahan 10hb - Biodiesel diproses</h2> --}}
                            <h3 id="title" style="color: rgb(39, 80, 71); margin-top:1%; margin-bottom:1%">
                                <a class="noScreen">Hebahan 10hb -</a>Minyak Sawit Diproses
                            </h3>
                            {{-- <h5 style="color: rgb(39, 80, 71); margin-bottom:1%">Stok Akhir</h5> --}}
                        </div>
                        <hr>

                        <div class="text-left col-md-7 mx-3">


                            <a href="{{ route('admin.tambah.proses') }}" class="btn btn-primary"
                                style="float: left"> Tambah Proses</a>
                        </div>
                        <div class="row">
                            <div class="col-12 mr-auto ml-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="valproses" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Bil.</th>
                                                        <th>Tahun</th>
                                                        <th>Bulan</th>
                                                        <th>CPO MSIA</th>
                                                        <th>PPO MSIA</th>
                                                        <th>CPKO MSIA</th>
                                                        <th>PPKO MSIA</th>
                                                        <th>Kemaskini</th>
                                                        <th>Padam</th>
                                                        <th>Port</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr style="background-color: #e9ecefbd">

                                                        <th>Bil.</th>
                                                        <th>Tahun</th>
                                                        <th>Bulan</th>
                                                        <th>CPO MSIA</th>
                                                        <th>PPO MSIA</th>
                                                        <th>CPKO MSIA</th>
                                                        <th>PPKO MSIA</th>
                                                        <th>Kemaskini</th>
                                                        <th>Padam</th>
                                                        <th>Port</th>
                                                    </tr>
                                                </tfoot>

                                                <tbody>

                                                    @foreach ($hebahan as $data)
                                                        <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $data->tahun }}</td>
                                                                @if ($data->bulan == 1)
                                                                <td>Januari</td>
                                                            @elseif ($data->bulan == 2)
                                                                <td>Februari</td>
                                                            @elseif ($data->bulan == 3)
                                                                <td>Mac</td>
                                                            @elseif ($data->bulan == 4)
                                                                <td>April</td>
                                                            @elseif ($data->bulan == 5)
                                                                <td>Mei</td>
                                                            @elseif ($data->bulan == 6)
                                                                <td>Jun</td>
                                                            @elseif ($data->bulan == 7)
                                                                <td>Julai</td>
                                                            @elseif ($data->bulan == 8)
                                                                <td>Ogos</td>
                                                            @elseif ($data->bulan == 9)
                                                                <td>September</td>
                                                            @elseif ($data->bulan == 10)
                                                                <td>Oktober</td>
                                                            @elseif ($data->bulan == 11)
                                                                <td>November</td>
                                                            @elseif ($data->bulan == 12)
                                                                <td>Disember</td>
                                                            @endif
                                                            <td style="text-align: right">{{ number_format($data->cpo_msia ?? 0,2)  }}</td>
                                                            <td style="text-align: right">{{  number_format($data->ppo_msia ?? 0,2)  }}</td>
                                                            <td style="text-align: right">{{  number_format($data->cpko_msia ?? 0,2)  }}</td>
                                                            <td style="text-align: right">{{  number_format($data->ppko_msia ?? 0,2)  }}</td>
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
                                                                        <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>

                                                                    </a>


                                                                </div>

                                                            </td>
                                                            <td> <div class="icon" style="text-align: center">
                                                                <a href="{{ route('admin.port.minyak.sawit.process', $data->id) }}" type="button" >
                                                                    <i class="fas fa-arrow-circle-up" style="color: #31bc6d;font-size:18px"></i>

                                                                </a>


                                                            </div></td>
                                                        </tr>

                                                        <div class="modal fade" id="next2{{ $data->id }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                                        <a href="{{ route('admin.delete.minyak.sawit.diproses', [$data->id]) }}"
                                                                            type="button" class="btn btn-light-secondary" style="color: #275047; background-color: #a1929238">

                                                                            <i class="bx bx-x d-block d-sm-none" ></i>
                                                                            <span class="d-none d-sm-block" >Ya</span>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </tbody>

                                            </table>


                                            @foreach ($hebahan as $data)

                                            <div class="col-md-6 col-12">

                                                <!--scrolling content Modal -->
                                                <div class="modal fade" id="modal{{ $data->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div id="myfrm">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content" id="tb_Logbook">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                        Kemaskini Biodiesel diproses </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.edit.minyak.sawit.diproses', [$data->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <label class="required">Tahun</label>
                                                                            <div class="form-group">
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-control" id="tahun"
                                                                                        name="tahun">
                                                                                        <option selected value="{{ $data->tahun }}">{{ $data->tahun }}</option>
                                                                                            @for ($i = 2003; $i <= date('Y'); $i++)
                                                                                            <option >{{ $i }}</option>
                                                                                        @endfor

                                                                                    </select>
                                                                                </fieldset>
                                                                                {{-- <input type="text" name='e101_d3'
                                                                                                            class="form-control"
                                                                                                            value="{{ $data->kodsl[0]->catname }}"
                                                                                                            readonly> --}}

                                                                            </div>
                                                                            <label class="required">Bulan </label>
                                                                            <div class="form-group">
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-control" id="bulan"
                                                                                        name="bulan">
                                                                                            <option selected hidden disabled value="">Sila Pilih Bulan</option>
                                                                                            <option {{ ($data->bulan == '01') ? 'selected' : '' }} value="01">Januari</option>
                                                                                            <option {{ ($data->bulan == '02') ? 'selected' : '' }}  value="02">Februari</option>
                                                                                            <option {{ ($data->bulan == '03') ? 'selected' : '' }}  value="03">Mac</option>
                                                                                            <option {{ ($data->bulan == '04') ? 'selected' : '' }}  value="04">April</option>
                                                                                            <option {{ ($data->bulan == '05') ? 'selected' : '' }}  value="05">Mei</option>
                                                                                            <option {{ ($data->bulan == '06') ? 'selected' : '' }}  value="06">Jun</option>
                                                                                            <option {{ ($data->bulan == '07') ? 'selected' : '' }}  value="07">Julai</option>
                                                                                            <option {{ ($data->bulan == '08') ? 'selected' : '' }}  value="08">Ogos</option>
                                                                                            <option {{ ($data->bulan == '09') ? 'selected' : '' }}  value="09">September</option>
                                                                                            <option {{ ($data->bulan == '10') ? 'selected' : '' }}  value="10">Oktober</option>
                                                                                            <option {{ ($data->bulan == '11') ? 'selected' : '' }}  value="11">November</option>
                                                                                            <option {{ ($data->bulan == '12') ? 'selected' : '' }}  value="12">Disember</option>
                                                                                    </select>
                                                                                </fieldset>

                                                                            </div>
                                                                            <label class="required">CPO MSIA</label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='cpo_msia'
                                                                                    onkeypress="return isNumberKey(event)"
                                                                                    class="form-control" id='cpo_msia' oninput="validate_two_decimal(this)"
                                                                                    value="{{ old('cpo_msia') ?? number_format($data->cpo_msia , 2) }}">
                                                                            </div>
                                                                            <label class="required">PPO MSIA</label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='ppo_msia'
                                                                                    onkeypress="return isNumberKey(event)"
                                                                                    class="form-control" id='ppo_msia' oninput="validate_two_decimal(this)"
                                                                                    value="{{ old('ppo_msia') ?? number_format($data->ppo_msia , 2) }}">
                                                                            </div>
                                                                            <label class="required">CPKO MSIA</label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='cpko_msia'
                                                                                    onkeypress="return isNumberKey(event)"
                                                                                    class="form-control" id='cpko_msia' oninput="validate_two_decimal(this)"
                                                                                    value="{{ old('cpko_msia') ?? number_format($data->cpko_msia , 2) }}">
                                                                            </div>
                                                                            <label class="required">PPKO MSIA</label>
                                                                            <div class="form-group">
                                                                                <input type="text" name='ppko_msia'
                                                                                    onkeypress="return isNumberKey(event)"
                                                                                    class="form-control" id='ppko_msia' oninput="validate_two_decimal(this)"
                                                                                    value="{{ old('ppko_msia') ?? number_format($data->ppko_msia , 2) }}">
                                                                            </div>
                                                                        </div>


                                                                </div>

                                                                <div class="modal-footer noPrint" style="justify-content: normal">
                                                                    <div class="" style="margin-right: auto">
                                                                    <div class="dt-button buttons-excel buttons-html5"    onclick=" myPrint('myfrm')"
                                                                        style="background-color:white; color: #f90a0a; float: left; ">
                                                                        <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                                                                    </div>

                                                                    </div>
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-dismiss="modal">
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

                                            </div>

                                        @endforeach
                                        </div>
                                    </div>
                                </div>
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
    function myPrint(myfrm) {
        var hashid = "#"+ myfrm;
            var tagname =  $(hashid).prop("tagName").toLowerCase() ;
            var attributes = "";
            var attrs = document.getElementById(myfrm).attributes;
              $.each(attrs,function(i,elem){
                attributes +=  " "+  elem.name+" ='"+elem.value+"' " ;
              })
            var divToPrint= $(hashid).html() ;
            var head = "<html><head>"+ $("head").html() + "</head>" ;
            var allcontent = head + "<body  onload='window.print()' >"+ "<" + tagname + attributes + ">" +  divToPrint + "</" + tagname + ">" +  "</body></html>"  ;
            var newWin=window.open('','Print-Window');
            newWin.document.open();
            newWin.document.write(allcontent);
            newWin.document.close();
           setTimeout(function(){newWin.close();},10);
    }

    // function myPrint(myfrm)  {
    //     var divElements = $('.c3 .nicEdit-main').html();
    //     var divToPrint = document.getElementById('myfrm');
    //     var popupWin = window.open('', '_blank', 'width=800,height=500');
    //     popupWin.document.open();
    //     popupWin.document.write('<html><body onload="window.print()">' + divElements + '</html>');
    //     popupWin.document.close();
    // }
</script>


<script>

    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#valproses tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
        });

        // DataTable
            var table = $('#valproses').DataTable({

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

                        exportOptions: {
                            columns: [1,2,3,4,5,6]
                        },
                        title: function(doc) {
                            return $('#title').text()
                        },


                        customize: function(xlsx){
                            // see built in styles here: https://datatables.net/reference/button/excelHtml5
                            // take a look at "buttons.html5.js", search for "xl/styles.xml"
                            //styleSheet.childNodes[0].childNodes[0] ==> number formats  <numFmts count="6"> </numFmts>
                            //styleSheet.childNodes[0].childNodes[1] ==> fonts           <fonts count="5" x14ac:knownFonts="1"> </fonts>
                            //styleSheet.childNodes[0].childNodes[2] ==> fills           <fills count="6"> </fills>
                            //styleSheet.childNodes[0].childNodes[3] ==> borders         <borders count="2"> </borders>
                            //styleSheet.childNodes[0].childNodes[4] ==> cell style xfs  <cellStyleXfs count="1"> </cellStyleXfs>
                            //styleSheet.childNodes[0].childNodes[5] ==> cell xfs        <cellXfs count="67"> </cellXfs>
                            //on the last line we have the 67 currently built in styles (0 - 66), see link above

                                    var sSh = xlsx.xl['styles.xml'];
                                    var lastXfIndex = $('cellXfs xf', sSh).length - 1;

                                    var n1 = '<numFmt formatCode="##0.00" numFmtId="300"/>';
                                    var s1 = '<xf numFmtId="300" fontId="0" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/>';
                                    var s2 = '<xf numFmtId="0" fontId="2" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1">'+
                                    '<alignment horizontal="center"/></xf>';
                                    sSh.childNodes[0].childNodes[0].innerHTML += n1;
                                    sSh.childNodes[0].childNodes[5].innerHTML += s1 + s2;

                                    var fourDecPlaces = lastXfIndex + 1;
                                    var greyBoldCentered = lastXfIndex + 2;

                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                    //numeric columns except for rate get thousand separators
                                    $('row c[r^="A"]', sheet).attr( 's', "25" );
                                    $('row c[r^="B"]', sheet).attr( 's', "25" );
                                    $('row c[r^="C"]', sheet).attr( 's', fourDecPlaces );
                                    $('row c[r^="D"]', sheet).attr( 's', fourDecPlaces );
                                    $('row c[r^="E"]', sheet).attr( 's', fourDecPlaces );
                                    $('row c[r^="F"]', sheet).attr( 's', fourDecPlaces );


                                    $('row:eq(0) c', sheet).attr( 's', greyBoldCentered );  //grey background bold and centered, as added above
                                    $('row:eq(1) c', sheet).attr( 's', greyBoldCentered );  //grey background bold
                        },

                        filename: 'Hebahan 10hb - Minyak Sawit Diproses',



                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                        pageSize: 'TABLOID',
                        className: "prodpdf",

                        exportOptions: {
                            columns: [1,2,3,4,5,6]
                        },
                        title: function(doc) {
                                return $('#title').text()
                        },

                        customize: function (doc) {
                        var rowCount = doc.content[1].table.body.length;
                            for (i = 1; i < rowCount; i++) {
                            doc.content[1].table.body[i][2].alignment = 'right';
                            doc.content[1].table.body[i][3].alignment = 'right';
                            doc.content[1].table.body[i][4].alignment = 'right';
                            doc.content[1].table.body[i][5].alignment = 'right';
                            };

                            // doc.content[1].margin = [ 100, 0, 100, 0 ]
                            doc.content[1].table.body[0].forEach(function(h) {
                            h.fillColor = '#0a7569';
                            });

                        },

                        filename: 'Hebahan 10hb - Minyak Sawit Diproses',

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
@endsection
