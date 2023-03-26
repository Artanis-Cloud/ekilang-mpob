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
                            <h3 id="title" style="color: rgb(39, 80, 71); margin-bottom:1%">
                                Paparan Senarai Penyata Bulan Terdahulu
                            @if ($sumber == 'ekilang')
                                eKilang
                            @else
                                PLEID

                            @endif &nbsp;
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
                        <form action="{{ route('admin.papar.penyata') }}" method="post">
                            @csrf
                        @if ($sumber == 'ekilang')

                        @if ($sektor == 'PL91')
                            <section class="section">
                                <div class="card">
                                    {{-- <form action="{{ route('admin.9papar-terdahulu-buah.form') }}" method="post">
                                        @csrf --}}
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-bordered" style="width: 100%;">
                                                <thead>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th style="width:7%; vertical-align: middle">Papar?
                                                            <input name="select-all" id="select-all" type="checkbox"
                                                            value=""></th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit" id="checkbox-1"
                                                                    value="{{ $data->e91_nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->e_nl }}</td>
                                                            <td style="text-transform:uppercase">{{ $data->e_np }}</td>
                                                            <td>{{ $data->kodpgw }}</td>
                                                            <td>{{ $data->nosiri }}</td>
                                                            <td>{{ $data->sdate }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary" id="submit" disabled="true">Papar</button> --}}
                                                {{-- <button type="submit" class="btn btn-primary" id="submit">Papar</button> --}}
                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </section>
                        @elseif ($sektor == 'PL101')
                            <section class="section">
                                <div class="card">
                                    {{-- <form action="{{ route('admin.9papar-terdahulu-penapis.form') }}" method="post">
                                        @csrf --}}
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-striped table-bordered"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:7%; vertical-align: middle">Papar?
                                                            <input name="select-all" id="select-all" type="checkbox"
                                                            value=""></th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="text-center">
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>

                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit" id="checkbox-1"
                                                                    value="{{ $data->e101_nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->e_nl }}</td>
                                                            <td style="text-transform:uppercase">{{ $data->e_np }}</td>
                                                            <td>{{ $data->kodpgw }}</td>
                                                            <td>{{ $data->nosiri }}</td>
                                                            <td>{{ $data->sdate }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary " id="submit" disabled="true">Papar</button> --}}

                                                {{-- <button type="submit" class="btn btn-primary" id="submit">Papar</button> --}}


                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </section>
                        @elseif ($sektor == 'PL102')
                            <section class="section">
                                <div class="card">
                                    {{-- <form action="{{ route('admin.9papar-terdahulu-isirung.form') }}" method="post">
                                        @csrf --}}
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-striped table-bordered"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:7%; vertical-align: middle">Papar?
                                                            <input name="select-all" id="select-all" type="checkbox"
                                                            value=""></th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit" id="checkbox-1{{ $data->e102_nobatch }}"
                                                                    value="{{ $data->e102_nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->e_nl }}</td>
                                                            <td style="text-transform:uppercase">{{ $data->e_np }}</td>
                                                            <td>{{ $data->kodpgw }}</td>
                                                            <td>{{ $data->nosiri }}</td>
                                                            <td>{{ $data->sdate }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary " id="submit">Papar</button> --}}



                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </section>
                        @elseif ($sektor == 'PL104')
                            <section class="section">
                                <div class="card">
                                    {{-- <form action="{{ route('admin.9papar-terdahulu-oleo.form') }}" method="post">
                                        @csrf --}}
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-striped table-bordered"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:7%; vertical-align: middle">Papar?
                                                            <input name="select-all" id="select-all" type="checkbox"
                                                            value=""></th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit" id="checkbox-1"
                                                                    value="{{ $data->e104_nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->e_nl }}</td>
                                                            <td style="text-transform:uppercase">{{ $data->e_np }}</td>
                                                            <td>{{ $data->kodpgw }}</td>
                                                            <td>{{ $data->nosiri }}</td>
                                                            <td>{{ $data->sdate }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary " id="submit">Papar</button> --}}



                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </section>
                        @elseif ($sektor == 'PL111')
                            <section class="section">
                                <div class="card">
                                    {{-- <form action="{{ route('admin.9papar-terdahulu-simpanan.form') }}" method="post">
                                        @csrf --}}
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-striped table-bordered"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:7%; vertical-align: middle">Papar?
                                                            <input name="select-all" id="select-all" type="checkbox"
                                                            value=""></th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Kod Pegawai</th>
                                                        <th>No Siri</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit" id="checkbox-1"
                                                                    value="{{ $data->e07_nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->e_nl }}</td>
                                                            <td style="text-transform:uppercase">{{ $data->e_np }}</td>
                                                            <td>{{ $data->kodpgw }}</td>
                                                            <td>{{ $data->nosiri }}</td>
                                                            <td>{{ $data->sdate }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary " id="submit" >Papar</button> --}}


                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </section>
                        @elseif ($sektor == 'PLBIO')
                            <section class="section">
                                <div class="card">
                                    {{-- <form action="{{ route('admin.9papar-terdahulu-bio.form') }}" method="post">
                                        @csrf --}}
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-striped table-bordered"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:7%; vertical-align: middle">Papar?
                                                            <input name="select-all" id="select-all" type="checkbox"
                                                            value=""></th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  id="checkbox-1"
                                                                    value="{{ $data->ebio_nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->e_nl }}</td>
                                                            <td style="text-transform:uppercase">{{ $data->e_np }}</td>
                                                            <td>{{ $data->sdate }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary ">Papar</button> --}}



                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </section>
                        @endif
                        @elseif ($sumber == 'pleid')
                        @if ($sektor == 'PL91')
                            <section class="section">
                                <div class="card">
                                    {{-- <form action="{{ route('admin.pleid.buah.multi') }}" method="post">
                                        @csrf --}}
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-bordered" style="width: 100%;">
                                                <thead>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th style="width:7%; vertical-align: middle">Papar?
                                                            <input name="select-all" id="select-all" type="checkbox"
                                                            value=""></th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>No Batch</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>No Batch</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit" id="checkbox-1"
                                                                    value="{{ $data->nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->nolesen }}</td>
                                                            <td style="text-transform:uppercase">{{ $data->namapremis }}</td>
                                                            <td>{{ $data->nobatch }}</td>
                                                            <td>{{ $data->tkhsubmit }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary" id="submit" disabled="true">Papar</button> --}}
                                                {{-- <button type="submit" class="btn btn-primary" id="submit">Papar</button> --}}
                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </section>
                        @elseif ($sektor == 'PL101')
                            <section class="section">
                                <div class="card">
                                    {{-- <form action="{{ route('admin.9papar-terdahulu-penapis.form') }}" method="post">
                                        @csrf --}}
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-bordered" style="width: 100%;">
                                                <thead>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th style="width:7%; vertical-align: middle">Papar?
                                                            <input name="select-all" id="select-all" type="checkbox"
                                                            value=""></th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>No Batch</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>No Batch</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit" id="checkbox-1"
                                                                    value="{{ $data->nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->nolesen }}</td>
                                                            <td style="text-transform:uppercase">{{ $data->namapremis }}</td>
                                                            <td>{{ $data->nobatch }}</td>
                                                            <td>{{ $data->tkhsubmit }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary " id="submit" disabled="true">Papar</button> --}}

                                                {{-- <button type="submit" class="btn btn-primary" id="submit">Papar</button> --}}


                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </section>
                        @elseif ($sektor == 'PL102')
                            <section class="section">
                                <div class="card">
                                    {{-- <form action="{{ route('admin.9papar-terdahulu-isirung.form') }}" method="post">
                                        @csrf --}}
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-bordered" style="width: 100%;">
                                                <thead>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th style="width:7%; vertical-align: middle">Papar?
                                                            <input name="select-all" id="select-all" type="checkbox"
                                                            value=""></th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>No Batch</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>No Batch</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit" id="checkbox-1" onclick="myFunction()"
                                                                    value="{{ $data->nobatch }}">&nbspYa
                                                            </td>
                                                            <td id="lesen"> <input name="e_nl" type="hidden" class="checkit"
                                                                value="{{ $data->nolesen }}">{{ $data->nolesen }}</td>
                                                            <td style="text-transform:uppercase">{{ $data->namapremis }}</td>
                                                            <td>{{ $data->nobatch }}</td>
                                                            <td>{{ $data->tkhsubmit }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary " id="submit">Papar</button> --}}



                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </section>
                        @elseif ($sektor == 'PL104')
                            <section class="section">
                                <div class="card">
                                    {{-- <form action="{{ route('admin.9papar-terdahulu-oleo.form') }}" method="post">
                                        @csrf --}}
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-bordered" style="width: 100%;">
                                                <thead>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th style="width:7%; vertical-align: middle">Papar?
                                                            <input name="select-all" id="select-all" type="checkbox"
                                                            value=""></th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>No Batch</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>No Batch</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>

                                                                <input name="papar_ya[]" type="checkbox"  class="checkit" id="checkbox-1"
                                                                    value="{{ $data->nobatch }}">&nbspYa
                                                            </td>
                                                            <td><input name="e_nl[]" type="hidden" class="checkit"
                                                                value="{{ $data->nolesen }}">{{ $data->nolesen }}</td>
                                                            <td style="text-transform:uppercase">{{ $data->namapremis }}</td>
                                                            <td>{{ $data->nobatch }}</td>
                                                            <td>{{ $data->tkhsubmit }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary " id="submit">Papar</button> --}}



                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </section>
                        @elseif ($sektor == 'PL111')
                            <section class="section">
                                <div class="card">
                                    {{-- <form action="{{ route('admin.9papar-terdahulu-simpanan.form') }}" method="post">
                                        @csrf --}}
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-bordered" style="width: 100%;">
                                                <thead>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th style="width:7%; vertical-align: middle">Papar?
                                                            <input name="select-all" id="select-all" type="checkbox"
                                                            value=""></th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>No Batch</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>No Batch</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit" id="checkbox-1"
                                                                    value="{{ $data->nolesen }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->nolesen }}</td>
                                                            <td style="text-transform:uppercase">{{ $data->namapremis }}</td>
                                                            <td>{{ $data->nobatch }}</td>
                                                            <td>{{ $data->tkhsubmit }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">
                                                {{-- <button type="submit" class="btn btn-primary " id="submit" >Papar</button> --}}


                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </section>
                        @elseif ($sektor == 'PLBIO')
                            <section class="section">
                                <div class="card">
                                    {{-- <form action="{{ route('admin.9papar-terdahulu-bio.form') }}" method="post">
                                        @csrf --}}
                                        <div class="table-responsive">
                                            <table id="example22" class="table table-bordered" style="width: 100%;">
                                                <thead>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th style="width:7%; vertical-align: middle">Papar?
                                                            <input name="select-all" id="select-all" type="checkbox"
                                                            value=""></th>
                                                        <th>No Lesen</th>{{--</form>--}}
                                                        <th>Nama Premis</th>
                                                        <th>No Batch</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr style="background-color: #e9ecefbd">
                                                        <th>Papar</th>
                                                        <th>No Lesen</th>
                                                        <th>Nama Premis</th>
                                                        <th>No Batch</th>
                                                        <th>Tarikh Hantar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody style="word-break: break-word; font-size:12px">
                                                    @foreach ($users as $data)
                                                        <tr>
                                                            <td>
                                                                <input name="papar_ya[]" type="checkbox"  class="checkit" id="checkbox-1"
                                                                    value="{{ $data->nobatch }}">&nbspYa
                                                            </td>
                                                            <td>{{ $data->nolesen }}</td>
                                                            <td style="text-transform:uppercase">{{ $data->namapremis }}</td>
                                                            <td>{{ $data->nobatch }}</td>
                                                            <td>{{ $data->tkhsubmit }}</td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>
                                            <div class="text-left col-md-8">



                                            </div>
                                        </div>
                                    {{--</form>--}}
                                </div>
                            </section>
                        @endif
                        @endif
                        {{-- <input type="hidden" name="data" value="{{ $data }}"> --}}
                        <input type="hidden" name="sektor" value="{{ $sektor }}">
                        <input type="hidden" name="sumber" value="{{ $sumber }}">
                        <input type="hidden" name="tahun" value="{{ $tahun1 }}">
                        <input type="hidden" name="bulan" value="{{ $bulan1 }}">
                        {{-- <input name="nolesen[]" id="nolesen" value=""> --}}
                        {{-- <button type="submit" class="btn btn-primary ">Papar</button>
                         --}}
                        <input type="submit" class="btn btn-primary " value="Papar">

                        </form>

                    </div>


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
    </script> --}}
    {{-- <script> --}}




{{--
//         $(document).ready(function(){
//   // Get the checkbox
//         $('input[name="papar_ya[]"]').click(function () {

//         alert("Thanks for checking me");

//         });
//         // console.log(checkBox.checked);
//         // Get the output text
//         // var text = document.getElementById("text");

//         // If the checkbox is checked, display the output text
//         if (checkBox.checked == false){
//             $("#example22").on('click','.checkit',function(){
//             // get the current row
//             var currentRow=$(this).closest("tr");
//         //    console.log(table);
//             // var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
//             var col2=currentRow.find("td:eq(1)").text();
//             // console.log(col2);// get current row 2nd TD
//             // var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
//             var data=col2;

//             // alert(data);
//             $('#nolesen').val(data);
//         });
//         }
//         }
//     );
//         </script> --}}
    {{-- <script>
    $(document).ready(function(){

        // code to read selected table row cell data (values).
        $("#example22").on('click','.checkit',function(){
            // get the current row
            var currentRow=$(this).closest("tr");
            // var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
            var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
            // var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
            var data=col2;

            // alert(data);
            $('#nolesen').val(data);
        });
        });
      </script> --}}
        <script>

            $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#example22 tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
            });

            // DataTable
                var table = $('#example22').DataTable({

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

                            filename: 'Paparan Senarai Penyata Bulan Terdahulu',



                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<a class="bi bi-file-earmark-pdf-fill" aria-hidden="true"  > PDF</a>',
                            pageSize: 'TABLOID',
                            className: "prodpdf",

                            // exportOptions: {
                            //     columns: [1,2,3,4,5,6,7]
                            // },
                            title: function(doc) {
                                    return $('#title').text()
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

                            filename: 'Paparan Senarai Penyata Bulan Terdahulu',

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
