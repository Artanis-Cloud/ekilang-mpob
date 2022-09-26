@extends('layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb mb-3">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Prestasi OER</h4>
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
                            <div class="">

                                <div class="text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Prestasi OER</h3>
                                    <h5 style="color: rgb(39, 80, 71); font-size:14px">Laporan Prestasi OER Kilang Buah</h5>
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
                                    <div class="row justify-content-center" style="margin:20px 0px">
                                        <div class="col-sm-3 form-group" style="margin: 0px">
                                           <label for="fname"
                                            class="control-label col-form-label required">
                                            Sila Pilih Tahun Yang Diminta</label>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="tahun" name='tahun'>
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




                            <div class="row justify-content-center form-group" style="margin-bottom: 13%" >
                                <button type="submit" class="btn btn-primary ">Papar Data</button>

                            </div>
                    </div>
                </div>





                {{-- </div> --}}



            </div>
            <br><br><br>




            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>
        @endsection
        @section('scripts')
            <script type="text/javascript">
                window.onload = function() {
                    //Reference the DropDownList.
                    var ddlYears = document.getElementById("date-dropdown");

                    //Determine the Current Year.
                    var currentYear = (new Date()).getFullYear();

                    //Loop and add the Year values to DropDownList.
                    for (var i = 2004; i <= currentYear; i++) {
                        var option = document.createElement("OPTION");
                        option.innerHTML = i;
                        option.value = i;
                        ddlYears.appendChild(option);
                    }
                };
            </script>
        @endsection
