@extends($layout)

@section('content')

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative"  data-aos-delay="100">

        {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
        {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

        <div class=" mt-3  row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="align-self-center" style="margin-left: 2%; margin-bottom:-2%">
                            <a href="{{ $returnArr['kembali'] }}" class="btn"
                                style="color:white; background-color:#25877bd1">Kembali</a>
                        </div>
                        <div class="align-self-center" style="margin-left: -1%;">
                            <div class="d-flex align-items-center justify-content-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: white !important;"
                                                            onMouseOver="this.style.color='#25877b'"
                                                            onMouseOut="this.style.color='white'">
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
                        <div class="row">
                            {{-- <div class="col-md-4 col-12"> --}}
                            <div class="pl-3">

                                <div class=" text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Bahagian I</h3>
                                    <h5 style="color: rgb(39, 80, 71); font-size:14px">Maklumat Imbangan</h5>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>




                                <div class="col-12 mt-3">
                                    <div class="row" id="table-bordered">

                                        <form action="{{route('isirung.update.bahagian.i',[$penyata->e102_reg])}}" method="post">
                                            @csrf
                                            <div class="card">

                                                <div class="card-content">


                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-0">
                                                            <thead style="text-align: center">
                                                                <tr>
                                                                    <th>Butiran</th>
                                                                    <th>Isirung (PK) <br> Kod 51
                                                                    </th>
                                                                    <th>Minyak Isirung Sawit Mentah (CPKO)
                                                                        <br> Kod 04
                                                                    </th>
                                                                    <th>Dedak Isirung (PKC)
                                                                        <br> Kod 33
                                                                    </th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-bold-500">A.
                                                                        Stok Awal Di Premis</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_aa1'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_aa1 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_aa2'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_aa2 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_aa3'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_aa3 ?? 0 }}">
                                                                        </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">B.
                                                                        Stok Awal Di Pusat Simpanan / Gudang</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ab1'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ab1 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ab2'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ab2 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ab3'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ab3 ?? 0 }}">
                                                                        </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">C.
                                                                        Pembelian / Terimaan &nbsp; <i class="fa fa-exclamation-circle"
                                                                        style="color: red"
                                                                        title="Jumlah Pembelian/Terimaan Dalam Negeri adalah termasuk jumlah Import."></i></td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ac1'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ ($penyata->e102_ac1 ?? 0) + ($penyata->e102_ad1 ?? 0 ) }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ac2'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ ($penyata->e102_ac2 ?? 0) + ($penyata->e102_ad2 ?? 0 ) }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ac3'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ ($penyata->e102_ac3 ?? 0) + ($penyata->e102_ad3 ?? 0 ) }}">
                                                                        </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">D.
                                                                        Import</td>
                                                                        <td  style="text-align:center; background-color:#808080b8">

                                                                        </td>
                                                                        <td  style="text-align:center; background-color:#808080b8">

                                                                        </td>
                                                                        <td  style="text-align:center; background-color:#808080b8">

                                                                        </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">E.
                                                                        Diproses</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ae1'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ae1 ?? 0 }}">
                                                                        </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text" size="10"
                                                                                    onkeypress="return isNumberKey(event)"> --}}
                                                                    </td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text" size="10"
                                                                                    onkeypress="return isNumberKey(event)"> --}}
                                                                    </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">F.
                                                                        Pengeluaran</td>
                                                                    <td
                                                                        style="text-align:center; background-color:#808080b8">
                                                                        {{-- <input type="text" size="10"
                                                                                    onkeypress="return isNumberKey(event)"> --}}
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10" name='e102_af2'
                                                                            style="text-align: center"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e102_af2 ?? 0 }}">
                                                                    </td>
                                                                    <td style="text-align:center;">
                                                                        <input type="text" size="10" name='e102_af3'
                                                                            style="text-align: center"
                                                                            onkeypress="return isNumberKey(event)"
                                                                            value="{{ $penyata->e102_af3 ?? 0 }}">
                                                                    </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">G.
                                                                        Jualan / Edaran Tempatan</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ag1'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ag1 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ag2'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ag2 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ag3'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ag3 ?? 0 }}">
                                                                        </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">H.
                                                                        Hantar ke Pusat Simpanan / Gudang</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ah1'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ah1 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ah2'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ah2 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ah3'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ah3 ?? 0 }}">
                                                                        </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">I.
                                                                        Eksport</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ai1'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ai1 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ai2'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ai2 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ai3'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ai3 ?? 0 }}">
                                                                        </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">J.
                                                                        Stok Akhir di Premis</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_aj1'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_aj1 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_aj2'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_aj2 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_aj3'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_aj3 ?? 0 }}">
                                                                        </td>


                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">K.
                                                                        Stok Akhir di Pusat Simpanan</td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ak1'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ak1 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ak2'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ak2 ?? 0 }}">
                                                                        </td>
                                                                        <td style="text-align:center;">
                                                                            <input type="text" size="10" name='e102_ak3'
                                                                                style="text-align: center"
                                                                                onkeypress="return isNumberKey(event)"
                                                                                value="{{ $penyata->e102_ak3 ?? 0 }}">
                                                                        </td>


                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>









                                            {{-- <div class="row" style="padding-top: 35px; float:right">

                                                        <div class="col-md-12">
                                                            <button type="button" class="btn  btn-primary"
                                                                data-toggle="modal" data-target="#confirmation">Simpan &
                                                                Seterusnya</button>
                                                        </div>

                                                    </div> --}}


                                            <br>
                                            <div class="row" style=" float:right">


                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#next">
                                                        Simpan & Seterusnya
                                                    </button>
                                                    <!-- Vertically Centered modal Modal -->
                                                    <div class="modal fade" id="next" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">
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
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary ml-1">
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






                    </div>
                </div>
            </div><br><br><br><br>
        </div>






    </section><!-- End Hero -->





    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}



    {{-- </body>

    </html> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}


@endsection
