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
                        <div class="row">
                            <div class="col align-self-center" style="padding: 20px;">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i
                                        class="fa fa-angle-left">&ensp;</i>Kembali</a>

                                <button class="btn btn-primary" onclick="exportTableToExcel('tblData')"
                                    style="float: right">Excel</button>

                                <button type="button" class="btn btn-primary " onclick="myPrint('myfrm')"
                                    style="float: right; margin-right: 5px" value="print">PDF</button>
                            </div>
                        </div>



                        <form method="get" action="" id="myfrm">
                            <div class="text-center">
                                <h4 style="color: rgb(39, 80, 71); ">Senarai Direktori</h4>

                            </div>
                            <hr>
                            <div class="card-body">
                                @if ($negeri2 == 'All')
                                    <div class="container center ">
                                        @if ($johor)

                                            <div class="col-12 mt-1 mb-2"><b><u>JOHOR</u></b></div>

                                            <table id="tblData">

                                                @foreach ($johor as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                        @endif
                                        @if ($kedah)

                                            <div class="col-12 mt-1 mb-2"><b><u>KEDAH</u></b></div>

                                            <table id="tblData">

                                                @foreach ($kedah as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                        @endif
                                        @if ($kelantan)
                                            <div class="col-12 mt-1 mb-2"><b><u>KELANTAN</u></b></div>

                                            <table id="tblData">

                                                @foreach ($kelantan as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                        @endif
                                        @if ($melaka)
                                            <div class="col-12 mt-1 mb-2"><b><u>MELAKA</u></b></div>

                                            <table id="tblData">

                                                @foreach ($melaka as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                        @endif
                                        @if ($n9)
                                            <div class="col-12 mt-1 mb-2"><b><u>NEGERI SEMBILAN</u></b></div>

                                            <table id="tblData">

                                                @foreach ($n9 as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                        @endif
                                        @if ($pahang)
                                            <div class="col-12 mt-1 mb-2"><b><u>PAHANG</u></b></div>

                                            <table id="tblData">

                                                @foreach ($pahang as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                        @endif
                                        @if ($perak)
                                            <div class="col-12 mt-1 mb-2"><b><u>PERAK</u></b></div>

                                            <table id="tblData">

                                                @foreach ($perak as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                        @endif
                                        @if ($perlis)
                                            <div class="col-12 mt-1 mb-2"><b><u>PERLIS</u></b></div>

                                            <table id="tblData">

                                                @foreach ($perlis as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                            @endif
                                        @if ($penang)
                                            <div class="col-12 mt-1 mb-2"><b><u>PULAU PINANG</u></b></div>

                                            <table id="tblData">

                                                @foreach ($penang as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                            @endif
                                        @if ($selangor)
                                            <div class="col-12 mt-1 mb-2"><b><u>SELANGOR</u></b></div>

                                            <table id="tblData">

                                                @foreach ($selangor as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                            @endif
                                        @if ($terengganu)
                                            <div class="col-12 mt-1 mb-2"><b><u>TERENGGANU</u></b></div>

                                            <table id="tblData">

                                                @foreach ($terengganu as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                            @endif
                                            @if ($wp)

                                                <div class="col-12 mt-1 mb-2"><b><u>WILAYAH PERSEKUTUAN</u></b></div>

                                                <table id="tblData">

                                                    @foreach ($wp as $data)
                                                        <tr style="margin-left:2%">
                                                            <td><b>{{ $loop->iteration }}.</b></td>
                                                            <td colspan=3 style="text-transform:uppercase">
                                                                <b>{{ $data->e_np }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp</td>
                                                            <td>Postal add </td>
                                                            <td>:</td>
                                                            <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp</td>
                                                            <td>&nbsp</td>
                                                            <td>&nbsp</td>
                                                            <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp</td>
                                                            <td>&nbsp</td>
                                                            <td>&nbsp</td>
                                                            <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp</td>
                                                            <td>Factory add</td>
                                                            <td>:</td>
                                                            <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td>&nbsp</td>
                                                            <td>&nbsp</td>
                                                            <td>&nbsp</td>
                                                            <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp</td>
                                                            <td>&nbsp</td>
                                                            <td>&nbsp</td>
                                                            <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td>&nbsp</td>
                                                            <td>Tel. No. </td>
                                                            <td>:</td>
                                                            <td>{{ $data->e_notel }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp</td>
                                                            <td>Faks No.</td>
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
                                            @endif
                                            @if ($sabah)
                                            <div class="col-12 mt-1 mb-2"><b><u>SABAH</u></b></div>

                                            <table id="tblData">

                                                @foreach ($sabah as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                            @endif
                                        @if ($sarawak)
                                            <div class="col-12 mt-1 mb-2"><b><u>SARAWAK</u></b></div>

                                            <table id="tblData">

                                                @foreach ($sarawak as $data)
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase">
                                                            <b>{{ $data->e_np }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Postal add </td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Factory add</td>
                                                        <td>:</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td>&nbsp</td>
                                                        <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Tel. No. </td>
                                                        <td>:</td>
                                                        <td>{{ $data->e_notel }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp</td>
                                                        <td>Faks No.</td>
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
                                            @endif
                                    </div>
                                @else
                                    <div class="container center ">

                                        <table id="tblData">

                                            @foreach ($query as $data)
                                                <tr style="margin-left:2%">
                                                    <td><b>{{ $loop->iteration }}.</b></td>
                                                    <td colspan=3 style="text-transform:uppercase">
                                                        <b>{{ $data->e_np }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp</td>
                                                    <td>Postal add </td>
                                                    <td>:</td>
                                                    <td style="text-transform:uppercase">{{ $data->e_as1 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp</td>
                                                    <td>&nbsp</td>
                                                    <td>&nbsp</td>
                                                    <td style="text-transform:uppercase">{{ $data->e_as2 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp</td>
                                                    <td>&nbsp</td>
                                                    <td>&nbsp</td>
                                                    <td style="text-transform:uppercase">{{ $data->e_as3 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp</td>
                                                    <td>Factory add</td>
                                                    <td>:</td>
                                                    <td style="text-transform:uppercase">{{ $data->e_ap1 }}</td>
                                                </tr>

                                                <tr>
                                                    <td>&nbsp</td>
                                                    <td>&nbsp</td>
                                                    <td>&nbsp</td>
                                                    <td style="text-transform:uppercase">{{ $data->e_ap2 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp</td>
                                                    <td>&nbsp</td>
                                                    <td>&nbsp</td>
                                                    <td style="text-transform:uppercase">{{ $data->e_ap3 }}</td>
                                                </tr>

                                                <tr>
                                                    <td>&nbsp</td>
                                                    <td>Tel. No. </td>
                                                    <td>:</td>
                                                    <td>{{ $data->e_notel }}</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp</td>
                                                    <td>Faks No.</td>
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
                                @endif
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
    <script>
        function myPrint(myfrm) {
            var restorepage = $('body').html();
            var printcontent = $('#' + myfrm).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
        }
    </script>
    {{-- <script>
        function myPrint(myfrm) {
            document.getElementById("myfrm").style.fontFamily = "Rubik,sans-serif";
            var printdata = document.getElementById(myfrm);
            newwin = window.open("");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
        }
    </script> --}}
@endsection
