
@extends($layout)

@section('content')




 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center ">
    <div class="container position-relative"  data-aos-delay="100">

        {{-- <div class="row justify-content-center" style="margin-bottom: 3%">
            <div class="col-xl-12 col-lg-9">

                {{-- <h1 style="font-size:40px;">KILANG BUAH</h1> --}}
        {{-- <h2 style="text-align: center; color:#247c68"><b> Maklumat Asas Pelesen </b></h2>
            </div>
        </div> --}}

        <div class="mt-2 mb-4 row">
            <div class="col-md-12">

                <div class="page-breadcrumb" style="padding: 0px">
                    <div class="pb-2 row">
                        <div class="col-5 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:white; background-color:#25877bd1">Kembali</a>
                        </div>
                        <div class="col-7 align-self-center">
                            <div class="d-flex align-items-center justify-content-end">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                            @if (!$loop->last)
                                                <li class="breadcrumb-item">
                                                    <a href="{{ $breadcrumb['link'] }}"
                                                        style="color: rgb(64, 69, 68) !important;"
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
                    <form action="{{ route('admin.direktori.process') }}" method="GET">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-md-4 col-12"> --}}
                            <div class="pl-3">

                                <div class=" text-center">
                                    {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Direktori</h3>
                                    {{-- <h5 style="color: rgb(39, 80, 71); font-size:14px">Porting Maklumat Produk dan Negara</h5> --}}
                                    {{-- <p>Maklumat Kilang</p> --}}
                                </div>
                                <hr>

                                <div class="container center" >

                                    <br>

                            </diV>


                                <div class="container center mt-1">
                                    <div class="row" style="margin-bottom:2%;">
                                        <label for="fname"
                                            class="text-right col-sm-5 control-label col-form-label required align-items-center">
                                            Negeri Premis</label>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="nama_negeri">
                                                    <option selected hidden disabled>Sila Pilih</option>
                                                    <option value="All">ALL</option>
                                                    @foreach (App\Models\Negeri::distinct()->orderBy('kod_negeri')->get()
                                                        as $data)
                                                        <option value="{{ $data->kod_negeri }}">
                                                            {{ $data->nama_negeri }}
                                                        </option>
                                                    @endforeach

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



                                    <div class="text-right col-md-12  ">
                                        <button type="submit" class="btn btn-primary "
                                            style="float: right">Papar Direktori</button>
                                        {{-- <button type="submit">YA</button> --}}
                                    </div>
                                </div>
                                <div class="row" style=" float:right">

                                    <div class="col-md-12">



                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <br>

</section><!-- End Hero -->




{{-- <div id="preloader"></div> --}}
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>




</body>

</html>


@endsection
