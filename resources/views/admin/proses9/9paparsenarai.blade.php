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

            <div class="card" style="margin-right:2%; margin-left:2%">


                <div class="card-body">
                    <div class="pl-3">
                        <div class="row">
                            <div class="col-1 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i
                                        class="fa fa-angle-left">&ensp;</i>Kembali</a>
                            </div>
                        </div>

                        <div class=" text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Paparan Senarai Penyata Bulan Terdahulu
                            </h3>
                            {{-- <p>Maklumat Kilang</p> --}}
                            <h5 style="color: rgb(39, 80, 71); font-size:14px;">Bulan: &nbsp;<b>
                                    @if ($bulan1 == '01')
                                        JANUARI
                                    @elseif ($bulan1 == '02')
                                        FEBRUARI
                                    @elseif ($bulan1 == '03')
                                        MAC
                                    @elseif ($bulan1 == '04')
                                        APRIL
                                    @elseif ($bulan1 == '05')
                                        MEI
                                    @elseif ($bulan1 == '06')
                                        JUN
                                    @elseif ($bulan1 == '07')
                                        JULAI
                                    @elseif ($bulan1 == '08')
                                        OGOS
                                    @elseif ($bulan1 == '09')
                                        SEPTEMBER
                                    @elseif ($bulan1 == '10')
                                        OKTOBER
                                    @elseif ($bulan1 == '11')
                                        NOVEMBER
                                    @elseif ($bulan1 == '12')
                                        DISEMBER
                                    @endif &nbsp;
                                </b> Tahun:
                                &nbsp;<b>{{ $tahun1 }}</b> </h5>

                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>

                        @if ($sektor == 'PL91')
                            <section class="section">
                                <div class="card">
                                    <form action="{{ route('admin.9papar-terdahulu-buah.form') }}" method="post">
                                        @csrf
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-bordered" style="width: 100%;">
                                                <thead>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                {{-- <tfoot>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot> --}}
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit"
                                                                    value="{{ $data->e91_nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->e_nl }}</td>
                                                            <td>{{ $data->e_np }}</td>
                                                            <td>{{ $data->kodpgw }}</td>
                                                            <td>{{ $data->nosiri }}</td>
                                                            <td>{{ $data->sdate }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary" id="submit" disabled="true">Papar</button> --}}
                                                <button type="submit" class="btn btn-primary" id="submit">Papar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        @elseif ($sektor == 'PL101')
                            <section class="section">
                                <div class="card">
                                    <form action="{{ route('admin.9papar-terdahulu-penapis.form') }}" method="post">
                                        @csrf
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-striped table-bordered"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit"
                                                                    value="{{ $data->e101_nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->e_nl }}</td>
                                                            <td>{{ $data->e_np }}</td>
                                                            <td>{{ $data->kodpgw }}</td>
                                                            <td>{{ $data->nosiri }}</td>
                                                            <td>{{ $data->sdate }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary " id="submit" disabled="true">Papar</button> --}}

                                                <button type="submit" class="btn btn-primary" id="submit">Papar</button>


                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        @elseif ($sektor == 'PL102')
                            <section class="section">
                                <div class="card">
                                    <form action="{{ route('admin.9papar-terdahulu-isirung.form') }}" method="post">
                                        @csrf
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-striped table-bordered"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit"
                                                                    value="{{ $data->e102_nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->e_nl }}</td>
                                                            <td>{{ $data->e_np }}</td>
                                                            <td>{{ $data->kodpgw }}</td>
                                                            <td>{{ $data->nosiri }}</td>
                                                            <td>{{ $data->sdate }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                <button type="submit" class="btn btn-primary " id="submit">Papar</button>



                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        @elseif ($sektor == 'PL104')
                            <section class="section">
                                <div class="card">
                                    <form action="{{ route('admin.9papar-terdahulu-oleo.form') }}" method="post">
                                        @csrf
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-striped table-bordered"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox" id="toggle" class="checkit"
                                                                    value="{{ $data->e104_nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->e_nl }}</td>
                                                            <td>{{ $data->e_np }}</td>
                                                            <td>{{ $data->kodpgw }}</td>
                                                            <td>{{ $data->nosiri }}</td>
                                                            <td>{{ $data->sdate }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                <button type="submit" class="btn btn-primary " id="submit">Papar</button>



                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        @elseif ($sektor == 'PL111')
                            <section class="section">
                                <div class="card">
                                    <form action="{{ route('admin.9papar-terdahulu-simpanan.form') }}" method="post">
                                        @csrf
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-striped table-bordered"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox" id="papar" class="checkit"
                                                                    value="{{ $data->e07_nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->e_nl }}</td>
                                                            <td>{{ $data->e_np }}</td>
                                                            <td>{{ $data->kodpgw }}</td>
                                                            <td>{{ $data->nosiri }}</td>
                                                            <td>{{ $data->sdate }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                <button type="submit" class="btn btn-primary " id="submit" >Papar</button>


                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            {{-- @elseif ($sektor == 'PL101')
                        <section class="section">
                            <div class="card">
                                <form action="{{ route('admin.9papar-terdahulu-penapis.form') }}" method="post">
                                    @csrf
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered"
                                            style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Papar</th>
                                                    <th>No Lesen</th>
                                                    <th>Nama Premis</th>
                                                    <th>Kod Pegawai</th>
                                                    <th>No Siri</th>
                                                    <th>Tarikh Hantar</th>
                                                </tr>
                                            </thead>
                                            <tbody style="word-break: break-word; font-size:12px">
                                                @foreach ($users as $data)
                                                    <tr>
                                                        <td>
                                                            <input name="papar_ya[]" type="checkbox"
                                                                value="{{ $data->e101_nobatch }}">&nbspYa
                                                        </td>
                                                        <td>{{ $data->e_nl }}</td>
                                                        <td>{{ $data->e_np }}</td>
                                                        <td>{{ $data->kodpgw }}</td>
                                                        <td>{{ $data->nosiri }}</td>
                                                        <td>{{ $data->sdate }}</td>

                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                        <div class="text-left col-md-8">
                                            <button type="submit" class="btn btn-primary ">Papar</button>



                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section> --}}
                        @endif
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
            $('#example22').DataTable({
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
    {{-- <script>
        $(function() {

            var requiredCheckboxes = $(':checkbox[required]');

            requiredCheckboxes.change(function() {

                if (requiredCheckboxes.is(':checked')) {
                    requiredCheckboxes.removeAttr('required');
                } else {
                    requiredCheckboxes.attr('required', 'required');
                }
            });

        });
    </script> --}}

    {{-- <script>


        var check_opt = document.getElementsByClassName('checkit');
        console.log(check_opt);
        var btn = document.getElementById('submit');

        function detect() {
            btn.disabled = true;
            for (var index = 0; index < check_opt.length; ++index) {
                console.log(index);
                if (check_opt[index].checked == true) {
                    console.log(btn);
                    btn.disabled = false;
                }
            }
        }
        window.onload = function() {
            for (var i = 0; i < check_opt.length; i++) {
                check_opt[i].addEventListener('click', detect)
            }
            // when unchecked or checked, run the function
        }
    </script> --}}
@endsection
