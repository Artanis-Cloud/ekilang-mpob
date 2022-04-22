@extends('layouts.main')

@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Kemasukan Penyata Bulanan</h4>
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
                <div class="card" style="margin-right:2%; margin-left:2%">
                    {{-- <div class="card-header border-bottom">
                        <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                    </div> --}}

                    <div class="card-body">
                        {{-- <div class="row"> --}}

                            <div class="pl-3">

                                <div class=" text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian 1</h3>
                                    <h5 style="color: rgb(39, 80, 71); font-size:14px">Maklumat Belian, Proses,
                                        Pengeluaran,
                                        Jualan/Edaran, Stok Akhir <br>(Berdasarkan dalam premis kilang sahaja)</h5>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>




                                <div class="col-12 mt-3">
                                    <div class="mb-2" style="text-align: right">
                                        <a href="{{ asset('manual/kilangbuah/1.pdf') }}" target="_blank"
                                            style="text-align:right"><i><u>Panduan
                                                    Mengisi Maklumat Bahagian I</u></i></a>
                                    </div>
                                    {{-- <div class="col-12 " id="table-bordered"> --}}

                                        <form action="{{ route('buah.update.bahagian.i', [$penyata->e91_reg]) }}"
                                            method="post">
                                            @csrf
                                            <div class="card">

                                                <div class="card-content">


                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-0">
                                                            <thead style="text-align: center">
                                                                <tr>
                                                                    <th>Butiran</th>
                                                                    <th>Buah Kelapa Sawit (FFB) <br>
                                                                        Kod 52</th>
                                                                    <th>Minyak Sawit Mentah (CPO)
                                                                        <br> Kod 01
                                                                    </th>
                                                                    <th>Isirung (PK) <br> Kod 51
                                                                    </th>
                                                                    <th>Minyak Keladak (Sludge Oil)
                                                                        <br> Kod 49
                                                                    </th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-bold-500">A.
                                                                        Stok Awal Di Premis</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10" name='e91_aa1'
                                                                            style="text-align: center" 
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_aa1 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10" name='e91_aa2'
                                                                            style="text-align: center"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_aa2 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10" name='e91_aa3'
                                                                            style="text-align: center"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_aa3 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10" name='e91_aa4'
                                                                            style="text-align: center"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_aa4 ?? 0 }}">
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">B.
                                                                        Belian / Terimaan</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10" name='e91_ab1' id="number"
                                                                            style="text-align: center"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ab1 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ab2'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ab2 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ab3'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ab3 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ab4'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ab4 ?? 0 }}">
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">C.
                                                                        Diproses</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ac1'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ac1 ?? 0 }}">
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text"size="10" style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"> --}}
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text"size="10" style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"> --}}
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text"size="10" style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"> --}}
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">D.
                                                                        Pengeluaran</td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text"size="10" style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"> --}}
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ad1'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ad1 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ad2'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ad2 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ad3'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ad3 ?? 0 }}">
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">E.
                                                                        Jualan / Edaran Tempatan</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ae1'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ae1 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ae2'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ae2 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ae3'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ae3 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ae4'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ae4 ?? 0 }}">
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">F.
                                                                        Eksport</td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text"size="10" style="text-align: center" disabled> --}}
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text"size="10" style="text-align: center" disabled> --}}
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text"size="10" style="text-align: center" disabled> --}}
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text"size="10" style="text-align: center" disabled> --}}
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">G.
                                                                        Stok Akhir Di Premis</td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ag1'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ag1 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ag2'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ag2 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ag3'
                                                                            onkeypress="return isNumberKey(event)"
                                                                            onchange="setTwoNumberDecimal"
                                                                            value="{{ $penyata->e91_ag3 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10"
                                                                            style="text-align: center" name='e91_ag4'
                                                                            onchange="setTwoNumberDecimal"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e91_ag4 ?? 0 }}">
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row" style=" float:right">

                                                <div class="col-md-12">
                                                    <div class="row form-group" style="padding-top: 10px; ">
                                                        <div class="text-right col-md-12">
                                                            <button type="submit" class="btn btn-primary ">Simpan &
                                                                Seterusnya</button>
                                                        </div>
                                                    </div>
                                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalCenter">
                                                        Simpan & Seterusnya
                                                    </button> --}}
                                                    <!-- Vertically Centered modal Modal -->
                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalCenterTitle">
                                                                        PENGESAHAN</h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Anda pasti mahu menyimpan maklumat ini?
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block"
                                                                            style="color:#275047">Tidak</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Ya</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>



    <!-- ======= Footer ======= -->

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".floatNumberField").change(function() {
                $(this).val(parseFloat($(this).val()).toFixed(2));
            });
        });
    </script>


<script>
    function onlyNumberKey(evt) {

        // Only ASCII charactar in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
        {{-- // function setTwoNumberDecimal(event) {
    // this.value = parseFloat(this.value).toFixed(2);
    // } --}}

    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode != 46 && (charCode < 48 || charCode > 57)))
                return false;
            return true;
        }
    </script>
    @endsection
    {{-- </body>

    </html> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
@endsection
