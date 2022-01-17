@extends($layout)

@section('content')




    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

            {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
                <div class="col-xl-12 col-lg-9">

                    {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
            {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
                </div>
            </div> --}}

            <div class="mb-2 row">
                <div class="col-md-12">

                    <div class="page-breadcrumb" style="padding: 0px">
                        <div class="pb-2 row">
                            <div class="col-5 align-self-center">
                                <a href="{{ $returnArr['kembali'] }}" class="btn"
                                    style="color:white; background-color:#25877bd1">Kembali</a>
                            </div>
                            <div class="col-7 align-self-center">
                                <div class="d-flex align-items-center justify-content-end">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                                @if (!$loop->last)
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ $breadcrumb['link'] }}"
                                                            style="color: black !important;"
                                                            onMouseOver="this.style.color='lightblue'"
                                                            onMouseOut="this.style.color='black'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #fff03e  !important;">
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

                                    <div class="text-center">
                                        {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                        <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Proses 8</h3>
                                        <h5 style="color: rgb(39, 80, 71); font-size:14px">Port Data</h5>
                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>

                                    {{-- <form method="POST" action="{{ route('buah.tukarpassword') }}">
                                        {{ csrf_field() }} --}}


                                    <br>


                                    <div class="row" >
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">User
                                            ID </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name='old_password' id="old_password"
                                                placeholder="ID Pengguna" required title="Sila isikan butiran ini.">
                                            {{-- @error('alamat_kilang_1')
                                                            <div class="alert alert-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror --}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Password
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name='new_password' id="new_password"
                                                placeholder="Kata Laluan" required title="Sila isikan butiran ini.">
                                            {{-- @error('alamat_kilang_1')
                                                            <div class="alert alert-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror --}}
                                        </div>
                                    </div>

                                    {{-- </diV> --}}

                                    <div class="row mt-1" >
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Tahun
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
                                                    <option selected hidden disabled>Sila Pilih Tahun</option>

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
                                                    <option>2022</option>



                                                </select>
                                            </fieldset>
                                            {{-- @error('alamat_kilang_1')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror --}}
                                        </div>
                                    </div>

                                    <div class="row" >
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Bulan
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
                                                    <option selected hidden disabled>Sila Pilih Bulan</option>
                                                    <option>Januari</option>
                                                    <option>Februari</option>
                                                    <option>Mac</option>
                                                    <option>April</option>
                                                    <option>Mei</option>
                                                    <option>Jun</option>
                                                    <option>Julai</option>
                                                    <option>Ogos</option>
                                                    <option>September</option>
                                                    <option>Oktober</option>
                                                    <option>November</option>
                                                    <option>Disember</option>



                                                </select>
                                            </fieldset>
                                            {{-- @error('alamat_kilang_1')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror --}}
                                        </div>
                                    </div>

                                    <div class="row" >
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Destinasi
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect">
                                                    <option selected hidden disabled>Sila Pilih Destinasi</option>
                                                    <option>Stat Admin</option>
                                                    <option>Stat Homepage</option>



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





                        <div class="row form-group" style="padding-top: 10px; ">



                            <div class="text-right col-md-12 mb-4 ">
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                    style="float: right" data-target="#confirmation">Porting</button>
                            </div>

                    </div>
                </div>



            </div>

        </div>






















    </section><!-- End Hero -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
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
