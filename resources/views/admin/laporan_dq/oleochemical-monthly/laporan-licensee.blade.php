@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <h5 style="color: rgb(39, 80, 71); text-align:center; margin-top:3%">Senarai Produk Akhir Berasaskan Minyak
            Sawit dan
            Minyak Isirung Sawit
            - Bahan Makanan</h5>

        <section class="section">
            <div class="card">

                <div class="table-responsive">
                    <table class="table table-bordered mb-0" style="font-size: 13px">
                        <thead>
                            <tr style="text-align: center">
                                <th>Nama Produk</th>
                                <th>Kod Produk</th>
                                <th>Stok Awal Di Premis</th>
                                <th>Belian/Terimaan</th>
                                <th>Pengeluaran</th>
                                <th>Jualan/Edaran Tempatan</th>
                                <th>Eksport</th>
                                <th>Stok Akhir Di Proses</th>
                                <th>Kemaskini</th>
                                <th>Hapus?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penyata as $data)
                                <tr style="text-align: right">
                                    <td style="text-align: left">{{ $data->produk->prodname }}</td>
                                    <td>{{ $data->produk->prodid }}</td>
                                    <td>{{ number_format($data->e101_c5 ?? 0, 2) }}</td>
                                    <td>{{ number_format($data->e101_c6 ?? 0, 2) }}</td>
                                    <td>{{ number_format($data->e101_c7 ?? 0, 2) }}</td>
                                    <td>{{ number_format($data->e101_c8 ?? 0, 2) }}</td>
                                    <td>{{ number_format($data->e101_c9 ?? 0, 2) }}</td>
                                    <td>{{ number_format($data->e101_c10 ?? 0, 2) }}</td>
                                    <td>
                                        <div class="icon" style="text-align: center">
                                            <a href="#" type="button" data-toggle="modal"
                                                data-target="#modal{{ $data->e101_c1 }}">
                                                <i class="fas fa-edit fa-lg" style="color: #ffc107">
                                                </i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="icon" style="text-align: center">
                                            <a href="#" type="button" data-toggle="modal"
                                                data-target="#next2{{ $data->e101_c1 }}">
                                                <i class="fa fa-trash" style="color: #dc3545;font-size:18px"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>



                        </tbody>

                    </table>

                </div>
            </div>
            <div class="row form-group" style="padding-top: 10px; ">


                <div class="text-left col-md-5">
                    <a href="{{ route('penapis.bahagianiii') }}" class="btn btn-primary"
                        style="float: left">Sebelumnya</a>
                </div>
                <div class="text-right col-md-7">
                    <button type="button" class="btn btn-primary " data-toggle="modal" style="float: right"
                        data-target="#next">Simpan &
                        Seterusnya</button>
                </div>

            </div>

            <!-- Vertically Centered modal Modal -->
            <div class="modal fade" id="next" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                PENGESAHAN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Anda pasti mahu menyimpan maklumat ini?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                            </button>
                            <a href="{{ route('penapis.bahagianivb') }}" type="button" class="btn btn-primary ml-1">

                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Ya</span>
                            </a>
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
    </body>
    </html>
@endsection
