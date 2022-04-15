@extends('layouts.main')

@section('content')

    <div class="page-wrapper">
        <div class="row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn"
                                style="margin-left:5%; color:white; background-color:#25877bd1">Kembali</a>
                        </div>
                        <div class="col-7 align-self-center"  style="margin-left:-1%;" >
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
                <div class="card" style="margin-right:2%; margin-left:2%">
                    {{-- <div class="card-header border-bottom">
                        <h3 class='p-1 pl-3 card-heading'>Pengumuman</h3>
                    </div> --}}

                    <div class="card-body">
                        {{-- <div class="row"> --}}
                            {{-- <div class="col-md-4 col-12"> --}}
                            <div class="pl-3">

                                <div class="text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Prestasi OER</h3>
                                    <h5 style="color: rgb(39, 80, 71); font-size:14px"">Laporan Prestasi OER Kilang Buah</h5>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>
                                <h6 style="color: rgb(39, 80, 71, 0.8);">

                                    <b><i> Nota :</i></b>
                                    <ul>
                                        <li>
                                            <p><i> Data yang dikeluarkan adalah data 36 bulan terdahulu dari tahun yang
                                                    diminta.</i></p>
                                        </li>
                                        <li>
                                            <p><i> Data bagi daerah hanya dikeluarkan sekiranya daerah itu mempunyai
                                                    lebih daripada tiga pelesen.</i></p>
                                        </li>
                                        <li>
                                            <p><i> Paparan hanya dapat dilakukan bermula dari tahun 2000 sahaja.</i></p>
                                        </li>
                                    </ul>



                                </h6>


                                <div class="container center mt-4">
                                    <div class="row" style="margin-bottom:2%;">
                                        <label for="fname"
                                            class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                            Sila Pilih Tahun Yang Diminta</label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
                                                    <option selected hidden disabled>Sila Pilih Tahun</option>
                                                    <option>2000</option>
                                                    <option>2001</option>
                                                    <option>2002</option>
                                                    <option>2003</option>
                                                    <option>2004</option>
                                                    <option>2005</option>
                                                    <option>2006</option>
                                                    <option>2007</option>
                                                    <option>2008</option>
                                                    <option>2009</option>
                                                    <option>2010</option>
                                                    <option>2011</option>
                                                    <option>2012</option>
                                                    <option>2013</option>
                                                    <option>2014</option>
                                                    <option>2015</option>
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                    <option>2020</option>
                                                    <option>2021</option>

                                                </select>
                                            </fieldset>
                                            {{-- @error('alamat_kilang_1')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror --}}
                                        </div>
                                    </div>



                                </div>
                            </div>




                            <div class="row form-group" >



                                <div class="text-right col-md-12  ">
                                    <button type="submit" class="btn btn-primary "
                                        style="margin-right:48%" >Papar Data</button>
                                </div>

                            </div>




                        {{-- </div> --}}



                    </div>
                </div>
            </div>
        </div><br><br><br><br><br><br><br><br><br><br><br><br>

    </div>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>




    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "language": {
                    "lengthMenu": "Memaparkan _MENU_ rekod per halaman",
                    "zeroRecords": "Maaf, tiada rekod.",
                    "info": "Memaparkan halaman _PAGE_ dari _PAGES_",
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

        $(window).on('changed', (e) => {
            // if($('#example').DataTable().clear().destroy()){
            // $('#example').DataTable();
            // }
        });

        // document.getElementById("form_type").onchange = function() {
        //     myFunction()
        // };

        // function myFunction() {
        //     console.log('asasa');
        //     table.clear().draw();
        // }
    </script>


    </body>

    </html>

@endsection
