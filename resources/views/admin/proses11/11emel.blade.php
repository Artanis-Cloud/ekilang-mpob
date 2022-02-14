@extends($layout)

@section('content')


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos-delay="100">

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
                                                            style="color: rgb(102, 100, 100) !important;"
                                                            onMouseOver="this.style.color='lightblue'"
                                                            onMouseOut="this.style.color='white'">
                                                            {{ $breadcrumb['name'] }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        style="color: #e8d255  !important;">
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
                                        <h4 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Emel Pertanyaan /
                                            Pindaan / Cadangan</h4>

                                        {{-- <p>Maklumat Kilang</p> --}}
                                    </div>
                                    <hr>

                                    <div class="container center">




                                        {{-- </diV> --}}

                                        <section class="section">
                                            <div class="card">
                                                {{-- <div class="card-header">
                                                Simple Datatable
                                            </div> --}}

                                                <table class='table ' id="table1">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>Nama Pelesen</th>
                                                            <th>No Lesen</th>
                                                            <th>Kategori</th>
                                                            <th>Tarikh</th>
                                                            <th>Tindakan</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($listemel as $data)
                                                            <tr>
                                                                <td>{{ $data->FromName }}</td>
                                                                <td>{{ $data->FromLicense }}</td>
                                                                <td>{{ $data->Category }}</td>
                                                                <td>{{ $data->Date }}</td>
                                                                <td>
                                                                    <div class="btn">
                                                                        <a
                                                                            href="{{ route('admin.11paparemel', [$data->MsgID]) }}">
                                                                            <i class="fa fa-eye"
                                                                                style="color: #228c1c; font-size:18px; padding: 0rem 0rem;">
                                                                            </i>
                                                                        </a>
                                                                    </div>
                                                                    {{-- <button class="btn" style="margin-left:5%" ><a href="{{ route('admin.11paparemel') }} "><i class="fa fa-eye"  style="font-size:18px"></i></a></button> --}}
                                                                    <button class="btn" onclick=setPrintedPage('11paparemel.blade.php')
                                                                        value="print"><i class="fa fa-download"
                                                                            style="font-size:18px"></i></button>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <br>





    </section><!-- End Hero -->



    <!-- ======= Footer ======= -->





    {{-- <div id="preloader"></div> --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>



    {{-- <script>
            function myPrint(myfrm) {
                var printdata = document.getElementById(myfrm);
                newwin = window.open("");
                newwin.document.write(printdata.outerHTML);
                newwin.print();
                newwin.close();
            }
        </script> --}}
    <script>
        function printWindow() {
            bV = parseInt(navigator.appVersion)
            if (bV >= 4) window.print()
        }

        function setPrintedPage(altdoc) {
            var prt;
            var prt = document.getElementsByTagName("link")[0];
            prt.setAttribute("href", altdoc);
            printWindow();
        }
    </script>



@endsection
