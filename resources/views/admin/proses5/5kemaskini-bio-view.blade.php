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

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_ap1 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_ap2 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_ap3 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat Surat Menyurat</td>

                                                    <td width="65%"><b>{{ $penyata->e_as1 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_as2 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">&nbsp;</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_as3 }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Telefon</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_notel }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">No Faks </td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_nofax }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Alamat emel </td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_email }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Melapor</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_npg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Melapor</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_jpg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Nama Pegawai Bertanggungjawab</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_npgtg }}</b></td>

                                                </tr>

                                                <tr>

                                                    <td width="35%">Jawatan Pegawai Bertanggungjawab</td>

                                                    <td width="65%"><b>{{ $penyata->pelesen->e_jpgtg }}</b></td>

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
                                                                <font size="2">Nama Produk Minyak Sawit</font>
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
                                                    @if($penyataia && !$penyataia->isEmpty())
                                                        @php
                                                            $total_col_ebio_b5 = 0;
                                                            $total_col_ebio_b6 = 0;
                                                            $total_col_ebio_b7 = 0;
                                                            $total_col_ebio_b8 = 0;
                                                            $total_col_ebio_b9 = 0;
                                                            $total_col_ebio_b10 = 0;
                                                            $total_col_ebio_b11 = 0;
                                                        @endphp

                                                        @foreach ($penyataia as $penyataia2)
                                                            <form action="{{ route('admin.kemaskini.maklumat.bio.exe',  [$penyataia2->ebio_b1] ) }}"
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
                                                                        <input type="text" name='ebio_b5' style="text-align: right"
                                                                        class="form-control"
                                                                        value="{{ number_format($penyataia2->ebio_b5 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b6' style="text-align: right"
                                                                        class="form-control"
                                                                        value="{{ number_format($penyataia2->ebio_b6 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b7' style="text-align: right"
                                                                        class="form-control"
                                                                        value="{{ number_format($penyataia2->ebio_b7 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b8' style="text-align: right"
                                                                        class="form-control"
                                                                        value="{{ number_format($penyataia2->ebio_b8 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b9' style="text-align: right"
                                                                        class="form-control"
                                                                        value="{{ number_format($penyataia2->ebio_b9 ??  0,2) }}">
                                                                    </td>
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b10' style="text-align: right"
                                                                        class="form-control"
                                                                        value="{{ number_format($penyataia2->ebio_b10 ??  0,2) }}">
                                                                    <td align="right">
                                                                        <input type="text" name='ebio_b11' style="text-align: right"
                                                                        class="form-control"
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
                                                                            <a href="{{ route('admin.delete.bahagian.ia', [$penyataia2->ebio_b1]) }}"
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
                                                            <form action="{{ route('admin.add.bahagian.ia', [$penyataia2->ebio_reg] ) }}" method="post" id="add">
                                                                @csrf
                                                                <td align="left">
                                                                    <select class="form-control" id="ebio_b4" name="ebio_b4"  onchange="ajax_produk(this);" >
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
                                                                    class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b6' style="text-align: right"
                                                                    class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b7' style="text-align: right"
                                                                    class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b8' style="text-align: right"
                                                                    class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b9' style="text-align: right"
                                                                    class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b10' style="text-align: right"
                                                                    class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name='ebio_b11' style="text-align: right"
                                                                    class="form-control">
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
                                                    @else
                                                        <tr>
                                                            <td colspan="14" class="text-center" style="height:30px">Tiada Rekod</td>
                                                        </tr>
                                                    @endif

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
                                                                <font size="2">Nama Produk Isirung Sawit </font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
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
                                                    </tr>
                                                    @if($penyataib && !$penyataib->isEmpty())
                                                        @php
                                                            $total_col_ebio_b5 = 0;
                                                            $total_col_ebio_b6 = 0;
                                                            $total_col_ebio_b7 = 0;
                                                            $total_col_ebio_b8 = 0;
                                                            $total_col_ebio_b9 = 0;
                                                            $total_col_ebio_b10 = 0;
                                                            $total_col_ebio_b11 = 0;
                                                        @endphp
                                                        @foreach ($penyataib as $penyataib)
                                                            <tr>
                                                                <td align="left">
                                                                    <font size="2">{{ $penyataib->produk->proddesc }}</font>
                                                                </td>
                                                                <td align="center">
                                                                    <font size="2">{{ $penyataib->ebio_b4 }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{ number_format($penyataib->ebio_b5 ??  0,2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{ number_format($penyataib->ebio_b6 ??  0,2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{ number_format($penyataib->ebio_b7 ??  0,2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{ number_format($penyataib->ebio_b8 ??  0,2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{ number_format($penyataib->ebio_b9 ??  0,2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{ number_format($penyataib->ebio_b10 ??  0,2) }}</font>
                                                                </td>
                                                                <td align="right">
                                                                    <font size="2">{{ number_format($penyataib->ebio_b11 ??  0,2) }}</font>
                                                                </td>
                                                                @php
                                                                    $total_col_ebio_b5 += $penyataib->ebio_b5 ?? 0  ;
                                                                    $total_col_ebio_b6 += $penyataib->ebio_b6 ?? 0  ;
                                                                    $total_col_ebio_b7 += $penyataib->ebio_b7 ?? 0  ;
                                                                    $total_col_ebio_b8 += $penyataib->ebio_b8 ?? 0  ;
                                                                    $total_col_ebio_b9 += $penyataib->ebio_b9 ?? 0  ;
                                                                    $total_col_ebio_b10 += $penyataib->ebio_b10 ?? 0  ;
                                                                    $total_col_ebio_b11 += $penyataib->ebio_b11 ?? 0  ;
                                                                @endphp
                                                            </tr>

                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="14" class="text-center" style="height:30px">Tiada Rekod</td>
                                                        </tr>
                                                    @endif

                                                    <tr style="background-color: #d3d3d34d" >
                                                        <td align="center" colspan="2">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b5 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b6 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b7 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b8 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b9 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b10 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_b11 ?? 0,2) }}</b></td>

                                                    </tr>
                                                </tbody>
                                            </table><br>

                                            <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 1 (c) :&nbsp;&nbsp;&nbsp;&nbsp; MINYAK-MINYAK LAIN</font>
                                            </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Nama Produk Lain-Lain Minyak</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
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
                                                    </tr>
                                                    @if($penyataic && !$penyataic->isEmpty())
                                                        @php
                                                            $total_col_ebio_b5 = 0;
                                                            $total_col_ebio_b6 = 0;
                                                            $total_col_ebio_b7 = 0;
                                                            $total_col_ebio_b8 = 0;
                                                            $total_col_ebio_b9 = 0;
                                                            $total_col_ebio_b10 = 0;
                                                            $total_col_ebio_b11 = 0;
                                                        @endphp
                                                        @foreach ($penyataic as $penyataic)
                                                        <tr>
                                                            <td align="left">
                                                                <font size="2">{{ $penyataic->produk->prodname }}</font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2">{{ $penyataic->ebio_b4 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataic->ebio_b5 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataic->ebio_b6 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataic->ebio_b7 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataic->ebio_b8 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataic->ebio_b9 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataic->ebio_b10 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{number_format( $penyataic->ebio_b11 ??  0,2) }}</font>
                                                            </td>
                                                            @php
                                                                $total_col_ebio_b5 += $penyataic->ebio_b5 ?? 0  ;
                                                                $total_col_ebio_b6 += $penyataic->ebio_b6 ?? 0  ;
                                                                $total_col_ebio_b7 += $penyataic->ebio_b7 ?? 0  ;
                                                                $total_col_ebio_b8 += $penyataic->ebio_b8 ?? 0  ;
                                                                $total_col_ebio_b9 += $penyataic->ebio_b9 ?? 0  ;
                                                                $total_col_ebio_b10 += $penyataic->ebio_b10 ?? 0  ;
                                                                $total_col_ebio_b11 += $penyataic->ebio_b11 ?? 0  ;
                                                            @endphp
                                                        </tr>

                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="14" class="text-center" style="height:30px">Tiada Rekod</td>
                                                    </tr>
                                                @endif

                                                <tr style="background-color: #d3d3d34d" >
                                                    <td align="center" colspan="2">
                                                        <font size="2"><b>JUMLAH</b></font>
                                                    </td>
                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_b5 ?? 0,2) }}</b></td>
                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_b6 ?? 0,2) }}</b></td>
                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_b7 ?? 0,2) }}</b></td>
                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_b8 ?? 0,2) }}</b></td>
                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_b9 ?? 0,2) }}</b></td>
                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_b10 ?? 0,2) }}</b></td>
                                                    <td class="text-right"><b>{{  number_format($total_col_ebio_b11 ?? 0,2) }}</b></td>

                                                </tr>
                                                </tbody>
                                            </table><br>

                                            <p><b>
                                                    <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 2 :&nbsp;&nbsp;&nbsp;&nbsp;
                                                        HARI BEROPERASI DAN KADAR PENGGUNAAN KAPASITI PEMPROSESAN
                                                    </font>
                                                </b> </p>
                                            <table border="0" width="50%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="380">Jumlah Hari Kilang Beroperasi Sebulan</td>
                                                        <td width="100"><b>:{{ $penyataii->hari_operasi }} Hari</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="380">Kadar Penggunaan Kapasiti Sebulan</td>
                                                        <td width="100"><b>:{{ $penyataii->kapasiti }} %</b></td>
                                                    </tr>

                                                </tbody>
                                            </table><br>


                                            <p><b>
                                                <font style="font-size: 15px" color="#0c7c85">BAHAGIAN 3 :&nbsp;&nbsp;&nbsp;&nbsp; RINGKASAN PRODUK OLEOKIMIA</font>
                                            </b></p>
                                            <table border="1" width="100%" cellspacing="0" cellpadding="0"
                                                class="table table-bordered" style="padding: 0.2rem 0.3rem">
                                                <tbody>
                                                    <tr style="background-color: #d3d3d370">
                                                        <td width="13%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Nama Produk Biodiesel</font>
                                                            </b></td>
                                                        <td width="8%" style="text-align: center; vertical-align:middle"><b>
                                                                <font size="2">Kod Produk</font>
                                                            </b></td>
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
                                                    </tr>
                                                    @if($penyataiii && !$penyataiii->isEmpty())
                                                        @php
                                                            $total_col_ebio_c4 = 0;
                                                            $total_col_ebio_c5 = 0;
                                                            $total_col_ebio_c6 = 0;
                                                            $total_col_ebio_c7 = 0;
                                                            $total_col_ebio_c8 = 0;
                                                            $total_col_ebio_c9 = 0;
                                                            $total_col_ebio_c10 = 0;
                                                        @endphp
                                                        @foreach ($penyataiii as $penyataiii)
                                                        <tr>
                                                            <td align="left">
                                                                <font size="2">{{ $penyataiii->produk->proddesc }}</font>
                                                            </td>
                                                            <td align="center">
                                                                <font size="2">{{ $penyataiii->ebio_c3 }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataiii->ebio_c4 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataiii->ebio_c5 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataiii->ebio_c6 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataiii->ebio_c7 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataiii->ebio_c8 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataiii->ebio_c9 ??  0,2) }}</font>
                                                            </td>
                                                            <td align="right">
                                                                <font size="2">{{ number_format($penyataiii->ebio_c10 ??  0,2) }}</font>
                                                            </td>
                                                            @php
                                                                $total_col_ebio_c4 += $penyataiii->ebio_c4 ?? 0  ;
                                                                $total_col_ebio_c5 += $penyataiii->ebio_c5 ?? 0  ;
                                                                $total_col_ebio_c6 += $penyataiii->ebio_c6 ?? 0  ;
                                                                $total_col_ebio_c7 += $penyataiii->ebio_c7 ?? 0  ;
                                                                $total_col_ebio_c8 += $penyataiii->ebio_c8 ?? 0  ;
                                                                $total_col_ebio_c9 += $penyataiii->ebio_c9 ?? 0  ;
                                                                $total_col_ebio_c10 += $penyataiii->ebio_c10 ?? 0  ;
                                                            @endphp
                                                        </tr>

                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="14" class="text-center" style="height:30px">Tiada Rekod</td>
                                                        </tr>
                                                    @endif

                                                    <tr style="background-color: #d3d3d34d" >
                                                        <td align="center" colspan="2">
                                                            <font size="2"><b>JUMLAH</b></font>
                                                        </td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c4 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c5 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c6 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c7 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c8 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c9 ?? 0,2) }}</b></td>
                                                        <td class="text-right"><b>{{  number_format($total_col_ebio_c10 ?? 0,2) }}</b></td>

                                                    </tr>
                                                </tbody>
                                            </table><br>

                                            <p><b>
                                                    <font style="font-size: 15px" color="#0c7c85">
                                                        BAHAGIAN 4 :&nbsp;&nbsp;&nbsp;&nbsp;EKSPORT PRODUK OLEOKIMIA DAN LAIN-LAIN PRODUK SAWIT

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
                                                        <td class="text-center" colspan="8">Tiada Rekod</td>
                                                    </tr>

                                            </tbody>
                                        </table><br>


                                        <p><b>Saya mengaku bahawa maklumat yang diberikan sepanjang pengetahuan saya
                                            adalah tepat, benar, lengkap dan selaras dengan rekod harian.</b></p>

                                        <p>Tarikh Penghantaran: &nbsp;&nbsp;
                                            {{ $formatteddate }}
                                        </p>

                                        <p>Nama Pegawai Melapor: &nbsp;&nbsp;
                                            {{ $penyata->pelesen->e_npg }}
                                        </p>
                                        <p>Jawatan Pegawai Melapor: &nbsp;&nbsp;
                                            {{ $penyata->pelesen->e_jpg }}
                                        </p>
                                        <p>No Telefon Kilang: &nbsp;&nbsp;

                                            {{ $penyata->pelesen->e_notel }}
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

@endsection
