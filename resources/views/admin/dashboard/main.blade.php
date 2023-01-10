@extends('layouts.main')

<style>
    @media print {
        @page {
            size: auto !important
        }

        .noPrint {
            display: block;
        }

        .noScreen {}
    }
</style>

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
                    <h4 class="page-title">Dashboard</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Halaman Utama
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div class="card-group">
                <div class="card" style="border-radius: 15px">
                    <div class="card-body">
                        <p class="font-16 m-b-5" style="font-weight:bold; color: #689786">Jumlah Penyata Bulanan Yang Sudah
                            Dihantar</p>
                        <div class="row" style="padding: 15px; margin: 15px">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <p class="font-16 m-b-5">Bulan:
                                            @if (now()->month == 2)
                                                <b>JANUARI</b> &nbsp;
                                            @elseif (now()->month == 3)
                                                <b>FEBRUARI</b> &nbsp;
                                            @elseif (now()->month == 4)
                                                <b>MAC</b> &nbsp;
                                            @elseif (now()->month == 5)
                                                <b>APRIL</b> &nbsp;
                                            @elseif (now()->month == 6)
                                                <b>MEI</b> &nbsp;
                                            @elseif (now()->month == 7)
                                                <b>JUN</b> &nbsp;
                                            @elseif (now()->month == 8)
                                                <b>JULAI</b> &nbsp;
                                            @elseif (now()->month == 9)
                                                <b>OGOS</b> &nbsp;
                                            @elseif (now()->month == 10)
                                                <b>SEPTEMBER</b> &nbsp;
                                            @elseif (now()->month == 11)
                                                <b>OKTOBER</b> &nbsp;
                                            @elseif (now()->month == 12)
                                                <b>NOVEMBER</b> &nbsp;
                                            @elseif (now()->month == 1)
                                                <b>DISEMBER</b> &nbsp;
                                            @endif

                                            Tahun:
                                            <b>{{ now()->year }}</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12 col-md-12"> --}}
                            <canvas id="barChart1"
                                style="height: 300px; width: 100%; max-height: 300px; position: relative;"></canvas>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card" style="border-radius: 15px">
                        <div class="card-body" style=" padding: 15px; margin: 15px">
                            <p class="font-16 m-b-5" style="font-weight:bold; color: #689786">Bilangan Dan Peratusan
                                Penghantaran Penyata Bulanan</p>
                            <canvas class="ct-chart-line" id="pieChart"
                                style="height: 300px; width: 100%; max-height: 300px; position: relative;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <div class="modal fade bs-example-modal-lg" id="PL91" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Jadual Penerimaan PL Bagi Kilang Buah</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <canvas id="myChart2"></canvas>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                        </button> --}}
                        <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade bs-example-modal-lg" id="PL101" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Jadual Penerimaan PL Bagi Kilang Penapis</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <canvas id="myChart3"></canvas>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                        </button> --}}
                        <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade bs-example-modal-lg" id="PL102" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Jadual Penerimaan PL Bagi Kilang Isirung</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <canvas id="myChart4"></canvas>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                        </button> --}}
                        <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade bs-example-modal-lg" id="PL104" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Jadual Penerimaan PL Bagi Kilang Oleokimia</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <canvas id="myChart5"></canvas>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                        </button> --}}
                        <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade bs-example-modal-lg" id="PL111" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Jadual Penerimaan PL Bagi Pusat Simpanan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <canvas id="myChart6"></canvas>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                        </button> --}}
                        <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade bs-example-modal-lg" id="PLBIO" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Jadual Penerimaan PL Bagi Kilang Biodiesel</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <canvas id="myChart7"></canvas>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                        </button> --}}
                        <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade bs-example-modal-lg" id="TOTAL" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="printableArea">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Jadual Penerimaan PL Bagi Semua Sektor - Bulan:
                            <span id="Bulan"></span>&nbsp Tahun: <span id="Tahun"></span></h4>
                        <div class="noPrint">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                        </div>
                    </div>



                    {{-- <script>
                        var dt = new Date();
                        var newm = (("0" + (dt.getMonth())).slice(-2));
                        let month = '12';

                        console.log(newm == 0);
                        if (newm == 00) {
                            document.getElementById("Bulan").innerHTML = 'month';
                        } else {
                            document.getElementById("Bulan").innerHTML = (("0" + (dt.getMonth())).slice(-2)) ;

                        }

                        console.log(month);

                        var dt = new Date();
                        document.getElementById("Tahun").innerHTML = (dt.getFullYear());
                    </script> --}}
                    <div class="modal-body">

                        <div class="noPrint">

                            {{-- <button onclick="exportTableToCSV('Jadual Penerimaan PL Semua Sektor.csv')">EXCEL</button> --}}
                            <button class="dt-button buttons-excel buttons-html5" onclick="ExportToExcel('cuba')"
                                style="background-color: white; color: #0a7569; ">
                                <i class="fa fa-file-excel" style="color: #0a7569"></i> Excel
                            </button>

                            <button class="dt-button buttons-excel buttons-html5" onclick="printDiv('printableArea')"
                                value='Print' style="background-color:white; color: #f90a0a; ">
                                <i class="fa fa-file-pdf" style="color: #f90a0a"></i> PDF
                            </button>
                        </div><br>
                        <div class="table-responsive">

                            <table class="table table-bordered mb-0" id="cuba" style="font-size: 13px">
                                <thead style="text-align: center">
                                    <tr class="noScreen noPrint">
                                        <td colspan="12">
                                            Jadual Penerimaan PL Bagi Semua Sektor -
                                            Bulan:
                                            @if (now()->month == 2)
                                                <b>JANUARI</b> &nbsp;
                                            @elseif (now()->month == 3)
                                                <b>FEBRUARI</b> &nbsp;
                                            @elseif (now()->month == 4)
                                                <b>MAC</b> &nbsp;
                                            @elseif (now()->month == 5)
                                                <b>APRIL</b> &nbsp;
                                            @elseif (now()->month == 6)
                                                <b>MEI</b> &nbsp;
                                            @elseif (now()->month == 7)
                                                <b>JUN</b> &nbsp;
                                            @elseif (now()->month == 8)
                                                <b>JULAI</b> &nbsp;
                                            @elseif (now()->month == 9)
                                                <b>OGOS</b> &nbsp;
                                            @elseif (now()->month == 10)
                                                <b>SEPTEMBER</b> &nbsp;
                                            @elseif (now()->month == 11)
                                                <b>OKTOBER</b> &nbsp;
                                            @elseif (now()->month == 12)
                                                <b>NOVEMBER</b> &nbsp;
                                            @elseif (now()->month == 1)
                                                <b>DISEMBER</b> &nbsp;
                                            @endif

                                            Tahun:
                                            <b>{{ now()->year }}</b>

                                        </td>

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
                                            document.getElementById("Tahun").innerHTML = (dt.getFullYear());
                                        </script>
                                    </tr>
                                    <tr style="background-color:  #d3d3d370">
                                        <td class="headerColor">Tarikh</td>
                                        @for ($i = $sdays; $i <= $days; $i++)
                                            {{-- @php --}}
                                            {{-- // $total_bulan[$i] = 0;
                                                // $total_kapasiti[$i] = 0;
                                                // $total_kapasiti_bio = 0;
                                            // @endphp --}}
                                            {{-- @if ($i == '1') --}}
                                            <td class="headerColor" scope="col"
                                                style="vertical-align: middle; text-align:center">{{ $i }}hb
                                            </td>
                                        @endfor
                                        <td class="headerColor">Jumlah</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align: right">

                                        <td style="text-align: left">Kilang Buah </td>
                                        @for ($i = $sdays; $i <= $days; $i++)
                                            <td scope="col" style="vertical-align: middle; text-align:center">
                                                {{ $PL91[$i][0]->pelesen }}
                                            </td>
                                        @endfor

                                        <td style="text-align: center">{{ $PL91_total }} / {{ $PC91[0]->pelesen }}
                                            &nbsp; ({{ round($percent91, 2) }}%)</td>
                                    </tr>
                                    <tr style="text-align: right">

                                        <td style="text-align: left">Kilang Penapis </td>
                                        @for ($i = $sdays; $i <= $days; $i++)
                                            <td scope="col" style="vertical-align: middle; text-align:center">
                                                {{ $PL101[$i][0]->pelesen }}
                                            </td>
                                        @endfor
                                        <td style="text-align: center">{{ $PL101_total }} / {{ $PC101[0]->pelesen }}
                                            &nbsp; ({{ round($percent101, 2) }}%)</td>

                                    </tr>
                                    <tr style="text-align: right">

                                        <td style="text-align: left">Kilang Isirung </td>
                                        @for ($i = $sdays; $i <= $days; $i++)
                                            <td scope="col" style="vertical-align: middle; text-align:center">
                                                {{ $PL102[$i][0]->pelesen }}
                                            </td>
                                        @endfor
                                        <td style="text-align: center">{{ $PL102_total }} / {{ $PC102[0]->pelesen }}
                                            &nbsp; ({{ round($percent102, 2) }}%)</td>

                                    </tr>
                                    <tr style="text-align: right">

                                        <td style="text-align: left">Kilang Oleokimia </td>
                                        @for ($i = $sdays; $i <= $days; $i++)
                                            <td scope="col" style="vertical-align: middle; text-align:center">
                                                {{ $PL104[$i][0]->pelesen }}
                                            </td>
                                        @endfor
                                        <td style="text-align: center">{{ $PL104_total }} / {{ $PC104[0]->pelesen }}
                                            &nbsp; ({{ round($percent104, 2) }}%)</td>

                                    </tr>
                                    <tr style="text-align: right">

                                        <td style="text-align: left">Pusat Simpanan </td>
                                        @for ($i = $sdays; $i <= $days; $i++)
                                            <td scope="col" style="vertical-align: middle; text-align:center">
                                                {{ $PL111[$i][0]->pelesen }}
                                            </td>
                                        @endfor
                                        <td style="text-align: center">{{ $PL111_total }} / {{ $PC111[0]->pelesen }}
                                            &nbsp; ({{ round($percent111, 2) }}%)</td>

                                    </tr>
                                    <tr style="text-align: right">

                                        <td style="text-align: left">Kilang Biodiesel </td>
                                        @for ($i = $sdays; $i <= $days; $i++)
                                            <td scope="col" style="vertical-align: middle; text-align:center">
                                                {{ $PLBIO[$i][0]->pelesen }}
                                            </td>
                                        @endfor
                                        <td style="text-align: center">{{ $PLBIO_total }} / {{ $PCBIO[0]->pelesen }}
                                            &nbsp; ({{ round($percentBIO, 2) }}%)</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                        </button> --}}
                        <div class="noPrint">
                            <button type="submit" class="btn btn-primary ml-1 noPrint" data-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block noPrint">Tutup</span>
                            </button>

                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script>
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>
    <script>
        // Chart.register(ChartDataLabels);

        var Labels = new Array();
        var Count = new Array();
        $(document).ready(function() {
            $.ajax({ //create an ajax request to display.php
                type: "GET",
                url: "{{ route('jumlah_penyata_dashboard') }}",
                success: function(response) {
                    datas = JSON.parse(response);
                    Object.keys(datas).forEach(key => {
                        nama_kilang = datas[key].nama_kilang
                        Labels.push(nama_kilang);
                        Count.push(datas[key].count);
                    });
                }
            });
            // console.log(Labels);

        });
        // Labels.push('Kilang Buah');
        // Labels.push('Kilang Penapis');
        // Labels.push('Kilang Isirung');
        // Labels.push('Kilang Oleokimia');
        // Labels.push('Pusat Simpanan');
        // Labels.push('Kilang Biodiesel');
        // console.log(Labels);
        const barChartCTX = document.getElementById('barChart1');
        var barChart = new Chart(barChartCTX, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['Kilang Buah', 'Kilang Penapis', 'Kilang Isirung', 'Kilang Oleokimia', 'Pusat Simpanan',
                    'Kilang Biodiesel'
                ],
                // labels: Labels,
                datasets: [{
                    data: [
                        {{ $PL91_total }}, {{ $PL101_total }}, {{ $PL102_total }},
                        {{ $PL104_total }}, {{ $PL111_total }}, {{ $PLBIO_total }}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMin: 10,
                        suggestedMax: 10,
                        grid: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Jumlah Penyata Bulanan'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Sektor Kilang'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    datalabels: {
                        anchor: 'end',
                        align: 'top',
                        formatter: Math.round,
                        font: {
                            weight: 'bold'
                        }
                    }
                },
                onClick: (e, activeEls) => {
                    // let datasetIndex = activeEls[0].datasetIndex;
                    let dataIndex = activeEls[0].index;
                    // let datasetLabel = e.chart.data.datasets[datasetIndex].label;
                    // let value = e.chart.data.datasets[datasetIndex].data[dataIndex];
                    let labelKilang = e.chart.data.labels[dataIndex];
                    // console.log(value);
                    if (labelKilang == 'Kilang Buah') {
                        $('#PL91').modal('show');
                    } else if (labelKilang == 'Kilang Penapis') {
                        $('#PL101').modal('show');
                    } else if (labelKilang == 'Kilang Isirung') {
                        $('#PL102').modal('show');
                    } else if (labelKilang == 'Kilang Oleokimia') {
                        $('#PL104').modal('show');
                    } else if (labelKilang == 'Pusat Simpanan') {
                        $('#PL111').modal('show');
                    } else if (labelKilang == 'Kilang Biodiesel') {
                        $('#PLBIO').modal('show');
                    }
                },
            }
        });
    </script>

    <script>
        const pie = document.getElementById('pieChart');
        const pieChart = new Chart(pie, {
            type: 'pie',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: [
                    'Sudah Hantar',
                    'Belum Hantar'
                ],
                datasets: [{
                    data: [{{ $total_overall }}, {{ $total_overall_1 }}],
                    // data: [{{ $total_overall }}, {{ $total_overall_1 }}],
                    backgroundColor: [
                        'rgb(0, 36, 255, 1)',
                        'rgb(255, 0, 0, 1)',

                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                tooltips: {
                    enabled: false
                },
                plugins: {
                    datalabels: {
                        formatter: (value, categories) => {

                            let sum = 0;
                            let dataArr = categories.chart.data.datasets[0].data;
                            dataArr.map(data => {
                                sum += data;
                            });
                            let percentage = (value * 100 / sum).toFixed(2) + "%";
                            return percentage;


                        },
                        color: '#fff',
                    }
                },
                onClick: (e, activeEls) => {
                    let datasetIndex = activeEls[0].datasetIndex;
                    let dataIndex = activeEls[0].index;
                    let datasetLabel = e.chart.data.datasets[datasetIndex].label;
                    let value = e.chart.data.datasets[datasetIndex].data[dataIndex];
                    let label = e.chart.data.labels[dataIndex];
                    // console.log(label);
                    $('#TOTAL').modal('show');
                    // now I want to retrieve the label/data using the index, how to?
                }

            }
        });
    </script>

    <script>
        const ctx2 = document.getElementById('myChart2');

        var days2 = {{ $days }};
        var daysbuah = {{ $sdays }};
        // console.log(days2);
        let labels2 = [];
        let data2 = [];
        var array2 = @json($PL91);
        // console.log(array2);
        for (let index2 = daysbuah; index2 <= days2; index2++) {
            const pl91 = array2[index2];
            labels2.push(pl91[0]['days'] + 'hb');
            data2.push(pl91[0]['pelesen']);
        }

        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: labels2,
                datasets: [{
                    // label: '# of Votes',
                    data: data2,


                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMin: 10,
                        suggestedMax: 10,
                        title: {
                            display: true,
                            text: 'Jumlah Penyata Bulanan'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Haribulan'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
            }
        });
    </script>
    <script>
        const ctx3 = document.getElementById('myChart3');

        var dayspenapis = {{ $sdays }};
        var days = {{ $days }};
        let labels = [];
        let data = [];
        var array = @json($PL101);
        // console.log(array);
        for (let index = dayspenapis; index <= days; index++) {
            const pl101 = array[index];
            labels.push(pl101[0]['days'] + 'hb');
            data.push(pl101[0]['pelesen']);
        }

        var myChart3 = new Chart(ctx3, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: labels,
                datasets: [{
                    // label: '# of Votes',
                    data: data,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMin: 10,
                        suggestedMax: 10,
                        title: {
                            display: true,
                            text: 'Jumlah Penyata Bulanan'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Haribulan'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
            }

        });
    </script>

    <script>
        const ctx4 = document.getElementById('myChart4');
        var daysisirung = {{ $sdays }};
        var days4 = {{ $days }};
        let labels4 = [];
        let data4 = [];
        var array4 = @json($PL102);
        // console.log(array4);
        for (let index4 = daysisirung; index4 <= days4; index4++) {
            const pl102 = array4[index4];
            labels4.push(pl102[0]['days'] + 'hb');
            data4.push(pl102[0]['pelesen']);
        }
        var myChart4 = new Chart(ctx4, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: labels4,
                datasets: [{
                    // label: '# of Votes',
                    data: data4,
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMin: 10,
                        suggestedMax: 10,
                        title: {
                            display: true,
                            text: 'Jumlah Penyata Bulanan'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Haribulan'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
            }
        });
    </script>
    <script>
        const ctx5 = document.getElementById('myChart5');

        var days104 = {{ $sdays }};

        var days5 = {{ $days }};
        let labels5 = [];
        let data5 = [];
        var array5 = @json($PL104);
        console.log(array5);
        for (let index5 = days104; index5 <= days5; index5++) {
            const pl104 = array5[index5];
            labels5.push(pl104[0]['days'] + 'hb');
            data5.push(pl104[0]['pelesen']);
        }

        var myChart5 = new Chart(ctx5, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: labels5,
                datasets: [{
                    // label: '# of Votes',
                    data: data5,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMin: 10,
                        suggestedMax: 10,
                        title: {
                            display: true,
                            text: 'Jumlah Penyata Bulanan'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Haribulan'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
            }
        });
    </script>
    <script>
        const ctx6 = document.getElementById('myChart6');
        var days111 = {{ $sdays }};

        var days6 = {{ $days }};
        let labels6 = [];
        let data6 = [];
        var array6 = @json($PL111);
        // console.log(array);
        for (let index6 = days111; index6 <= days6; index6++) {
            const pl111 = array6[index6];
            labels6.push(pl111[0]['days'] + 'hb');
            data6.push(pl111[0]['pelesen']);
        }
        var myChart6 = new Chart(ctx6, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: labels6,
                datasets: [{
                    // label: '# of Votes',
                    data: data6,
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMin: 10,
                        suggestedMax: 10,
                        title: {
                            display: true,
                            text: 'Jumlah Penyata Bulanan'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Haribulan'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
            }
        });
    </script>
    <script>
        const ctx7 = document.getElementById('myChart7');
        var daysbio = {{ $sdays }};

        var days7 = {{ $days }};
        let labels7 = [];
        let data7 = [];
        var array7 = @json($PLBIO);
        // console.log(array);
        for (let index7 = daysbio; index7 <= days7; index7++) {
            const plbio = array7[index7];
            labels7.push(plbio[0]['days'] + 'hb');
            data7.push(plbio[0]['pelesen']);
        }
        var myChart7 = new Chart(ctx7, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: labels7,
                datasets: [{
                    // label: '# of Votes',
                    data: data7,
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMin: 10,
                        suggestedMax: 10,
                        title: {
                            display: true,
                            text: 'Jumlah Penyata Bulanan'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Haribulan'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
            }
        });
    </script>

    <script>
        function printDiv(printableArea) {
            var hashid = "#" + printableArea;
            var tagname = $(hashid).prop("tagName").toLowerCase();
            var attributes = "";
            var attrs = document.getElementById(printableArea).attributes;
            $.each(attrs, function(i, elem) {
                attributes += " " + elem.name + " ='" + elem.value + "' ";
            })
            var divToPrint = $(hashid).html();
            var head = "<html><head>" + $("head").html() + "</head>";
            var allcontent = head + "<body  onload='window.print()' >" + "<" + tagname + attributes + ">" + divToPrint +
                "</" + tagname + ">" + "</body></html>";
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write(allcontent);
            newWin.document.close();
            setTimeout(function() {
                newWin.close();
            }, 10);
        }
    </script>

    <script>
        function ExportToExcel() {
            var filename = "Jadual Penerimaan PL Bagi Semua Sektor"
            var tab_text = "<table border='2px'>";
            var textRange;
            var j = 0;
            tab = document.getElementById('cuba');

            for (j = 0; j < tab.rows.length; j++) {
                tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
            }

            tab_text = tab_text + "</table>";
            var a = document.createElement('a');
            var data_type = 'data:application/vnd.ms-excel';
            a.href = data_type + ', ' + encodeURIComponent(tab_text);
            a.download = filename + '.xls';
            a.click();
        }
    </script>
    <style>
        /* Hide page by default */
        html { display : none; }
      </style>

      <script>
        if (self == top) {
          // Everything checks out, show the page.
          document.documentElement.style.display = 'block';
        } else {
          // Break out of the frame.
          top.location = self.location;
        }
      </script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"rel="stylesheet">
@endsection
