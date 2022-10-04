@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Profil Pelesen</h4>
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

        <div class="container-fluid">

            <div class="card" style="margin-right:2%; margin-left:2%">
                <div class="card-body">

                    <div class="row">
                        <div class="col-1 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i
                                    class="fa fa-angle-left">&ensp;</i>Kembali</a>
                        </div>

                    </div>

                        {{-- <div class="col-md-4 col-12"> --}}
                    <div class="pl-3">

                        <div class=" text-center">
                            {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                            <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Senarai Pelesen Berdaftar
                            </h3>
                            <h4 style="color: rgb(39, 80, 71); font-size:18px;"><b>Pusat Simpanan</b></h4>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>


                        <section class="section">
                            <div class="card">
                                <div class="row">

                                    <div class=" dropdown" style="margin: 1%">
                                        <button class="btn btn-secondary dropdown-toggle"
                                            style="background-color: rgb(238, 70, 70);" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pusat Simpanan
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if (auth()->user()->sub_cat)
                                                @foreach (json_decode(auth()->user()->sub_cat) as $cat)
                                                    @if ($cat == 'PL91')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.senaraipelesenbuah') }}">Kilang
                                                            Buah</a>
                                                    @endif
                                                    @if ($cat == 'PL101')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.senaraipelesenpenapis') }}">Kilang
                                                            Penapis</a>
                                                    @endif
                                                    @if ($cat == 'PL102')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.senaraipelesenisirung') }}">Kilang
                                                            Isirung</a>
                                                    @endif
                                                    @if ($cat == 'PL104')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.senaraipelesenoleokimia') }}">Kilang
                                                            Oleokimia</a>
                                                    @endif
                                                    @if ($cat == 'PL111')
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.senaraipelesensimpanan') }}">Pusat
                                                            Simpanan</a>
                                                    @endif
                                                    @if ($cat == 'PLBIO')
                                                        <a class="dropdown-item" href="{{ route('admin.senaraipelesenbio') }}">Kilang
                                                            Biodiesel</a>
                                                    @endif
                                                @endforeach
                                            @else
                                                <a class="dropdown-item" href="{{ route('admin.senaraipelesenbuah') }}">Kilang
                                                    Buah</a>
                                                <a class="dropdown-item" href="{{ route('admin.senaraipelesenpenapis') }}">Kilang
                                                    Penapis</a>
                                                <a class="dropdown-item" href="{{ route('admin.senaraipelesenisirung') }}">Kilang
                                                    Isirung</a>
                                                <a class="dropdown-item" href="{{ route('admin.senaraipelesenoleokimia') }}">Kilang
                                                    Oleokimia</a>
                                                <a class="dropdown-item" href="{{ route('admin.senaraipelesensimpanan') }}">Pusat
                                                    Simpanan</a>
                                                <a class="dropdown-item" href="{{ route('admin.senaraipelesenbio') }}">Kilang
                                                    Biodiesel</a>
                                            @endif

                                        </div>
                                    </div>
                                    {{-- <a href="{{ route('admin.senarai.pelesen.batal.simpanan') }}"
                                        class="btn btn-primary" style="margin: 1%">Senarai
                                        Pelesen Batal</a> --}}

                                    <a href="{{ route('admin.1daftarpelesen') }}" class="btn btn-primary"
                                        style="margin: 1%"> Tambah Pelesen Baru</a>


                                    {{-- <div class="text-right col-5" style="margin: 1%; position: static; margin-left: auto">
                                        <button id="exportExcel" style="font-size:14px; background-color:#265960;color: white; border: 0px; border-radius: 2px; padding:7px 35px;"
                                           >Excel <i class="fa fa-file-excel" style="color:white"></i></button>

                                    </div> --}}

                                </div>

                                <br>
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered text-center" style="width: 100%;">
                                        <thead>
                                            <tr style="background-color: #e9ecefbd">
                                                {{-- <th>Bil.</th> --}}
                                                <th style=" vertical-align: middle">No. Lesen</th>
                                                <th style=" vertical-align: middle">Nama Premis</th>
                                                <th style=" vertical-align: middle">Emel</th>
                                                <th style=" vertical-align: middle">No. Telefon</th>
                                                <th style=" vertical-align: middle">Kod Pegawai</th>
                                                <th style=" vertical-align: middle">No. Siri</th>
                                                <th style=" vertical-align: middle">Status e-Kilang</th>
                                                <th style=" vertical-align: middle">Status e-Stok</th>
                                                <th style=" vertical-align: middle">Direktori</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="background-color: #e9ecefbd">
                                                {{-- <th>Bil.</th> --}}
                                                <th>No. Lesen</th>
                                                <th>Nama Premis</th>
                                                <th>Emel</th>
                                                <th>No. Telefon</th>
                                                <th>Kod Pegawai</th>
                                                <th>No. Siri</th>
                                                <th>Status e-Kilang</th>
                                                <th>Status e-Stok</th>
                                                <th>Direktori</th>
                                            </tr>
                                        </tfoot>
                                        <tbody style="word-break: break-word; font-size:12px">
                                            @foreach ($users as $data)
                                                @if ($data->pelesen)
                                                    <tr class="text-left">
                                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                                        <td>
                                                            <a
                                                                href="{{ route('admin.papar.maklumat', $data->e_id) }}"><u>
                                                                    {{ $data->e_nl }}</u></a>
                                                        </td>
                                                        <td>{{ $data->pelesen->e_np ?? '-' }}</td>
                                                        <td>{{ $data->pelesen->e_email ?? '-' }}</td>
                                                        <td>{{ $data->pelesen->e_notel ?? '-' }}</td>
                                                        <td style="text-align: center">{{ $data->kodpgw }}</td>
                                                        <td style="text-align: center">{{ $data->nosiri }}</td>
                                                        @if ($data->e_status == 1)
                                                            <td style="text-align: center">Aktif</td>
                                                        @elseif ($data->e_status == 2)
                                                            <td style="text-align: center">Tidak Aktif</td>
                                                        @else
                                                            <td style="text-align: center">-</td>
                                                        @endif
                                                        @if ($data->e_stock == 1)
                                                            <td style="text-align: center">Aktif</td>
                                                        @elseif ($data->e_stock == 2)
                                                            <td style="text-align: center">Tidak Aktif</td>
                                                        @else
                                                            <td style="text-align: center">-</td>
                                                        @endif
                                                        @if ($data->directory == 'Y')
                                                            <td style="text-align: center">Ya</td>
                                                        @elseif ($data->directory == 'N')
                                                            <td style="text-align: center">Tidak</td>
                                                        @else
                                                            <td style="text-align: center">-</td>
                                                        @endif

                                                        {{-- <td>-</td> --}}
                                                    </tr>
                                                @endif
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>



                </div>
            </div>

        </div>

    </div>




    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.1/xlsx.full.min.js"></script>
    <script>
        $('#exportExcel').on('click', function(){
        var wb = XLSX.utils.table_to_book(document.getElementById('example'),{sheet: "Sheet name"})

        var wbout = XLSX.write(wb, {bookType: 'xlsx', bookSST: true, type: 'binary'});

        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) {
            view[i] = s.charCodeAt(i) & 0xFF;
            }
            return buf;
        }

      saveAs(new Blob([s2ab(wbout)], {type:"application/octet-stream"}), 'Senarai Pelesen Berdaftar Pusat Simpanan.xlsx');
    })
    </script>
@endsection
