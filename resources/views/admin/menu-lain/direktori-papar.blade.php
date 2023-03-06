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
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">


                    <div class="card">
                        <div class="row">
                            <div class="col align-self-center" style="padding: 20px;">
                                <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i
                                        class="fa fa-angle-left">&ensp;</i>Kembali</a>

                                @if ($negeri2 == 'All')

                                <button class="btn btn-primary"  style="float: right"
                                    onclick="tablesToExcel(['tbl1','tbl2','tbl3','tbl4','tbl5','tbl6','tbl7','tbl8','tbl9','tbl10','a','s','d','f'],
                                    ['JOHOR','KEDAH','KELANTAN','MELAKA','NEGERISEMBILAN','PAHANG',
                                    'PERAK','PERLIS','PULAUPINANG','SELANGOR','TERENGGANU','WILAYAHPERSEKUTUAN','SABAH','SARAWAK'],
                                    'Direktori.xls', 'Excel')"><i class="fa fa-file-excel" style="color: #0a7569"></i> Excel</button>
                                @else
                                    <button class="btn btn-primary" onclick="exportTableToExcel('tblData')"
                                    style="float: right">Excel</button>
                                @endif

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

                                            <table id="tbl1">

                                                @foreach ($johor as $data)
                                                    {{-- <tr>
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td style="text-transform:uppercase; text-align:center">
                                                            <b>{{ $data->e_np }}</b></td>
                                                            {{-- <td>&nbsp</td>
                                                            <td>&nbsp</td> --}}
                                                    {{-- </tr>  --}}
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="tbl1"></table>
                                        @endif
                                        @if ($kedah)

                                            <div class="col-12 mt-1 mb-2"><b><u>KEDAH</u></b></div>

                                            <table id="tbl2">

                                                @foreach ($kedah as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="tbl2"></table>
                                        @endif
                                        @if ($kelantan)
                                            <div class="col-12 mt-1 mb-2"><b><u>KELANTAN</u></b></div>

                                            <table id="tbl3">

                                                @foreach ($kelantan as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="tbl3"></table>
                                        @endif
                                        @if ($melaka)
                                            <div class="col-12 mt-1 mb-2"><b><u>MELAKA</u></b></div>

                                            <table id="tbl4">

                                                @foreach ($melaka as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="tbl4"></table>
                                        @endif
                                        @if ($n9)
                                            <div class="col-12 mt-1 mb-2"><b><u>NEGERI SEMBILAN</u></b></div>

                                            <table id="tbl5">

                                                @foreach ($n9 as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="tbl5"></table>
                                        @endif
                                        @if ($pahang)
                                            <div class="col-12 mt-1 mb-2"><b><u>PAHANG</u></b></div>

                                            <table id="tbl6">

                                                @foreach ($pahang as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="tbl6"></table>
                                        @endif
                                        @if ($perak)
                                            <div class="col-12 mt-1 mb-2"><b><u>PERAK</u></b></div>

                                            <table id="tbl7">

                                                @foreach ($perak as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="tbl7"></table>
                                        @endif
                                        @if ($perlis)
                                            <div class="col-12 mt-1 mb-2"><b><u>PERLIS</u></b></div>

                                            <table id="tbl8">

                                                @foreach ($perlis as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="tbl8"></table>
                                        @endif
                                        @if ($penang)
                                            <div class="col-12 mt-1 mb-2"><b><u>PULAU PINANG</u></b></div>

                                            <table id="tbl9">

                                                @foreach ($penang as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="tbl9"></table>
                                        @endif
                                        @if ($selangor)
                                            <div class="col-12 mt-1 mb-2"><b><u>SELANGOR</u></b></div>

                                            <table id="tbl10">

                                                @foreach ($selangor as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="tbl10"></table>
                                        @endif
                                        @if ($terengganu)
                                            <div class="col-12 mt-1 mb-2"><b><u>TERENGGANU</u></b></div>

                                            <table id="a">

                                                @foreach ($terengganu as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="a"></table>
                                        @endif
                                        @if ($wp)

                                            <div class="col-12 mt-1 mb-2"><b><u>WILAYAH PERSEKUTUAN</u></b></div>

                                            <table id="s">

                                                @foreach ($wp as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="s"></table>
                                        @endif
                                        @if ($sabah)
                                            <div class="col-12 mt-1 mb-2"><b><u>SABAH</u></b></div>

                                            <table id="d">

                                                @foreach ($sabah as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="d"></table>
                                        @endif
                                        @if ($sarawak)
                                            <div class="col-12 mt-1 mb-2"><b><u>SARAWAK</u></b></div>

                                            <table id="f">

                                                @foreach ($sarawak as $data)
                                                    <td class="noScreen noPrint">Senarai Direktori</td>
                                                    <tr style="margin-left:2%">
                                                        <td><b>{{ $loop->iteration }}.</b></td>
                                                        <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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
                                        @else
                                            <table id="f"></table>
                                        @endif
                                    </div>
                                @else
                                    <div class="container center ">

                                        <table id="tblData">

                                            @foreach ($query as $data)
                                                <td class="noScreen noPrint">Senarai Direktori</td>
                                                <tr style="margin-left:2%">
                                                    <td><b>{{ $loop->iteration }}.</b></td>
                                                    <td colspan=3 style="text-transform:uppercase"><b>{{ $data->e_np }}</b></td>
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


<script>
    var tablesToExcel = (function() {
      var uri = 'data:application/vnd.ms-excel;base64,'
      , tmplWorkbookXML = '<?xml version="1.0"?><?mso-application progid="Excel.Sheet"?><Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">'
        + '<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office"><Author>Axel Richter</Author><Created>{created}</Created></DocumentProperties>'
        + '<Styles>'
        + '<Style ss:ID="Currency"><NumberFormat ss:Format="Currency"></NumberFormat></Style>'
        + '<Style ss:ID="Date"><NumberFormat ss:Format="Medium Date"></NumberFormat></Style>'
        + '</Styles>'
        + '{worksheets}</Workbook>'
      , tmplWorksheetXML = '<Worksheet ss:Name="{nameWS}"><Table>{rows}</Table></Worksheet>'
      , tmplCellXML = '<Cell{attributeStyleID}{attributeFormula}><Data ss:Type="{nameType}">{data}</Data></Cell>'
      , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
      , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
      return function(tables, wsnames, wbname, appname) {
        var ctx = "";
        var workbookXML = "";
        var worksheetsXML = "";
        var rowsXML = "";

        for (var i = 0; i < tables.length; i++) {
          if (!tables[i].nodeType) tables[i] = document.getElementById(tables[i]);
          for (var j = 0; j < tables[i].rows.length; j++) {
            rowsXML += '<Row>'
            for (var k = 0; k < tables[i].rows[j].cells.length; k++) {
              var dataType = tables[i].rows[j].cells[k].getAttribute("data-type");
              var dataStyle = tables[i].rows[j].cells[k].getAttribute("data-style");
              var dataValue = tables[i].rows[j].cells[k].getAttribute("data-value");
              dataValue = (dataValue)?dataValue:tables[i].rows[j].cells[k].innerHTML;
              var dataFormula = tables[i].rows[j].cells[k].getAttribute("data-formula");
              dataFormula = (dataFormula)?dataFormula:(appname=='Calc' && dataType=='DateTime')?dataValue:null;
              ctx = {  attributeStyleID: (dataStyle=='Currency' || dataStyle=='Date')?' ss:StyleID="'+dataStyle+'"':''
                     , nameType: (dataType=='Number' || dataType=='DateTime' || dataType=='Boolean' || dataType=='Error')?dataType:'String'
                     , data: (dataFormula)?'':dataValue
                     , attributeFormula: (dataFormula)?' ss:Formula="'+dataFormula+'"':''
                    };
              rowsXML += format(tmplCellXML, ctx);
            }
            rowsXML += '</Row>'
          }
          ctx = {rows: rowsXML, nameWS: wsnames[i] || 'Sheet' + i};
          worksheetsXML += format(tmplWorksheetXML, ctx);
          rowsXML = "";
        }

        ctx = {created: (new Date()).getTime(), worksheets: worksheetsXML};
        workbookXML = format(tmplWorkbookXML, ctx);

  console.log(workbookXML);

        var link = document.createElement("A");
        link.href = uri + base64(workbookXML);
        link.download = wbname || 'Workbook.xls';
        link.target = '_blank';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      }
    })();
  </script>



@endsection
