@extends('layouts.main')

@section('content')


    <div class="page-wrapper">

        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Penyata Terdahulu</h4>
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
                            {{-- <div class="col-md-4 col-12"> --}}
                            <div class="pl-3">
                                <form action="{{ route('oleo.penyata.dahulu.process') }}" method="post">
                                    @csrf
                                <div class="text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Penyata Bulanan Terdahulu</h3>
                                    <h5 style="color: rgb(39, 80, 71); font-size:14px">Senarai Penyata Bulanan Terdahulu</h5>
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>
                                <div class="container center mt-2" >
                                    <div class="row">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">
                                            Sila Pilih Tahun</label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="tahun" required>
                                                    <option selected hidden disabled>Sila Pilih Tahun</option>
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
                                            @error('tahun')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="fname"
                                            class="text-right col-sm-4 control-label col-form-label required align-items-center">Bulan
                                        </label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="bulan" required>
                                                    <option selected hidden disabled>Sila Pilih Bulan</option>
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Mac</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Jun</option>
                                                    <option value="07">Julai</option>
                                                    <option value="08">Ogos</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Disember</option>



                                                </select>
                                            </fieldset>
                                            @error('bulan')
                                                <div class="alert alert-danger">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>







                                    </div>
                                </div>




                                <div class="row form-group" style="padding-top: 20px; ">



                                        <div class="text-right col-md-12 mb-4 ">
                                            <button type="submit" class="btn btn-primary "
                                                style="margin-right: 45%">Papar Penyata</button>
                                        </div>

                                </div>
                                {{-- Hidden Gap - Just Ignore --}}

                            </form>


                            <br>


                        {{-- </div> --}}

                    </div>

                </div>




            </div>

        </div>

     </div>



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
