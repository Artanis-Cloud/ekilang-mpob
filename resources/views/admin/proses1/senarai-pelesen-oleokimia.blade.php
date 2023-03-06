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
                <div class="col-12 align-self-center">
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
                <div class="col-7 align-self-center" id="breadcrumb">
                    <div class="d-flex align-items-center justify-content-end">

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <div class="card" style="margin-right:2%; margin-left:2%">
                <div class="card-body">

                    <div class="row">
                        <div class="col-1 align-self-center">
                            <a href="{{ $returnArr['kembali'] }}" class="btn" style="color:rgb(64, 69, 68)"><i class="fa fa-angle-left">&ensp;</i>Kembali</a>
                        </div>

                    </div>

                    {{-- <div class="col-md-4 col-12"> --}}
                    <div class="pl-3">

                        <div class=" text-center">
                            <div id="title">
                                <h3 style="color:  rgb(39, 80, 71); margin-bottom:1%">Senarai Pelesen Berdaftar </h3>
                                <h5 style="color: rgb(39, 80, 71); ">KILANG OLEOKIMIA</h5>
                                <p id="tarikh">Bulan: <span id="Bulan"></span>&nbsp   Tahun: <span id="Tahun"></span></p>

                            </div>


                            <script>
                                var dt = new Date();
                                var newm = (("0" + (dt.getMonth())).slice(-2));
                                // let month = '12';

                                console.log(newm == 0);
                                if (newm == 00) {
                                    document.getElementById("Bulan").innerHTML = '12';
                                } else {
                                    document.getElementById("Bulan").innerHTML = (("0" + (dt.getMonth())).slice(-2));

                                }
                                var dt = new Date();
                                if (newm == 00) {
                                    document.getElementById("Tahun").innerHTML = (dt.getFullYear())-1;
                                } else {
                                    document.getElementById("Tahun").innerHTML = (dt.getFullYear());

                                }
                            </script>
                            {{-- <p>Maklumat Kilang</p> --}}
                        </div>
                        <hr>


                        <section class="section">
                        <div class="card">
                                {{-- <div class="card-header">
                                                        Simple Datatable
                                                    </div> --}}
                                <div class="row">

                                    <div class=" dropdown" style="margin: 1%">
                                        <button class="btn btn-secondary dropdown-toggle"
                                            style="background-color: rgb(238, 70, 70);" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Kilang Oleokimia
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
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.senaraipelesenbio') }}">Kilang
                                                            Biodiesel</a>
                                                    @endif

                                                @endforeach
                                            @else
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.senaraipelesenbuah') }}">Kilang
                                                    Buah</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.senaraipelesenpenapis') }}">Kilang
                                                    Penapis</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.senaraipelesenisirung') }}">Kilang
                                                    Isirung</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.senaraipelesenoleokimia') }}">Kilang
                                                    Oleokimia</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.senaraipelesensimpanan') }}">Pusat
                                                    Simpanan</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.senaraipelesenbio') }}">Kilang
                                                    Biodiesel</a>
                                            @endif

                                        </div>
                                    </div>


                                    {{-- <a href="{{ route('admin.senarai.pelesen.batal.oleokimia') }}" class="btn btn-primary"
                                        style="margin: 1%">Senarai
                                        Pelesen Batal</a> --}}

                                    <a href="{{ route('admin.1daftarpelesen') }}" class="btn btn-primary"
                                        style="margin: 1%"> Tambah Pelesen Baru</a>


                                        {{-- <div class="text-right col-5" style="margin: 1%; position: static; margin-left: auto">
                                            <button id="exportExcel" style="font-size:14px; background-color:#265960;color: white; border: 0px; border-radius: 2px; padding:7px 35px;"
                                            >Excel <i class="fa fa-file-excel" style="color: white"></i></button>

                                    </div> --}}
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="example104" class="table table-bordered text-center" style="width: 100%;">
                                        <thead>
                                            <tr style="background-color: #e9ecefbd">
                                                <th style=" vertical-align: middle">Bil.</th>
                                                <th style=" vertical-align: middle; width: 10%">No. Lesen</th>
                                                <th style=" vertical-align: middle">Nama Premis</th>
                                                <th style=" vertical-align: middle">Emel</th>
                                                <th style=" vertical-align: middle">No. Telefon</th>
                                                <th style=" vertical-align: middle">Kod Pegawai</th>
                                                <th style=" vertical-align: middle">No. Siri</th>
                                                <th style=" vertical-align: middle">Status e-Kilang</th>
                                                <th style=" vertical-align: middle">Status e-Stok</th>
                                                <th style=" vertical-align: middle">Direktori</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Alamat Premis Berlesen 1</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Alamat Premis Berlesen 2</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Alamat Premis Berlesen 3</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Alamat Surat Menyurat 1</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Alamat Surat Menyurat 2</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Alamat Surat Menyurat 3</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">No. Faks</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Alamat Emel Kilang</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Nama Pegawai Melapor</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Jawatan Pegawai Melapor</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">No. Telefon Pegawai Melapor</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Alamat Emel Pegawai Melapor</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Nama Pegawai Bertanggungjawab</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Jawatan Pegawai Bertanggungjawab</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Alamat Emel Pengurus</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Negeri</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Daerah</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Kawasan</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Syarikat Induk</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Tahun Mula Beroperasi</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Kumpulan</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Kapasiti Pemprosesan / Tahun</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Bilangan Tangki CPO</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Kapasiti Tangki Simpanan CPO (Tan)</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Bilangan Tangki PPO</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Kapasiti Tangki Simpanan PPO (Tan)</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Bilangan Tangki CPKO</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Kapasiti Tangki Simpanan CPKO (Tan)</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Bilangan Tangki PPKO</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Kapasiti Tangki Simpanan CPKO (Tan)</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Bilangan Tangki OLEO</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Kapasiti Tangki Simpanan OLEO (Tan)</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Bilangan Tangki Others</th>
                                                <th class="noScreenPelesen" style=" vertical-align: middle">Kapasiti Tangki Simpanan Others (Tan)</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr style="background-color: #e9ecefbd">
                                                <th>Bil.</th>
                                                <th>No. Lesen</th>
                                                <th>Nama Premis</th>
                                                <th>Emel</th>
                                                <th>No. Telefon</th>
                                                <th>Kod Pegawai</th>
                                                <th>No. Siri</th>
                                                <th id="kilang">Status e-Kilang</th>
                                                <th id="stok">Status e-Stok</th>
                                                <th>Direktori</th>
                                                <th class="noScreenPelesen">Alamat Premis Berlesen 1</th>
                                                <th class="noScreenPelesen">Alamat Premis Berlesen 2</th>
                                                <th class="noScreenPelesen">Alamat Premis Berlesen 3</th>
                                                <th class="noScreenPelesen">Alamat Surat Menyurat 1</th>
                                                <th class="noScreenPelesen">Alamat Surat Menyurat 2</th>
                                                <th class="noScreenPelesen">Alamat Surat Menyurat 3</th>
                                                <th class="noScreenPelesen">No. Faks</th>
                                                <th class="noScreenPelesen">Alamat Emel Kilang</th>
                                                <th class="noScreenPelesen">Nama Pegawai Melapor</th>
                                                <th class="noScreenPelesen">Jawatan Pegawai Melapor</th>
                                                <th class="noScreenPelesen">No. Telefon Pegawai Melapor</th>
                                                <th class="noScreenPelesen">Alamat Emel Pegawai Melapor</th>
                                                <th class="noScreenPelesen">Nama Pegawai Bertanggungjawab</th>
                                                <th class="noScreenPelesen">Jawatan Pegawai Bertanggungjawab</th>
                                                <th class="noScreenPelesen">Alamat Emel Pengurus</th>
                                                <th class="noScreenPelesen">Negeri</th>
                                                <th class="noScreenPelesen">Daerah</th>
                                                <th class="noScreenPelesen">Kawasan</th>
                                                <th class="noScreenPelesen">Syarikat Induk</th>
                                                <th class="noScreenPelesen">Tahun Mula Beroperasi</th>
                                                <th class="noScreenPelesen">Kumpulan</th>
                                                <th class="noScreenPelesen">Kapasiti Pemprosesan / Tahun</th>
                                                <th class="noScreenPelesen">Bilangan Tangki CPO</th>
                                                <th class="noScreenPelesen">Kapasiti Tangki Simpanan CPO (Tan)</th>
                                                <th class="noScreenPelesen">Bilangan Tangki PPO</th>
                                                <th class="noScreenPelesen">Kapasiti Tangki Simpanan PPO (Tan)</th>
                                                <th class="noScreenPelesen">Bilangan Tangki CPKO</th>
                                                <th class="noScreenPelesen">Kapasiti Tangki Simpanan CPKO (Tan)</th>
                                                <th class="noScreenPelesen">Bilangan Tangki PPKO</th>
                                                <th class="noScreenPelesen">Kapasiti Tangki Simpanan PPKO (Tan)</th>
                                                <th class="noScreenPelesen">Bilangan Tangki OLEO</th>
                                                <th class="noScreenPelesen">Kapasiti Tangki Simpanan OLEO (Tan)</th>
                                                <th class="noScreenPelesen">Bilangan Tangki Others</th>
                                                <th class="noScreenPelesen">Kapasiti Tangki Simpanan Others (Tan)</th>
                                            </tr>
                                        </tfoot>
                                        <tbody style="word-break: break-word; font-size:12px">
                                            @foreach ($users as $data)
                                            @if ($data->pelesen)
                                            @foreach ($data->pelesen as $dtpl)
                                            @if ($dtpl->e_kat == 'PL104')

                                                <tr class="text-left">
                                                    <td class="count"></td>
                                                    <td>
                                                        <a href="{{ route('admin.papar.maklumat', $data->e_id) }}"><u>
                                                                {{ $data->e_nl }}</u></a>
                                                    </td>
                                                    <td  style="text-transform:uppercase" >{{ $dtpl->e_np ?? '-' }}</td>
                                                    <td>{{ $dtpl->e_email ?? '-' }}</td>
                                                    <td>{{ $dtpl->e_notel ?? '-' }}</td>
                                                    <td style="text-align: center">{{ $data->kodpgw }}</td>
                                                    <td style="text-align: center">{{ $data->nosiri }}</td>
                                                    @if ($data->e_status == 1)
                                                        <td style="text-align: center"><span hidden>1</span>Aktif</td>
                                                    @elseif ($data->e_status == 2)
                                                        <td style="text-align: center"><span hidden>2</span>Tidak Aktif</td>
                                                    @else
                                                        <td style="text-align: center">-</td>
                                                    @endif
                                                    @if ($data->e_stock == 1)
                                                        <td style="text-align: center"><span hidden>1</span>Aktif</td>
                                                    @elseif ($data->e_stock == 2)
                                                        <td style="text-align: center"><span hidden>2</span>Tidak Aktif</td>
                                                    @else
                                                        <td style="text-align: center">-</td>
                                                    @endif
                                                    @if ($data->directory == 'Y')
                                                        <td style="text-align: center">YA</td>
                                                    @elseif ($data->directory == 'N')
                                                        <td style="text-align: center">TIDAK</td>
                                                    @else
                                                        <td style="text-align: center">-</td>
                                                    @endif
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_ap1 ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_ap2 ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_ap3 ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_as1 ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_as2 ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_as3 ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_nofax ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_email ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_npg ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_jpg ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_notel_pg ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_email_pg ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_npgtg ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_jpgtg ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_email_pengurus ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->kod_negeri ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->kod_daerah ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->kod_region ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_syktinduk ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_year ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->e_group ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->kap_proses ?? '-'  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->bil_tangki_cpo ?? 0  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->kap_tangki_cpo ?? 0  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->bil_tangki_ppo ?? 0  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->kap_tangki_ppo ?? 0  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->bil_tangki_cpko ?? 0  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->kap_tangki_cpko ?? 0  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->bil_tangki_ppko ?? 0  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->kap_tangki_ppko ?? 0  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->bil_tangki_oleo ?? 0  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->kap_tangki_oleo ?? 0  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->bil_tangki_others ?? 0  }}</td>
                                                    <td class="noScreenPelesen" style="text-align: center">{{ $dtpl->kap_tangki_others ?? 0  }}</td>

                                                </tr>
                                                @endif
                                                @endforeach
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
    {{-- <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "lengthMenu": "Memaparkan _MENU_ rekod per halaman  ",
                    "zeroRecords": "Maaf, tiada rekod.",
                    "info": "",
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
    </script> --}}
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

          saveAs(new Blob([s2ab(wbout)], {type:"application/octet-stream"}), 'Senarai Pelesen Berdaftar Kilang Oleokimia.xlsx');
        })
      </script>

    <script>

        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#example104 tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
                $('#kilang').html('<select type="text" class="form-control"><option selected  value="">SEMUA</option><option value="1">AKTIF</option><option value="2">TIDAK AKTIF</option></select>');
                $('#stok').html('<select type="text" class="form-control"><option selected  value="">SEMUA</option><option value="1">AKTIF</option><option value="2">TIDAK AKTIF</option></select>');
            });

            // DataTable
            var table = $('#example104').DataTable({

                initComplete: function () {

                    // Apply the search
                    this.api()
                        .columns()
                        .every(function () {
                            var that = this;
                            $('select', this.footer()).on('keyup change clear', function () {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                    this.api()
                        .columns()
                        .every(function () {
                            var that = this;
                            $('input', this.footer()).on('keyup change clear', function () {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },
                dom: 'Bfrtip',

                buttons: [

                    'pageLength',
                    {
                        extend: 'excel',
                        text: '<a class="bi bi-file-earmark-excel-fill" aria-hidden="true"  > Excel</a>',
                        className: "fred",

                        title: function(doc) {
                            return $('#title').text()
                        },
                        exportOptions: {
                            format: {
                            body: function ( data, row, column, node ) {
                                if(column === 7){
                                    if(data == '<span hidden="">1</span>Aktif'){
                                        return 'Aktif';
                                    }else if(data == '<span hidden="">2</span>Tidak Aktif'){
                                        return 'Tidak Aktif';
                                    }else{
                                        return '-';
                                    }
                                }
                                else if(column === 8){
                                    console.log(data);
                                    if(data == '<span hidden="">1</span>Aktif'){
                                        return 'Aktif';
                                    }else if(data == '<span hidden="">2</span>Tidak Aktif'){
                                        return 'Tidak Aktif';
                                    }else{
                                        return '-';
                                    }
                                }
                                else if(column === 1){
                                    // var value = document.getElementById('papar').id;
                                    data = data.replace(/<.*?>/g, "");
                                    return $.trim(data);
                                }
                                else if(column === 34){
                                    // var value = document.getElementById('papar').id;
                                    data = data.replace(/<.*?>/g, "");
                                    return $.trim(data);
                                }
                                else{
                                    return data;
                                }
                            }
                        }
                        },
                        customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        var style = xlsx.xl['styles.xml'];
                        $( 'row c', sheet ).attr( 's', '25' );

                        $('xf', style).find("alignment[horizontal='center']").attr("wrapText", "1");
                        $('row', sheet).first().attr('ht', '40').attr('customHeight', "1");

                        },

                        filename: 'Senarai Pelesen Kilang Oleokimia',


                    },

                ],
                "language": {
                    "lengthMenu": "Memaparkan _MENU_ rekod per halaman  ",
                    "zeroRecords": "Maaf, tiada rekod.",
                    "info": "",
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


    </script>
@endsection
