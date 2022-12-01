@extends($layout)

@section('content')

    <!-- ======= Hero Section ======= -->
    <div class="page-wrapper">

        <div class="mt-3 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title" style="padding: 10px">Penyata Bulanan Kilang Oleokimia (Biodiesel)</h4>
                        </div>
                        <div class="col-7 align-self-center" style="margin-left:-1%;">
                            <div class="d-flex align-items-center justify-content-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                            @if (!$loop->last)
                                                <li class="breadcrumb-item">
                                                    <a href="{{ $breadcrumb['link'] }}"
                                                        style="color: black !important;"
                                                        onMouseOver="this.style.color='#25877b'"
                                                        onMouseOut="this.style.color='black'">
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
                <div class="row" style="padding: 20px; background-color: white; margin-right:2%; margin-left:2%">
                    <div class="col-1 align-self-center">
                        <a href="{{ $returnArr['kembali'] }}" class="btn" style=" color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                    </div>
                </div>

                <div class="card" style="margin-right:2%; margin-left:2%">
                    <div class="card-body">



                            <div class="pl-3">


                                    <body><h1 style="page-break-before:always"></h1>
                                        {{-- <p align="left">
                                                PROSES6 : PAPAR PL 9.1</p>JJ0003<br> --}}

                                        <div align="">
                                            <table border="0" width="90%">
                                                <tbody>
                                                    <tr>
                                                        <td width="10%" height="19">
                                                            <p align=""><b></b></p>
                                                        </td>
                                                        <td width="88%" height="19">
                                                            <p align="right"><b>MPOB(EL) CM 4</b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" height="19">
                                                            <p align=""><b></b></p>
                                                        </td>
                                                        <td width="88%" height="19">
                                                            <p align="right"><b>MMPOB(EL) PX 4-C </b></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" height="19">
                                                            <p align=""><b></b></p>
                                                        </td>
                                                        <td width="88%" height="19">
                                                            <p align="right"><b>MPOB(EL) PM 4-CM </b></p>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div><br>

                                        <p align="center">
                                            <img border="0" src="{{ asset('/mpob.png') }}" width="128"
                                            height="100">
                                        </p>
                                        <title>PENYATA BULANAN KILANG OLEOKIMIA (BIODIESEL) - MPOB (EL) CM 4</title>
                                        <p align="center"><b>
                                                <font size="4">LEMBAGA MINYAK SAWIT MALAYSIA (MPOB)<br>

                                                </font>PENYATA BULANAN KILANG OLEOKIMIA (BIODIESEL) - MPOB (EL) CM 4<br>

                                                BULAN :&nbsp;&nbsp;
                                                @if($bulan == 1) JANUARI
                                                    @elseif($bulan == 2) FEBRUARI
                                                    @elseif($bulan == 3) MAC
                                                    @elseif($bulan == 4) APRIL
                                                    @elseif($bulan == 5) MEI
                                                    @elseif($bulan == 6) JUN
                                                    @elseif($bulan == 7) JULAI
                                                    @elseif($bulan == 8) OGOS
                                                    @elseif($bulan == 9) SEPTEMBER
                                                    @elseif($bulan == 10) OKTOBER
                                                    @elseif($bulan == 11) NOVEMBER
                                                    @elseif($bulan == 12) DISEMBER
                                                    @endif
                                                    &nbsp;&nbsp;&nbsp;&nbsp;TAHUN :&nbsp;&nbsp;{{ $tahun }}
                                            </b><br>

                                        </p>
                                        <hr>

                                        <table border="0" width="111%" cellspacing="0">

                                            <tbody>
                                                <tr>

                                                    <td width="25%" height="19">
                                                        Nombor Lesen
                                                    </td>

                                                    <td width="88%" height="19"><b>
                                                        {{ $penyata->pelesen->e_nl }}

                                                    </b></td>

                                                </tr>

                                                <tr>

                                                    <td width="25%" height="19">
                                                        Nama Premis
                                                    </td>

                                                    <td width="88%" height="19"><b>
                                                            {{ $penyata->pelesen->e_np }}
                                                        </b></td>

                                                </tr>

                                            </tbody>
                                        </table>

                                        <hr>

                                        <p></p>


                                        <p align="left"><b>
                                                <font style="font-size: 15px" color="#0c7c85">MAKLUMAT PELESEN </font>
                                            </b></p>

                                        <table border="0" width="80%" cellpadding="0" cellspacing="0">

                                            <tbody>


                                                <tr>

                                                    <td width="35%">Alamat Premis Berlesen</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_ap1 ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_ap2 ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_ap3 ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat Surat Menyurat</td>

                                                    <td width="65%"><b>{{ $penyata->e_as1 ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_as2 ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_as3 ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Telefon</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_notel ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Faks </td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_nofax ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat emel </td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_email ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Melapor</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_npg ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Melapor</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_jpg ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_npgtg ?? '-' }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_jpgtg ?? '-' }}</b></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <br>


                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 (a) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                MINYAK SAWIT</font>
                                        </b> </p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2"> Produk Minyak Sawit</font>
                                                            </b></td>
                                                        {{-- <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td> --}}
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Awal Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Belian/Terimaan</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Pengeluaran</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Digunakan Untuk Proses Selanjutnya</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Jualan/Edaran Tempatan</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Eksport</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Akhir Dilapor</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kemaskini</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Tindakan</font>
                                                            </b></td>
                                                    </tr>
                                                    {{-- @if($penyataia && !$penyataia->isEmpty()) --}}
                                                        @php
                                                            $total_col_ebio_b5 = 0;
                                                            $total_col_ebio_b6 = 0;
                                                            $total_col_ebio_b7 = 0;
                                                            $total_col_ebio_b8 = 0;
                                                            $total_col_ebio_b9 = 0;
                                                            $total_col_ebio_b10 = 0;
                                                            $total_col_ebio_b11 = 0;
                                                        @endphp

                                                        @foreach ($penyataia as  $penyataia2)
                                                            <form action="{{ route('admin.kemaskini.maklumat.bio.exe.a.dahulu',  [$penyataia2->ebio_b1] ) }}"  class="sub-form"
                                                                method="post" id="form1" >
                                                                @csrf
                                                                <tr>
                                                                    <td align="left">
                                                                        <select class="form-control" id="ebio_b4" name="ebio_b4"  onchange="ajax_produk(this);" >
                                                                            <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                                            @foreach ($produk as $prods)
                                                                                <option value="{{ $prods->prodid }}"  {{(old('ebio_b4', $penyataia2->produk->prodid) == $prods->prodid ? 'selected' : '')}} >
                                                                                    {{ $prods->proddesc }} - {{ $prods->prodid }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        {{-- <font size="2">{{ $penyataia->produk->proddesc }}</font> --}}
                                                                    </td>
                                                                    {{-- <td align="center">
                                                                        <font size="2">{{ $penyataia->ebio_b4 }}</font>
                                                                    </td> --}}
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b5' style="text-align: right" id='ebio_b5'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataia2->ebio_b5 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b6' style="text-align: right" id='ebio_b6'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataia2->ebio_b6 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b7' style="text-align: right" id='ebio_b7'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataia2->ebio_b7 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b8' style="text-align: right" id='ebio_b8'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataia2->ebio_b8 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b9' style="text-align: right" id='ebio_b9'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataia2->ebio_b9 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b10' style="text-align: right" id='ebio_b10'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataia2->ebio_b10 ??  0,2) }}">
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b11' style="text-align: right" id='ebio_b11'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataia2->ebio_b11 ??  0,2) }}">
                                                                    </td>
                                                                    <td>
                                                                        <div class="icon" style="text-align: center">

                                                                            <button type="submit" class="btn" style="background-color: rgba(196, 67, 67, 0)">
                                                                                <i class="fa fa-edit" style="color: #2fb851;font-size:18px"></i>
                                                                            </button>

                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        <div class="icon" style="text-align: center">
                                                                            <a href="#" type="button" data-toggle="modal"
                                                                                data-target="#next2{{ $penyataia2->ebio_b1 }}">
                                                                                <i class="fa fa-trash"
                                                                                    style="color: #dc3545;font-size:18px"></i>
                                                                            </a>
                                                                        </div>

                                                                    </td>
                                                                    @php
                                                                        $total_col_ebio_b5 += $penyataia2->ebio_b5 ?? 0  ;
                                                                        $total_col_ebio_b6 += $penyataia2->ebio_b6 ?? 0  ;
                                                                        $total_col_ebio_b7 += $penyataia2->ebio_b7 ?? 0  ;
                                                                        $total_col_ebio_b8 += $penyataia2->ebio_b8 ?? 0  ;
                                                                        $total_col_ebio_b9 += $penyataia2->ebio_b9 ?? 0  ;
                                                                        $total_col_ebio_b10 += $penyataia2->ebio_b10 ?? 0  ;
                                                                        $total_col_ebio_b11 += $penyataia2->ebio_b11 ?? 0  ;
                                                                    @endphp

                                                                </tr>

                                                            </form>
                                                            <script>
                                                                submitForms = function(){
                                                                    document.getElementById("form1").submit();
                                                                    // document.getElementById("form2").submit();
                                                                }
                                                            </script>

                                                            <div class="modal fade" id="next2{{ $penyataia2->ebio_b1 }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                                aria-hidden="true">
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
                                                                                Anda pasti mahu menghapus produk ini?
                                                                            </p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary ml-1"
                                                                                data-dismiss="modal">
                                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Tidak</span>
                                                                            </button>
                                                                            <a href="{{ route('admin.delete.bahagian.ia.dahulu', [$penyataia2->ebio_b1]) }}"
                                                                                type="button" class="btn btn-light-secondary"
                                                                                style="color: #275047; background-color: #a1929238">
                                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Ya</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <tr>
                                                            <form action="{{ route('admin.add.bahagian.ia.dahulu', [$penyata->ebio_nobatch]  ) }}" method="post" id="add">
                                                                @csrf
                                                                <td align="left">
                                                                    <select class="form-control select2" id="ebio_b4" name="ebio_b4"  onchange="ajax_produk(this);" >
                                                                        <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                                        @foreach ($produk as $prods)
                                                                            <option value="{{ $prods->prodid }}"  >
                                                                                {{ $prods->proddesc }} - {{ $prods->prodid }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b5' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b6' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b7' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b8' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b9' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b10' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b11' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="icon" style="text-align: center">
                                                                        <a href="javascript: submitFormAdd();" >
                                                                            <i class="fa fa-plus"
                                                                                style="color: #237f46;font-size:18px"></i>
                                                                        </a>
                                                                    </div>

                                                                </td>
                                                            </form>
                                                            <script>
                                                                function submitFormAdd(){
                                                                    $('#add').submit();
                                                                }
                                                            </script>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" >
                                                                <font size="2"><b>JUMLAH</b></font>
                                                            </td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b5 ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b6 ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b7 ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b8 ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b9 ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b10 ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b11 ?? 0,2) }}</b></td>
                                                            {{-- <td colspan="2">-</td> --}}
                                                        </tr>

                                                </tbody>
                                            </table><br>
                                            <p><b>
                                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 (b) :&nbsp;&nbsp;&nbsp;&nbsp; PRODUK
                                                        MINYAK ISIRUNG SAWIT</font>
                                                </b> </p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2"> Produk Minyak Isirung Sawit</font>
                                                            </b></td>
                                                        {{-- <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td> --}}
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Awal Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Belian/Terimaan</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Pengeluaran</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Digunakan Untuk Proses Selanjutnya</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Jualan/Edaran Tempatan</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Eksport</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Akhir Dilapor</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kemaskini</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Tindakan</font>
                                                            </b></td>
                                                    </tr>
                                                    {{-- @if($penyataib && !$penyataib->isEmpty()) --}}
                                                        @php
                                                            $total_col_ebio_b5_b = 0;
                                                            $total_col_ebio_b6_b = 0;
                                                            $total_col_ebio_b7_b = 0;
                                                            $total_col_ebio_b8_b = 0;
                                                            $total_col_ebio_b9_b = 0;
                                                            $total_col_ebio_b10_b = 0;
                                                            $total_col_ebio_b11_b = 0;
                                                        @endphp
                                                        @foreach ($penyataib as $penyataib2)
                                                            <form action="{{ route('admin.kemaskini.maklumat.bio.exe.b.dahulu',  [$penyataib2->ebio_b1] ) }}"  class="sub-form"
                                                                method="post" id="form2" >
                                                                @csrf

                                                                <tr>
                                                                    <td align="left">
                                                                        <select class="form-control" id="ebio_b4" name="ebio_b4"  onchange="ajax_produk(this);" >
                                                                            <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                                            @foreach ($produk_b as $prods)
                                                                                <option value="{{ $prods->prodid }}"  {{(old('ebio_b4', $penyataib2->produk->prodid) == $prods->prodid ? 'selected' : '')}} >
                                                                                    {{ $prods->proddesc }} - {{ $prods->prodid }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        {{-- <font size="2">{{ $penyataia->produk->proddesc }}</font> --}}
                                                                    </td>
                                                                    {{-- <td align="center">
                                                                        <font size="2">{{ $penyataia->ebio_b4 }}</font>
                                                                    </td> --}}
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b5' style="text-align: right" id='ebio_b5'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataib2->ebio_b5 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b6' style="text-align: right" id='ebio_b6'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataib2->ebio_b6 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b7' style="text-align: right" id='ebio_b7'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataib2->ebio_b7 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b8' style="text-align: right" id='ebio_b8'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataib2->ebio_b8 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b9' style="text-align: right" id='ebio_b9'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataib2->ebio_b9 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b10' style="text-align: right" id='ebio_b10'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataib2->ebio_b10 ??  0,2) }}">
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b11' style="text-align: right" id='ebio_b11'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataib2->ebio_b11 ??  0,2) }}">
                                                                    </td>
                                                                    <td>
                                                                        <div class="icon" style="text-align: center">

                                                                            <button type="submit" class="btn" style="background-color: rgba(196, 67, 67, 0)">
                                                                                <i class="fa fa-edit" style="color: #2fb851;font-size:18px"></i>
                                                                            </button>

                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        <div class="icon" style="text-align: center">
                                                                            <a href="#" type="button" data-toggle="modal"
                                                                                data-target="#next3{{ $penyataib2->ebio_b1 }}">
                                                                                <i class="fa fa-trash"
                                                                                    style="color: #dc3545;font-size:18px"></i>
                                                                            </a>
                                                                        </div>

                                                                    </td>
                                                                    @php
                                                                        $total_col_ebio_b5_b += $penyataib2->ebio_b5 ?? 0  ;
                                                                        $total_col_ebio_b6_b += $penyataib2->ebio_b6 ?? 0  ;
                                                                        $total_col_ebio_b7_b += $penyataib2->ebio_b7 ?? 0  ;
                                                                        $total_col_ebio_b8_b += $penyataib2->ebio_b8 ?? 0  ;
                                                                        $total_col_ebio_b9_b += $penyataib2->ebio_b9 ?? 0  ;
                                                                        $total_col_ebio_b10_b += $penyataib2->ebio_b10 ?? 0  ;
                                                                        $total_col_ebio_b11_b += $penyataib2->ebio_b11 ?? 0  ;
                                                                    @endphp

                                                                </tr>
                                                            </form>
                                                            <script>
                                                                submitForms = function(){
                                                                    document.getElementById("form2").submit();
                                                                    // document.getElementById("form2").submit();
                                                                }
                                                            </script>

                                                            <div class="modal fade" id="next3{{ $penyataib2->ebio_b1 }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                                aria-hidden="true">
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
                                                                                Anda pasti mahu menghapus produk ini?
                                                                            </p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary ml-1"
                                                                                data-dismiss="modal">
                                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Tidak</span>
                                                                            </button>
                                                                            <a href="{{ route('admin.delete.bahagian.ib.dahulu', [$penyataib2->ebio_b1]) }}"
                                                                                type="button" class="btn btn-light-secondary"
                                                                                style="color: #275047; background-color: #a1929238">
                                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Ya</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <tr>
                                                            <form action="{{ route('admin.add.bahagian.ib.dahulu', [$penyata->ebio_nobatch] ) }}" method="post" id="add2">
                                                                @csrf
                                                                <td align="left">
                                                                    <select class="form-control select2" id="ebio_b4" name="ebio_b4"  onchange="ajax_produk(this);" >
                                                                        <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                                        @foreach ($produk_b as $prods)
                                                                            <option value="{{ $prods->prodid }}"  >
                                                                                {{ $prods->proddesc }} - {{ $prods->prodid }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b5' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b6' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b7' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b8' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b9' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b10' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b11' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="icon" style="text-align: center">
                                                                        <a href="javascript: submitFormAdd2();" >
                                                                            <i class="fa fa-plus"
                                                                                style="color: #237f46;font-size:18px"></i>
                                                                        </a>
                                                                    </div>

                                                                </td>
                                                            </form>
                                                            <script>
                                                                function submitFormAdd2(){
                                                                    $('#add2').submit();
                                                                }
                                                            </script>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" >
                                                                <font size="2"><b>JUMLAH</b></font>
                                                            </td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b5_b ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b6_b ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b7_b ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b8_b ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b9_b ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b10_b ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b11_b ?? 0,2) }}</b></td>
                                                            {{-- <td colspan="2">-</td> --}}
                                                        </tr>
                                                    {{-- @else
                                                    <tr>
                                                        <form action="{{ route('admin.add.bahagian.ib', [$penyata->ebio_nobatch] ) }}" method="post" id="add2">
                                                            @csrf
                                                            <td align="left">
                                                                <select class="form-control select2" id="ebio_b4" name="ebio_b4"  onchange="ajax_produk(this);" >
                                                                    <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                                    @foreach ($produk_b as $prods)
                                                                        <option value="{{ $prods->prodid }}"  >
                                                                            {{ $prods->proddesc }} - {{ $prods->prodid }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" name='ebio_b5' style="text-align: right"
                                                                class="form-control" onkeypress="return isNumberKey(event)">
                                                            </td>
                                                            <td>
                                                                <input type="text" name='ebio_b6' style="text-align: right"
                                                                class="form-control" onkeypress="return isNumberKey(event)">
                                                            </td>
                                                            <td>
                                                                <input type="text" name='ebio_b7' style="text-align: right"
                                                                class="form-control" onkeypress="return isNumberKey(event)">
                                                            </td>
                                                            <td>
                                                                <input type="text" name='ebio_b8' style="text-align: right"
                                                                class="form-control" onkeypress="return isNumberKey(event)">
                                                            </td>
                                                            <td>
                                                                <input type="text" name='ebio_b9' style="text-align: right"
                                                                class="form-control" onkeypress="return isNumberKey(event)">
                                                            </td>
                                                            <td>
                                                                <input type="text" name='ebio_b10' style="text-align: right"
                                                                class="form-control" onkeypress="return isNumberKey(event)">
                                                            </td>
                                                            <td>
                                                                <input type="text" name='ebio_b11' style="text-align: right"
                                                                class="form-control" onkeypress="return isNumberKey(event)">
                                                            </td>
                                                            <td colspan="2">
                                                                <div class="icon" style="text-align: center">
                                                                    <a href="javascript: submitFormAdd2();" >
                                                                        <i class="fa fa-plus"
                                                                            style="color: #237f46;font-size:18px"></i>
                                                                    </a>
                                                                </div>

                                                            </td>
                                                        </form>
                                                        <script>
                                                            function submitFormAdd2(){
                                                                $('#add2').submit();
                                                            }
                                                        </script>
                                                    </tr>
                                                    @endif --}}
                                                </tbody>
                                            </table><br>

                                            <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 (c) :&nbsp;&nbsp;&nbsp;&nbsp;PRODUK MINYAK-MINYAK LAIN</font>
                                            </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2"> Produk Minyak-Minyak Lain</font>
                                                            </b></td>
                                                        {{-- <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td> --}}
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Awal Di Premis</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Belian/Terimaan</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Pengeluaran</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Digunakan Untuk Proses Selanjutnya</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Jualan/Edaran Tempatan</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Eksport</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Stok Akhir Dilapor</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kemaskini</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Tindakan</font>
                                                            </b></td>
                                                    </tr>
                                                    {{-- @if($penyataic && !$penyataic->isEmpty()) --}}
                                                        @php
                                                            $total_col_ebio_b5 = 0;
                                                            $total_col_ebio_b6 = 0;
                                                            $total_col_ebio_b7 = 0;
                                                            $total_col_ebio_b8 = 0;
                                                            $total_col_ebio_b9 = 0;
                                                            $total_col_ebio_b10 = 0;
                                                            $total_col_ebio_b11 = 0;
                                                        @endphp
                                                        @foreach ($penyataic as $key => $penyataic2)
                                                            <form action="{{ route('admin.kemaskini.maklumat.bio.exe.c.dahulu',  [$penyataic2->ebio_b1] ) }}"  class="sub-form"
                                                                method="post" id="form3" >
                                                                @csrf

                                                                <tr>
                                                                    <td align="left">
                                                                        <select class="form-control" id="ebio_b4" name="ebio_b4"  onchange="ajax_produk(this);" >
                                                                            <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                                            @foreach ($produk_c as $prods)
                                                                                <option value="{{ $prods->prodid }}"  {{(old('ebio_b4', $penyataic2->produk->prodid) == $prods->prodid ? 'selected' : '')}} >
                                                                                    {{ $prods->proddesc }} - {{ $prods->prodid }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        {{-- <font size="2">{{ $penyataia->produk->proddesc }}</font> --}}
                                                                    </td>
                                                                    {{-- <td align="center">
                                                                        <font size="2">{{ $penyataia->ebio_b4 }}</font>
                                                                    </td> --}}
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b5' style="text-align: right" id='ebio_b5'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataic2->ebio_b5 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b6' style="text-align: right" id='ebio_b6'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataic2->ebio_b6 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b7' style="text-align: right" id='ebio_b7'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataic2->ebio_b7 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b8' style="text-align: right" id='ebio_b8'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataic2->ebio_b8 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b9' style="text-align: right" id='ebio_b9'
                                                                        class="form-control" onkeypress="return isNumberKey(event)"
                                                                        value="{{ number_format($penyataic2->ebio_b9 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b10' style="text-align: right" id='ebio_b10'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataic2->ebio_b10 ??  0,2) }}">
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b11' style="text-align: right" id='ebio_b11'
                                                                        class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                        value="{{ number_format($penyataic2->ebio_b11 ??  0,2) }}">
                                                                    </td>
                                                                    <td>
                                                                        <div class="icon" style="text-align: center">

                                                                            <button type="submit" class="btn" style="background-color: rgba(196, 67, 67, 0)">
                                                                                <i class="fa fa-edit" style="color: #2fb851;font-size:18px"></i>
                                                                            </button>

                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        <div class="icon" style="text-align: center">
                                                                            <a href="#" type="button" data-toggle="modal"
                                                                                data-target="#next4{{ $penyataic2->ebio_b1 }}">
                                                                                <i class="fa fa-trash"
                                                                                    style="color: #dc3545;font-size:18px"></i>
                                                                            </a>
                                                                        </div>

                                                                    </td>
                                                                    @php
                                                                        $total_col_ebio_b5 += $penyataic2->ebio_b5 ?? 0  ;
                                                                        $total_col_ebio_b6 += $penyataic2->ebio_b6 ?? 0  ;
                                                                        $total_col_ebio_b7 += $penyataic2->ebio_b7 ?? 0  ;
                                                                        $total_col_ebio_b8 += $penyataic2->ebio_b8 ?? 0  ;
                                                                        $total_col_ebio_b9 += $penyataic2->ebio_b9 ?? 0  ;
                                                                        $total_col_ebio_b10 += $penyataic2->ebio_b10 ?? 0  ;
                                                                        $total_col_ebio_b11 += $penyataic2->ebio_b11 ?? 0  ;
                                                                    @endphp

                                                                </tr>
                                                            </form>
                                                            <script>
                                                                submitForms = function(){
                                                                    document.getElementById("form3").submit();
                                                                    // document.getElementById("form2").submit();
                                                                }
                                                            </script>

                                                            <div class="modal fade" id="next4{{ $penyataic2->ebio_b1 }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                                aria-hidden="true">
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
                                                                                Anda pasti mahu menghapus produk ini?
                                                                            </p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary ml-1"
                                                                                data-dismiss="modal">
                                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Tidak</span>
                                                                            </button>
                                                                            <a href="{{ route('admin.delete.bahagian.ic.dahulu', [$penyataic2->ebio_b1]) }}"
                                                                                type="button" class="btn btn-light-secondary"
                                                                                style="color: #275047; background-color: #a1929238">
                                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Ya</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        {{-- @foreach ($penyataic as $penyataic2) --}}
                                                        <tr>
                                                            <form action="{{ route('admin.add.bahagian.ic.dahulu', [$penyata->ebio_nobatch ?? 0] ) }}" method="post" id="add3">
                                                                @csrf
                                                                <td align="left">
                                                                    <select class="form-control select2" id="ebio_b4" name="ebio_b4"  onchange="ajax_produk(this);" >
                                                                        <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                                        @foreach ($produk_c as $prods)
                                                                            <option value="{{ $prods->prodid }}"  >
                                                                                {{ $prods->proddesc }} - {{ $prods->prodid }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b5' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)" >
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b6' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b7' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b8' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b9' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b10' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b11' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="icon" style="text-align: center">
                                                                        <a href="javascript: submitFormAdd3();" >
                                                                            <i class="fa fa-plus"
                                                                                style="color: #237f46;font-size:18px"></i>
                                                                        </a>
                                                                    </div>

                                                                </td>
                                                            </form>
                                                            <script>
                                                                function submitFormAdd3(){
                                                                    $('#add3').submit();
                                                                }
                                                            </script>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" >
                                                                <font size="2"><b>JUMLAH</b></font>
                                                            </td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b5 ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b6 ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b7 ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b8 ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b9 ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b10 ?? 0,2) }}</b></td>
                                                            <td class="text-right"><b>{{  number_format($total_col_ebio_b11 ?? 0,2) }}</b></td>
                                                            {{-- <td colspan="2">-</td> --}}
                                                        </tr>
                                                        {{-- @endforeach --}}
                                                    {{-- @else
                                                        <tr>
                                                            <td colspan="14" class="text-center" style="height:30px">Tiada Rekod</td>
                                                        </tr>
                                                    @endif --}}

                                                </tbody>
                                            </table><br>

                                            <p><b>
                                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 2 :&nbsp;&nbsp;&nbsp;&nbsp;
                                                        HARI BEROPERASI DAN KADAR PENGGUNAAN KAPASITI PEMPROSESAN
                                                    </font>
                                                </b> </p>
                                            <table border="0" width="50%" cellspacing="0" cellpadding="0">
                                                @if($penyataii)
                                                    <tbody>
                                                        <form action="{{ route('admin.kemaskini.maklumat.bio.ii.dahulu',  [$penyataii->lesen ] ) }}"  class="sub-form"
                                                            method="post" id="formii" >
                                                            @csrf
                                                            <tr>
                                                                <td width="50%">Jumlah Hari Kilang Beroperasi Sebulan :</td>
                                                                <td width="20%" align="left">
                                                                    <input type="text" name='hari_operasi' style="text-align: right" id='hari_operasi'
                                                                    class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                    value=  "{{ $penyataii->hari_operasi ??  0 }}" >
                                                                </td>
                                                                <td width="20%">
                                                                    <b>&nbsp Hari</b>
                                                                </td>
                                                                {{-- <td width="100"><b>:{{ $penyataii->hari_operasi }}</b></td> --}}
                                                            </tr>
                                                            <tr>
                                                                <td width="50%">Kadar Penggunaan Kapasiti Sebulan :</td>
                                                                <td width="20%" align="left">
                                                                    <input type="text" name='kapasiti' style="text-align: right" id='kapasiti'
                                                                    class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                    value=  "{{ number_format($penyataii->kapasiti ??  0,2) }}" >
                                                                </td>
                                                                <td width="20%">
                                                                    <b>&nbsp %</b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="50%"><b>Kemaskini</b></td>
                                                                <td width="20%" align="left">
                                                                <div class="icon" style="text-align: center">

                                                                    <button class="dt-button buttons-excel buttons-html5 mt-1" type="submit"
                                                                        style="background-color: white; color: #0a7569; ">
                                                                        <i class="fa fa-edit" style="color: #0a7569"></i> Kemaskini
                                                                    </button>

                                                                </div>

                                                                </td>

                                                            </tr>
                                                        </form>
                                                        <script>
                                                            submitForms = function(){
                                                                document.getElementById("formii").submit();
                                                                // document.getElementById("form2").submit();
                                                            }
                                                        </script>
                                                    </tbody>
                                                @else
                                                    <tbody>
                                                        <form action="{{ route('admin.add.maklumat.bio.ii.dahulu',  [$penyata->ebio_nl ] ) }}"  class="sub-form"
                                                            method="post" id="formAddii" >
                                                            @csrf
                                                            <tr>
                                                                <td width="50%">Jumlah Hari Kilang Beroperasi Sebulan :</td>
                                                                <td width="20%" align="left">
                                                                    <input type="text" name='hari_operasi' style="text-align: right" id='hari_operasi'
                                                                    class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                    value=  "{{ $penyataii->hari_operasi ??  0 }}" >
                                                                </td>
                                                                <td width="20%">
                                                                    <b>&nbsp Hari</b>
                                                                </td>
                                                                {{-- <td width="100"><b>:{{ $penyataii->hari_operasi }}</b></td> --}}
                                                            </tr>
                                                            <tr>
                                                                <td width="50%">Kadar Penggunaan Kapasiti Sebulan :</td>
                                                                <td width="20%" align="left">
                                                                    <input type="text" name='kapasiti' style="text-align: right" id='kapasiti'
                                                                    class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                    value=  "{{ number_format($penyataii->kapasiti ??  0,2) }}" >
                                                                </td>
                                                                <td width="20%">
                                                                    <b>&nbsp %</b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="50%"><b>Kemaskini</b></td>
                                                                <td width="20%" align="left">
                                                                <div class="icon" style="text-align: center">

                                                                    <button class="dt-button buttons-excel buttons-html5 mt-1" type="submit"
                                                                        style="background-color: white; color: #0a7569; ">
                                                                        <i class="fa fa-edit" style="color: #0a7569"></i> Kemaskini
                                                                    </button>

                                                                </div>

                                                                </td>

                                                            </tr>
                                                        </form>
                                                        <script>
                                                            submitForms = function(){
                                                                document.getElementById("formAddii").submit();
                                                                // document.getElementById("form2").submit();
                                                            }
                                                        </script>
                                                    </tbody>
                                                @endif
                                            </table><br>


                                            <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 3 :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN PRODUK BIODIESEL DAN GLYCERINE</font>
                                            </b></p>
                                            @if($penyataiii && !$penyataiii->isEmpty())
                                                {{-- @foreach ($penyataiii as $penyataiii2)
                                                    <form action="{{ route('admin.kemaskini.maklumat.bio.exe.iii',  [$penyataiii2->ebio_c1] ) }}"  class="sub-form"
                                                        method="post" id="form4" >
                                                        @csrf --}}
                                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                            class="table table-bordered" style="padding: 0.2rem 0.3rem">
                                                            <tbody>
                                                                <tr style="background-color: #d3d3d370">
                                                                    <td width="5%" style="text-align: center; vertical-align:middle"><b>
                                                                            <font size="2"> Produk Biodiesel dan Glycerine</font>
                                                                        </b></td>
                                                                    {{-- <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                            <font size="2">Kod Produk</font>
                                                                        </b></td> --}}
                                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                            <font size="2">Stok Awal Di Premis</font>
                                                                        </b></td>
                                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                            <font size="2">Belian/Terimaan</font>
                                                                        </b></td>
                                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                            <font size="2">Pengeluaran</font>
                                                                        </b></td>
                                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                            <font size="2">Digunakan Untuk Proses Selanjutnya</font>
                                                                        </b></td>
                                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                            <font size="2">Jualan/Edaran Tempatan</font>
                                                                        </b></td>
                                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                            <font size="2">Eksport</font>
                                                                        </b></td>
                                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                            <font size="2">Stok Akhir Dilapor</font>
                                                                        </b></td>
                                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                            <font size="2">Kemaskini</font>
                                                                        </b></td>
                                                                    <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                            <font size="2">Tindakan</font>
                                                                        </b></td>
                                                                </tr>

                                                                @php
                                                                    $total_col_ebio_c4 = 0;
                                                                    $total_col_ebio_c5 = 0;
                                                                    $total_col_ebio_c6 = 0;
                                                                    $total_col_ebio_c7 = 0;
                                                                    $total_col_ebio_c8 = 0;
                                                                    $total_col_ebio_c9 = 0;
                                                                    $total_col_ebio_c10 = 0;
                                                                @endphp
                                                                @foreach ($penyataiii as $penyataiii2)

                                                                    <form action="{{ route('admin.kemaskini.maklumat.bio.exe.iii.dahulu',  [$penyataiii2->ebio_c1] ) }}"  class="sub-form"
                                                                        method="post" id="form4" >
                                                                        @csrf

                                                                        <tr>
                                                                            <td align="left">
                                                                                <select class="form-control" id="ebio_c3" name="ebio_c3"  onchange="ajax_produk(this);">
                                                                                    <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                                                    @foreach ($produkiii as $prods)
                                                                                        <option value="{{ $prods->prodid }}"  {{(old('ebio_c3', $penyataiii2->produk->prodid) == $prods->prodid ? 'selected' : '')}} >
                                                                                            {{ $prods->proddesc }} - {{ $prods->prodid }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                {{-- <font size="2">{{ $penyataia->produk->proddesc }}</font> --}}
                                                                            </td>
                                                                            {{-- <td align="center">
                                                                                <font size="2">{{ $penyataia->ebio_b4 }}</font>
                                                                            </td> --}}
                                                                            <td align="right">
                                                                                <input type="text" name='ebio_c4' style="text-align: right" id='ebio_c4'
                                                                                class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                                value="{{ number_format($penyataiii2->ebio_c4 ??  0,2) }}">
                                                                            </td>
                                                                            <td align="right">
                                                                                <input type="text" name='ebio_c5' style="text-align: right" id='ebio_c5'
                                                                                class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                                value="{{ number_format($penyataiii2->ebio_c5 ??  0,2) }}">
                                                                            </td>
                                                                            <td align="right">
                                                                                <input type="text" name='ebio_c6' style="text-align: right" id='ebio_c6'
                                                                                class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                                value="{{ number_format($penyataiii2->ebio_c6 ??  0,2) }}">
                                                                            </td>
                                                                            <td align="right">
                                                                                <input type="text" name='ebio_c7' style="text-align: right" id='ebio_cb7'
                                                                                class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                                value="{{ number_format($penyataiii2->ebio_c7 ??  0,2) }}">
                                                                            </td>
                                                                            @if ($penyataiii2->produk->prodid == 'AW')
                                                                                <td align="right" id="data_hidden2">
                                                                                    <input type="text" name='ebio_c8' style="text-align: right" id='ebio_c8_2'
                                                                                    class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                                    value="{{ number_format($penyataiii2->ebio_c8 ??  0,2) }}" readonly>
                                                                                        <a  href="{{ route('admin.view.bahagian.iii.sykt.dahulu', $penyataiii2->ebio_c1) }}" >
                                                                                            <i class="far fa-file-alt"
                                                                                                style="color: blue; cursor: pointer;"></i></a>

                                                                                </td>
                                                                            @else
                                                                                <td align="right">
                                                                                    <input type="text" name='ebio_c8' style="text-align: right" id='ebio_c8'
                                                                                    class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                                    value="{{ number_format($penyataiii2->ebio_c8 ??  0,2) }}">

                                                                                </td>
                                                                            @endif
                                                                            <td align="right">
                                                                                <input type="text" name='ebio_c9' style="text-align: right" id='ebio_c9'
                                                                                class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                                value="{{ number_format($penyataiii2->ebio_c9 ??  0,2) }}">
                                                                            <td align="right">
                                                                                <input type="text" name='ebio_c10' style="text-align: right" id='ebio_c10'
                                                                                class="form-control" onkeypress="return isNumberKey(event)" oninput="FormatCurrency(this);"
                                                                                value="{{ number_format($penyataiii2->ebio_c10 ??  0,2) }}">
                                                                            </td>
                                                                            <td>


                                                                                <div class="icon" style="text-align: center">

                                                                                    <button type="submit" class="btn" style="background-color: rgba(196, 67, 67, 0)">
                                                                                        <i class="fa fa-edit" style="color: #2fb851;font-size:18px"></i>
                                                                                    </button>

                                                                                </div>



                                                                            </td>
                                                                            <td>
                                                                                <div class="icon" style="text-align: center">
                                                                                    <a href="#" type="button" data-toggle="modal"
                                                                                        data-target="#next4{{ $penyataiii2->ebio_c1 }}">
                                                                                        <i class="fa fa-trash"
                                                                                            style="color: #dc3545;font-size:18px"></i>
                                                                                    </a>
                                                                                </div>

                                                                            </td>
                                                                            @php
                                                                                $total_col_ebio_c4 += $penyataiii2->ebio_c4 ?? 0  ;
                                                                                $total_col_ebio_c5 += $penyataiii2->ebio_c5 ?? 0  ;
                                                                                $total_col_ebio_c6 += $penyataiii2->ebio_c6 ?? 0  ;
                                                                                $total_col_ebio_c7 += $penyataiii2->ebio_c7 ?? 0  ;
                                                                                $total_col_ebio_c8 += $penyataiii2->ebio_c8 ?? 0  ;
                                                                                $total_col_ebio_c9 += $penyataiii2->ebio_c9 ?? 0  ;
                                                                                $total_col_ebio_c10 += $penyataiii2->ebio_c10 ?? 0  ;
                                                                            @endphp

                                                                        </tr>
                                                                    </form>
                                                                    <div class="modal fade" id="next4{{ $penyataiii2->ebio_c1 }}" tabindex="-1"
                                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                                        aria-hidden="true">
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
                                                                                        Anda pasti mahu menghapus produk ini?
                                                                                    </p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-primary ml-1"
                                                                                        data-dismiss="modal">
                                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                                        <span class="d-none d-sm-block">Tidak</span>
                                                                                    </button>
                                                                                    <a href="{{ route('admin.delete.bahagian.iii.dahulu', [$penyataiii2->ebio_c1]) }}"
                                                                                        type="button" class="btn btn-light-secondary"
                                                                                        style="color: #275047; background-color: #a1929238">
                                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                                        <span class="d-none d-sm-block">Ya</span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                @endforeach

                                                                <form action="{{ route('admin.add.bahagian.iii.dahulu', [$penyata->ebio_nobatch] ) }}" method="post" id="subs5">
                                                                    @csrf
                                                                    {{-- <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                                        class="table table-bordered" style="padding: 0.2rem 0.3rem">
                                                                        <tbody> --}}

                                                                            <tr>
                                                                                <td align="left">
                                                                                    <select class="form-control select2" id="produk24" name="ebio_c3" >
                                                                                        <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                                                        @foreach ($produkiiiaw as $prods)
                                                                                            <option value="{{ $prods->prodid }}"  >
                                                                                                {{ $prods->proddesc }} - {{ $prods->prodid }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name='ebio_c4' style="text-align: right"
                                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name='ebio_c5' style="text-align: right"
                                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name='ebio_c6' style="text-align: right"
                                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name='ebio_c7' style="text-align: right"
                                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                                </td>
                                                                                <td id="data_hidden">
                                                                                    <input type="text" name='ebio_c8' id="ebio_c8" style="text-align: right" onchange="autodecimal(this); FormatCurrency(this)"
                                                                                    onkeypress="return isNumberKey(event)"
                                                                                    class="form-control">
                                                                                    {{-- <div id="merah_container_new" style="display:none" class="blink_me">
                                                                                        <i class="fa fa-pencil-alt" title="Pengisian maklumat jualan"
                                                                                            style="font-size:11px; color:red; font:rubik" type="button"
                                                                                            data-toggle="modal" data-target="#modal_new" &nbsp;> (Sila klik untuk
                                                                                            mengisi<br> maklumat
                                                                                            jualan) </i>

                                                                                    </div> --}}

                                                                                {{-- <table id="cc3_4_new"></table> --}}
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name='ebio_c9' style="text-align: right"
                                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name='ebio_c10' style="text-align: right"
                                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                                </td>
                                                                                <td colspan="2">
                                                                                    <div class="icon" style="text-align: center">
                                                                                        <a href="javascript: submitFormAddkini();" >
                                                                                            <i class="fa fa-plus"
                                                                                                style="color: #237f46;font-size:18px"></i>
                                                                                        </a>
                                                                                    </div>

                                                                                </td>
                                                                                <script>
                                                                                    function submitFormAddkini(){
                                                                                        $('#subs5').submit();
                                                                                    }
                                                                                </script>
                                                                            </tr>
                                                                        {{-- </tbody>
                                                                    </table> --}}
                                                                </form>
                                                                <tr>
                                                                    <td align="center" >
                                                                        <font size="2"><b>JUMLAH</b></font>
                                                                    </td>
                                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_c4 ?? 0,2) }}</b></td>
                                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_c5 ?? 0,2) }}</b></td>
                                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_c6 ?? 0,2) }}</b></td>
                                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_c7 ?? 0,2) }}</b></td>
                                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_c8 ?? 0,2) }}</b></td>
                                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_c9 ?? 0,2) }}</b></td>
                                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_c10 ?? 0,2) }}</b></td>
                                                                    {{-- <td colspan="2">-</td> --}}
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </form>
                                                    @if ($penyataiii2->produk->prodid != 'AW')

                                                        <div class="" id="aw">
                                                            <a onclick="showAW()"
                                                            style="font-size:11px; color:blue; font:rubik; font-family:'Rubik', 'sans-serif';"
                                                            &nbsp;> (Sila Klik Disini untuk mengisi bagi Produk: PALM DIESEL / BIODIESEL / METHYL ESTER - AW) </a>
                                                        </div>

                                                    @endif

                                                    <div id="aw_container" style="display: none">

                                                        <form action="{{ route('admin.add.bahagian.iii.dahulu', [$penyata->ebio_nobatch] ) }}" method="post" id="add16">
                                                            @csrf
                                                            <table border="1" width="100%" cellspacing="0" cellpadding="0" id="main"
                                                                class="table table-bordered" style="padding: 0.2rem 0.3rem">
                                                                <tbody>
                                                                    <tr style="background-color: #d3d3d370">
                                                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                                <font size="2">Nama Produk Biodiesel</font>
                                                                            </b></td>
                                                                        {{-- <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                                <font size="2">Kod Produk</font>
                                                                            </b></td> --}}
                                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                                <font size="2">Stoks Awal Di Premis</font>
                                                                            </b></td>
                                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                                <font size="2">Belian/Terimaan</font>
                                                                            </b></td>
                                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                                <font size="2">Pengeluaran</font>
                                                                            </b></td>
                                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                                <font size="2">Digunakan Untuk Proses Selanjutnya</font>
                                                                            </b></td>
                                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                                <font size="2">Jualan/Edaran Tempatan</font>
                                                                            </b></td>
                                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                                <font size="2">Eksport</font>
                                                                            </b></td>
                                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                                <font size="2">Stok Akhir Dilapor</font>
                                                                            </b></td>
                                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                                <font size="2">Kemaskini</font>
                                                                            </b></td>
                                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                                <font size="2">Tindakan</font>
                                                                            </b></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td align="left">
                                                                            <select class="form-control select2" id="produk2" name="ebio_c3"  onchange="showDetail2()">
                                                                                <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                                                @foreach ($produkiii_2 as $prods)
                                                                                    <option value="{{ $prods->prodid }}"  >
                                                                                        {{ $prods->proddesc }} - {{ $prods->prodid }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name='ebio_c4' style="text-align: right"
                                                                            class="form-control" onkeypress="return isNumberKey(event)">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name='ebio_c5' style="text-align: right"
                                                                            class="form-control" onkeypress="return isNumberKey(event)">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name='ebio_c6' style="text-align: right"
                                                                            class="form-control" onkeypress="return isNumberKey(event)">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name='ebio_c7' style="text-align: right"
                                                                            class="form-control" onkeypress="return isNumberKey(event)">
                                                                        </td>
                                                                        <td id="data_hidden_new">
                                                                            <input type="text" name='ebio_c8' id="ebio_c8_new" style="text-align: right" onchange="autodecimal(this); FormatCurrency(this)"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            class="form-control">
                                                                            <div id="merah_container_new" style="display:none" class="blink_me">
                                                                                <i class="fa fa-pencil-alt" title="Pengisian maklumat jualan"
                                                                                    style="font-size:11px; color:red; font:rubik" type="button"
                                                                                    data-toggle="modal" data-target="#modal_new" &nbsp;> (Sila klik untuk
                                                                                    mengisi<br> maklumat
                                                                                    jualan) </i>
                                                                        <table id="cc3_4_new"></table>

                                                                            </div>

                                                                        </td>

                                                                        <td>
                                                                            <input type="text" name='ebio_c9' style="text-align: right"
                                                                            class="form-control" onkeypress="return isNumberKey(event)">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name='ebio_c10' style="text-align: right"
                                                                            class="form-control" onkeypress="return isNumberKey(event)">
                                                                        </td>
                                                                        <td colspan="2">
                                                                            <div class="icon" style="text-align: center">
                                                                                <a href="javascript: submitFormAdd16();" >
                                                                                    <i class="fa fa-plus"
                                                                                        style="color: #237f46;font-size:18px"></i>
                                                                                </a>
                                                                            </div>

                                                                        </td>

                                                                        {{-- INPUT HIDDEN
                                                                        <input type="hidden" name="jumlah_row[]">
                                                                        INPUT HIDDEN2
                                                                        <input type="hidden" name="jumlah_row1[]"> --}}

                                                                        <script>
                                                                            function submitFormAdd16(){
                                                                                $('#add16').submit();
                                                                            }
                                                                        </script>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                    </div><br>

                                                    <script>
                                                        submitForms = function(){
                                                            document.getElementById("form4").submit();
                                                            // document.getElementById("form2").submit();
                                                        }
                                                    </script>
                                                {{-- @endforeach --}}

                                            @else
                                                <form action="{{ route('admin.add.bahagian.iii.dahulu', [$penyata->ebio_nobatch] ) }}" method="post" id="add15">
                                                    @csrf
                                                    <table border="1" width="100%" cellspacing="0" cellpadding="0" id="main"
                                                        class="table table-bordered" style="padding: 0.2rem 0.3rem">
                                                        <tbody>
                                                            <tr style="background-color: #d3d3d370">
                                                                <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                        <font size="2"> Produk Biodiesel dan Glycerine</font>
                                                                    </b></td>
                                                                {{-- <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                        <font size="2">Kod Produk</font>
                                                                    </b></td> --}}
                                                                <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                        <font size="2">Stoks Awal Di Premis</font>
                                                                    </b></td>
                                                                <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                        <font size="2">Belian/Terimaan</font>
                                                                    </b></td>
                                                                <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                        <font size="2">Pengeluaran</font>
                                                                    </b></td>
                                                                <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                        <font size="2">Digunakan Untuk Proses Selanjutnya</font>
                                                                    </b></td>
                                                                <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                        <font size="2">Jualan/Edaran Tempatan</font>
                                                                    </b></td>
                                                                <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                        <font size="2">Eksport</font>
                                                                    </b></td>
                                                                <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                        <font size="2">Stok Akhir Dilapor</font>
                                                                    </b></td>
                                                                <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                        <font size="2">Kemaskini</font>
                                                                    </b></td>
                                                                <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                        <font size="2">Tindakan</font>
                                                                    </b></td>
                                                            </tr>

                                                            <tr>
                                                                <td align="left">
                                                                    <select class="form-control select2" id="produk" name="ebio_c3"  onchange="showDetail()">
                                                                        <option selected value="">Sila Pilih Kumpulan Produk</option>
                                                                        @foreach ($produkiii as $prods)
                                                                            <option value="{{ $prods->prodid }}"  >
                                                                                {{ $prods->proddesc }} - {{ $prods->prodid }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_c4' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_c5' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_c6' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_c7' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td id="data_hidden">
                                                                    <input type="text" name='ebio_c8' id="ebio_c8" style="text-align: right" onchange="autodecimal(this); FormatCurrency(this)"
                                                                    onkeypress="return isNumberKey(event)"
                                                                    class="form-control">
                                                                    <div id="merah_container" style="display:none" class="blink_me">
                                                                        <i class="fa fa-pencil-alt" title="Pengisian maklumat jualan"
                                                                            style="font-size:11px; color:red; font:rubik" type="button"
                                                                            data-toggle="modal" data-target="#modal" &nbsp;> (Sila klik untuk
                                                                            mengisi<br> maklumat
                                                                            jualan) </i>

                                                                    </div>

                                                                <table id="cc3_4"></table>
                                                                </td>

                                                                <td>
                                                                    <input type="text" name='ebio_c9' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_c10' style="text-align: right"
                                                                    class="form-control" onkeypress="return isNumberKey(event)">
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="icon" style="text-align: center">
                                                                        <a href="javascript: submitFormAdd15();" >
                                                                            <i class="fa fa-plus"
                                                                                style="color: #237f46;font-size:18px"></i>
                                                                        </a>
                                                                    </div>

                                                                </td>

                                                                {{-- INPUT HIDDEN
                                                                <input type="hidden" name="jumlah_row[]">
                                                                INPUT HIDDEN2
                                                                <input type="hidden" name="jumlah_row1[]"> --}}

                                                                <script>
                                                                    function submitFormAdd15(){
                                                                        $('#add15').submit();
                                                                    }
                                                                </script>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                                <br>
                                            @endif




                                            <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">
                                                    BAHAGIAN 4 :&nbsp;&nbsp;&nbsp;&nbsp;EKSPORT PRODUK BIODIESEL DAN LAIN-LAIN PRODUK SAWIT

                                                </font>
                                            </b></p>
                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr style="background-color: #d3d3d370">
                                                    <td width="15%" align="center"><b>
                                                            <font size="2">Nama Produk Sawit</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Kod Produk</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Nombor Borang Kastam 2</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Tarikh Eksport</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Kuantiti
                                                                (Tan Metrik)</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                        <font size="2">Nilai (RM)</font>
                                                    </b></td>
                                                    <td width="8%" align="center"><b>
                                                        <font size="2">Kod Negara</font>
                                                    </b></td>
                                                    <td width="8%" align="center"><b>
                                                        <font size="2">Destinasi Negara</font>
                                                    </b></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>0.00</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>0.00</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table><br>

                                        <p><b>
                                            <font style="font-size: 15px" color="#0c7c85">
                                                BAHAGIAN 5 :&nbsp;&nbsp;&nbsp;&nbsp;IMPORT PRODUK SAWIT

                                            </font>
                                        </b></p>
                                        <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr style="background-color: #d3d3d370">
                                                    <td width="15%" align="center"><b>
                                                            <font size="2">Nama Produk Sawit</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Kod Produk</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Nombor Borang Kastam 1</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Tarikh Import</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                            <font size="2">Kuantiti
                                                                (Tan Metrik)</font>
                                                        </b></td>
                                                    <td width="8%" align="center"><b>
                                                        <font size="2">Nilai (RM)</font>
                                                    </b></td>
                                                    <td width="8%" align="center"><b>
                                                        <font size="2">Kod Negara</font>
                                                    </b></td>
                                                    <td width="8%" align="center"><b>
                                                        <font size="2">DNegara Sumber Import</font>
                                                    </b></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td style="text-align: center; vertical-align:middle">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>0.00</b></font>
                                                    </td>
                                                    <td align="right">
                                                        <font size="2"><b>0.00</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                    <td align="center">
                                                        <font size="2"><b>-</b></font>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table><br>


                                        <p><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                            adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>

                                        <p>Tarikh Penghantaran: &nbsp;&nbsp;
                                            {{ $formatteddate ?? '-' }}
                                        </p>

                                        <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                            {{ $penyata->pelesen->e_npg ?? '-' }}
                                        </p>
                                        <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                            {{ $penyata->pelesen->e_jpg ?? '-' }}
                                        </p>
                                        <p>No Telefon Kilang: &nbsp;&nbsp;

                                            {{ $penyata->ebio_notel ?? '-' }}
                                        </p>


                                    </body>


                                    <br><hr>
                                    {{-- <div class="row form-group" style="margin-top: 2%">
                                        <div class="text-right col-md-6">
                                            <button type="submit" class="btn btn-primary" onclick="submitForms()" >Simpan</button>
                                        </div>
                                    </div> --}}
                                {{-- </form> --}}
                            </div>

                    </div>


                </div>
            </div>


        </div>


        <!-- Syarikat Input Modal -->
        <div class="modal fade bs-example-modal-lg" id="modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Maklumat Jualan / Edaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive col-10 ml-auto mr-auto">

                            <div class="table-responsive">
                                <table class="table table-bordered" style="font-size: 13px" id="data_table">
                                    <thead style="text-align: center">
                                        <tr style="vertical-align: middle">
                                            <th style="vertical-align: middle;">Nama Syarikat</th>
                                            <th style="vertical-align: middle;">Jumlah Jualan / Edaran</th>
                                            <th style="vertical-align: middle;">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            {{-- <div class='field'> --}}

                                            <td class="field"><select class="form-control select2 "
                                                    style="width: 100px" id="new_syarikat[]"
                                                    name="new_syarikat[]" onchange="showDetail()"
                                                    oninput="removeDisabled()">
                                                    <option selected hidden disabled value="">Sila Pilih
                                                    </option>
                                                    @foreach ($syarikat as $data)
                                                        <option value="{{ $data->id }}">
                                                            {{ $data->pembeli }}
                                                        </option>
                                                    @endforeach

                                                </select></td>
                                            {{-- </div> --}}
                                            <td class="field"><input type="text" id="new_jumlah[]"
                                                    class="form-control" style="text-align: center"
                                                    onkeypress="return isNumberKey(event)" name='new_jumlah[]'>
                                                {{-- <div class='actions'> --}}

                                            <td style="size: 10ch" class="actions" align="center">
                                                <i class="fa fa-plus-circle center" type="button" id="tambah_maklumat"
                                                    onclick="add_row()" disabled="disabled" style="font-size:30px; color:green;">
                                                    {{-- <input  class="btn btn-primary ml-1 actions"
                                                    id="tambah_maklumat" onclick="add_row()" disabled="disabled"
                                                    value="Tambah Maklumat"> --}}
                                                </i>
                                            </td>
                                            {{-- </div> --}}
                                        </tr>
                                        <tr style="background-color: #d3d3d34d; text-align: center">

                                            <td><b>JUMLAH</b></td>
                                            <td><b><span id="total" name="total">
                                                    </span>
                                                    <input type="hidden" id="total_hidden" name="total_hidden">
                                                </b>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        </form>

                    </div>




                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                            <i class=" bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block" id="btnShow">Tambah</span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <!-- Syarikat Input Modal untuk baru -->
    <div class="modal fade bs-example-modal-lg" id="modal_new" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Maklumat Jualan / Edaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive col-10 ml-auto mr-auto">

                        <div class="table-responsive">
                            <table class="table table-bordered" style="font-size: 13px" id="data_table_new">
                                <thead style="text-align: center">
                                    <tr style="vertical-align: middle">
                                        <th style="vertical-align: middle;">Nama Syarikat</th>
                                        <th style="vertical-align: middle;">Jumlah Jualan / Edaran</th>
                                        <th style="vertical-align: middle;">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        {{-- <div class='field'> --}}

                                        <td class="field"><select class="form-control select2 "
                                                style="width: 100px" id="new_syarikat_new[]"
                                                name="new_syarikat[]" onchange="showDetail2()"
                                                oninput="removeDisabled2()">
                                                <option selected hidden disabled value="">Sila Pilih
                                                </option>
                                                @foreach ($syarikat as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->pembeli }}
                                                    </option>
                                                @endforeach

                                            </select></td>
                                        {{-- </div> --}}
                                        <td class="field"><input type="text" id="new_jumlah_new[]"
                                                class="form-control" style="text-align: center"
                                                onkeypress="return isNumberKey(event)" name='new_jumlah[]'>
                                            {{-- <div class='actions'> --}}

                                        <td style="size: 10ch" class="actions" align="center">
                                            <i class="fa fa-plus-circle center" type="button" id="tambah_maklumat_new"
                                                onclick="add_row_new()" disabled="disabled" style="font-size:30px; color:green;">
                                                {{-- <input  class="btn btn-primary ml-1 actions"
                                                id="tambah_maklumat" onclick="add_row()" disabled="disabled"
                                                value="Tambah Maklumat"> --}}
                                            </i>
                                        </td>
                                        {{-- </div> --}}
                                    </tr>
                                    <tr style="background-color: #d3d3d34d; text-align: center">

                                        <td><b>JUMLAH</b></td>
                                        <td><b><span id="total_new" name="total">
                                                </span>
                                                <input type="hidden" id="total_hidden_new" name="total_hidden">
                                            </b>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    </form>

                </div>




                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                        <i class=" bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block" id="btnShow">Tambah</span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>



    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>



    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" />
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.calc').change(function() {
                var total = 0;
                $('.calc').each(function() {
                    if ($(this).val() != '') {
                        total += parseInt($(this).val());
                    }
                });
                $('#total').html(total);
            });
        });
    </script>


    <script type="text/javascript">
        function showAW() {
            if (document.getElementById("aw_container").style.display === "none")
                document.getElementById("aw_container").style.display="block";
            else
                document.getElementById("aw_container").style.display="none";
                }
    </script>

    <script type="text/javascript">
        function showDetail() {
            var produk = $('#produk').val();
            // const total = $produk2;

            if (produk == "AW") {
                document.getElementById('merah_container').style.display = "block";
                $('#ebio_c8').attr('readonly', 'readonly');
                $('#ebio_c8').attr('value', ' 0.00');

                // document.getElementById('isaw').style.display = "block";
                // document.getElementById('notaw').style.display = "none";
                // document.getElementById('lain_container').style.display = "block";
            } else {
                document.getElementById('merah_container').style.display = "none";
                $('#ebio_c8').removeAttr('readonly');
                $('#ebio_c8').removeAttr('value');
                // document.getElementById('isaw').style.display = "none";
                // document.getElementById('notaw').style.display = "block";
                // document.getElementById('lain_container').style.display = "block";

            }
        }
    </script>
    <script>
        function removeDisabled() {

            var new_syarikat = document.getElementById("new_syarikat[]").value;
            // var new_jumlah = document.getElementById("new_jumlah[]").value;
            // console.log(new_syarikat);
            var table_input = document.getElementById("data_table");
            var table_input_len = (table_input.rows.length) - 1;

            if (new_syarikat != "") {
                $('#tambah_maklumat').attr('disabled', 'disabled');
            } else {
                $('#tambah_maklumat').attr('disabled', false);
            }
        }
    </script>


    <script type="text/javascript" src="{{ asset('js/table_scripts.js') }}"></script>
    <script>
        function add_row() {
            var new_syarikat = document.getElementById("new_syarikat[]").value;
            var new_jumlah = document.getElementById("new_jumlah[]").value;

            var nama_syarikat = document.getElementById("new_syarikat[]").options[document.getElementById("new_syarikat[]")
                .selectedIndex].text;

            var table = document.getElementById("data_table");
            var table_len = (table.rows.length) - 2;

            var row = table.insertRow(table_len).outerHTML = "<tr id='row" + table_len + "'><td style='text-align:center' id='syarikat_row" +
                table_len + "'>" + nama_syarikat + "</td><td id='jumlah_row" + table_len + "' style=" +
                "text-align:center" + ">" + (parseFloat(new_jumlah).toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +
                "</td><td><input type='hidden' id='jumlah_row" + table_len +
                "' name='jumlah_row_input[]' value=" + new_jumlah +
                "> <input type='button' value='Hapus' style='display: block; margin: auto' class='btn btn-danger ml-1' onclick='delete_row(" + table_len +
                ")'></td></tr>";

            var table_input = document.getElementById("cc3_4");
            var table_input_len = (table_input.rows.length);

            // var row_input = table_input.insertRow(table_input_len).outerHTML =
            //     "<tr id='row_input" + table_input_len + "'><td><input  id='jumlah_row_hidden" +
            //     table_input_len +
            //     "' name='jumlah_row_hidden[]' value=" + new_jumlah +
            //     "><input id='new_syarikat_hidden" + table_input_len +
            //     "' name='new_syarikat_hidden[]' value=" + new_syarikat +
            //     "></td></tr>";
            document.getElementsByName("new_syarikat_hidden[]").value = new_syarikat;
            document.getElementsByName("jumlah_row_hidden[]").value = new_jumlah;

            var content = document.getElementById("data_hidden");

            $('#data_hidden').append('<input type="hidden" name="new_syarikat_hidden[]"  id="new_syarikat_hidden" value="'+ new_syarikat +'" />');
            $('#data_hidden').append('<input type="hidden" name="jumlah_row_hidden[]"  id="jumlah_row_hidden" value="'+ new_jumlah +'" />');

            document.getElementById("new_syarikat[]").value = "";
            document.getElementById("new_jumlah[]").value = "";

            let total = 0;
            console.log(table_input_len);

            for(var i=0;i<document.getElementsByName("jumlah_row_input[]").length;i++){
                var hidden_value = document.getElementsByName("jumlah_row_input[]")[i].value;
                // console.log('hidden_value',hidden_value);
                total += parseFloat(hidden_value);
                // total2 = parseFloat(total).toFixed(2);

            }

            // for (let index = 0; index <= table_input_len; index++) {
            //     let hidden_value = document.getElementById("jumlah_row_hidden" + index).value;
            //     total += parseInt(hidden_value);
            // }
            // new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(number);
            // var num2 = total.toFixed(2);
            // var num1 = new Intl.NumberFormat().format(total);

            // console.log((total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            document.getElementById("ebio_c8").value = (total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "");
            document.getElementById("total").innerHTML = (total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            // document.getElementById("ebio_c8").value = new Intl.NumberFormat().format(total.toFixed(2));
            // console.log("total", total);
                console.log(document.getElementById("ebio_c8").value);

        }

        function delete_row(no) {
            document.getElementById("row" + no + "").remove();
            // document.getElementById("row_input" + no + "").outerHTML = "";
            document.getElementById("jumlah_row_hidden" + (no - 2)).remove();
            document.getElementById("new_syarikat_hidden" + (no - 2)).remove();

            var x = document.getElementsByName('jumlah_row_hidden[]');

            let total = 0;

            for (let index = 0; index < x.length; index++) {
                // let hidden_value = document.getElementById("jumlah_row_hidden" + index).value;
                let hidden_value = x[index].value;
                console.log('hidden_value', hidden_value);
                total += parseInt(hidden_value);
            }
            document.getElementById("ebio_c8").value = (total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>


    <script type="text/javascript">
        function showDetail2() {
            var produk = $('#produk2').val();
            // const total = $produk2;

            if (produk == "AW") {
                document.getElementById('merah_container_new').style.display = "block";
                $('#ebio_c8_new').attr('readonly', 'readonly');
                $('#ebio_c8_new').attr('value', ' 0.00');

                // document.getElementById('isaw').style.display = "block";
                // document.getElementById('notaw').style.display = "none";
                // document.getElementById('lain_container').style.display = "block";
            } else {
                document.getElementById('merah_container_new').style.display = "none";
                $('#ebio_c8_new').removeAttr('readonly');
                $('#ebio_c8_new').removeAttr('value');
                // document.getElementById('isaw').style.display = "none";
                // document.getElementById('notaw').style.display = "block";
                // document.getElementById('lain_container').style.display = "block";

            }
        }
    </script>
    <script>
        function removeDisabled2() {

            var new_syarikat = document.getElementById("new_syarikat_new[]").value;
            // var new_jumlah = document.getElementById("new_jumlah[]").value;
            // console.log(new_syarikat);
            var table_input = document.getElementById("data_table_new");
            var table_input_len = (table_input.rows.length) - 1;

            if (new_syarikat != "") {
                $('#tambah_maklumat_new').attr('disabled', 'disabled');
            } else {
                $('#tambah_maklumat_new').attr('disabled', false);
            }
        }
    </script>


    <script type="text/javascript" src="{{ asset('js/table_scripts.js') }}"></script>
    <script>
        function add_row_new() {
            var new_syarikat = document.getElementById("new_syarikat_new[]").value;
            var new_jumlah = document.getElementById("new_jumlah_new[]").value;

            var nama_syarikat = document.getElementById("new_syarikat_new[]").options[document.getElementById("new_syarikat_new[]")
                .selectedIndex].text;

            var table = document.getElementById("data_table_new");
            var table_len = (table.rows.length) - 2;

            var row = table.insertRow(table_len).outerHTML = "<tr id='row" + table_len + "'><td style='text-align:center' id='syarikat_row" +
                table_len + "'>" + nama_syarikat + "</td><td id='jumlah_row" + table_len + "' style=" +
                "text-align:center" + ">" + (parseFloat(new_jumlah).toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +
                "</td><td><input type='hidden' id='jumlah_row" + table_len +
                "' name='jumlah_row_input[]' value=" + new_jumlah +
                "> <input type='button' value='Hapus' style='display: block; margin: auto' class='btn btn-danger ml-1' onclick='delete_row2(" + table_len +
                ")'></td></tr>";

            var table_input = document.getElementById("cc3_4_new");
            var table_input_len = (table_input.rows.length);

            // var row_input = table_input.insertRow(table_input_len).outerHTML =
            //     "<tr id='row_input" + table_input_len + "'><td><input  id='jumlah_row_hidden" +
            //     table_input_len +
            //     "' name='jumlah_row_hidden[]' value=" + new_jumlah +
            //     "><input id='new_syarikat_hidden" + table_input_len +
            //     "' name='new_syarikat_hidden[]' value=" + new_syarikat +
            //     "></td></tr>";
            document.getElementsByName("new_syarikat_hidden[]").value = new_syarikat;
            document.getElementsByName("jumlah_row_hidden[]").value = new_jumlah;

            var content = document.getElementById("data_hidden_new");

            $('#data_hidden_new').append('<input type="hidden" name="new_syarikat_hidden[]"  id="new_syarikat_hidden2" value="'+ new_syarikat +'" />');
            $('#data_hidden_new').append('<input type="hidden" name="jumlah_row_hidden[]"  id="jumlah_row_hidden2" value="'+ new_jumlah +'" />');

            document.getElementById("new_syarikat_new[]").value = "";
            document.getElementById("new_jumlah_new[]").value = "";

            let total = 0;
            console.log(table_input_len);

            for(var i=0;i<document.getElementsByName("jumlah_row_input[]").length;i++){
                var hidden_value = document.getElementsByName("jumlah_row_input[]")[i].value;
                // console.log('hidden_value',hidden_value);
                total += parseFloat(hidden_value);
                // total2 = parseFloat(total).toFixed(2);

            }

            // for (let index = 0; index <= table_input_len; index++) {
            //     let hidden_value = document.getElementById("jumlah_row_hidden" + index).value;
            //     total += parseInt(hidden_value);
            // }
            // new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(number);
            // var num2 = total.toFixed(2);
            // var num1 = new Intl.NumberFormat().format(total);

            // console.log((total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            document.getElementById("ebio_c8_new").value = (total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "");
            document.getElementById("total_new").innerHTML = (total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            // document.getElementById("ebio_c8").value = new Intl.NumberFormat().format(total.toFixed(2));
            // console.log("total", total);
                console.log(document.getElementById("ebio_c8_new").value);

        }

        function delete_row2(no) {
            document.getElementById("row" + no + "").remove();
            // document.getElementById("row_input" + no + "").outerHTML = "";
            document.getElementById("jumlah_row_hidden2" + (no - 2)).remove();
            document.getElementById("new_syarikat_hidden2" + (no - 2)).remove();

            var x = document.getElementsByName('jumlah_row_hidden[]');

            let total = 0;

            for (let index = 0; index < x.length; index++) {
                // let hidden_value = document.getElementById("jumlah_row_hidden" + index).value;
                let hidden_value = x[index].value;
                console.log('hidden_value', hidden_value);
                total += parseInt(hidden_value);
            }
            document.getElementById("ebio_c8_new").value = (total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>




@endsection
