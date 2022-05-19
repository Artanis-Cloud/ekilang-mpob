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
                    <h4 class="page-title">Dashboard</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">njknkjnk
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
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <p class="font-16 m-b-5">Jumlah Penyata Bulanan Yang Sudah Dihantar</p>
                                        <p class="font-16 m-b-5">Bulan:
                                            @if (now()->month == 1)
                                                <b>JANUARI</b> &nbsp;
                                            @elseif (now()->month == 2)
                                                <b>FEBRUARI</b> &nbsp;
                                            @elseif (now()->month == 3)
                                                <b>MAC</b> &nbsp;
                                            @elseif (now()->month == 4)
                                                <b>APRIL</b> &nbsp;
                                            @elseif (now()->month == 5)
                                                <b>MEI</b> &nbsp;
                                            @elseif (now()->month == 6)
                                                <b>JUN</b> &nbsp;
                                            @elseif (now()->month == 7)
                                                <b>JULAI</b> &nbsp;
                                            @elseif (now()->month == 8)
                                                <b>OGOS</b> &nbsp;
                                            @elseif (now()->month == 9)
                                                <b>SEPTEMBER</b> &nbsp;
                                            @elseif (now()->month == 10)
                                                <b>OKTOBER</b> &nbsp;
                                            @elseif (now()->month == 11)
                                                <b>NOVEMBER</b> &nbsp;
                                            @elseif (now()->month == 12)
                                                <b>DECEMBER</b> &nbsp;
                                            @endif

                                            Tahun:
                                            <b>{{ now()->year }}</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <canvas class="ct-chart-line" id="myChart"
                                    style="height: 300px; width: 100%; max-height: 300px; position: relative;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bilangan Dan Peratusan Penghantaran Penyata Bulanan</h4>
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
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Jadual Penerimaan PL Bagi Semua Sektor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="cuba" style="font-size: 13px">
                                <thead style="text-align: center">
                                    <tr>
                                        <th>Tarikh</th>
                                        <th>1hb</th>
                                        <th>2hb</th>
                                        <th>3hb</th>
                                        <th>4hb</th>
                                        <th>5hb</th>
                                        <th>6hb</th>
                                        <th>7hb</th>
                                        <th>8hb</th>
                                        <th>9hb</th>
                                        <th>10hb</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align: right">

                                        <td style="text-align: left">Kilang Buah </td>
                                        <td style="text-align: center">{{ $PL91[1][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL91[2][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL91[3][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL91[4][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL91[5][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL91[6][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL91[7][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL91[8][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL91[9][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL91[10][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL91_total }} / {{ $PC91[0]->pelesen }}
                                            &nbsp; ({{ round($percent91, 2) }}%)</td>
                                    </tr>
                                    <tr style="text-align: right">

                                        <td style="text-align: left">Kilang Penapis </td>
                                        <td style="text-align: center">{{ $PL101[1][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL101[2][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL101[3][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL101[4][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL101[5][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL101[6][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL101[7][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL101[8][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL101[9][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL101[10][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL101_total }} / {{ $PC101[0]->pelesen }}
                                            &nbsp; ({{ round($percent101, 2) }}%)</td>

                                    </tr>
                                    <tr style="text-align: right">

                                        <td style="text-align: left">Kilang Isirung </td>
                                        <td style="text-align: center">{{ $PL102[1][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL102[2][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL102[3][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL102[4][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL102[5][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL102[6][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL102[7][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL102[8][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL102[9][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL102[10][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL102_total }} / {{ $PC102[0]->pelesen }}
                                            &nbsp; ({{ round($percent102, 2) }}%)</td>

                                    </tr>
                                    <tr style="text-align: right">

                                        <td style="text-align: left">Kilang Oleokimia </td>
                                        <td style="text-align: center">{{ $PL104[1][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL104[2][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL104[3][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL104[4][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL104[5][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL104[6][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL104[7][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL104[8][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL104[9][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL104[10][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL104_total }} / {{ $PC104[0]->pelesen }}
                                            &nbsp; ({{ round($percent104, 2) }}%)</td>

                                    </tr>
                                    <tr style="text-align: right">

                                        <td style="text-align: left">Pusat Simpanan </td>
                                        <td style="text-align: center">{{ $PL111[1][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL111[2][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL111[3][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL111[4][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL111[5][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL111[6][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL111[7][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL111[8][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL111[9][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL111[10][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PL111_total }} / {{ $PC111[0]->pelesen }}
                                            &nbsp; ({{ round($percent111, 2) }}%)</td>

                                    </tr>
                                    <tr style="text-align: right">

                                        <td style="text-align: left">Kilang Biodiesel </td>
                                        <td style="text-align: center">{{ $PLBIO[1][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PLBIO[2][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PLBIO[3][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PLBIO[4][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PLBIO[5][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PLBIO[6][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PLBIO[7][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PLBIO[8][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PLBIO[9][0]->pelesen }} </td>
                                        <td style="text-align: center">{{ $PLBIO[10][0]->pelesen }} </td>
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
        Chart.register(ChartDataLabels);

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
            console.log(Labels);

        });
        Labels.push('Kilang Buah');
        Labels.push('Kilang Penapis');
        Labels.push('Kilang Isirung');
        Labels.push('Kilang Oleokimia');
        Labels.push('Pusat Simpanan');
        Labels.push('Kilang Biodiesel');
        console.log(Labels);
        const ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['Kilang Buah', 'Kilang Penapis', 'Kilang Isirung', 'Kilang Oleokimia', 'Pusat Simpanan',
                    'Kilang Biodiesel'
                ],
                labels: Labels,
                datasets: [{
                    // label: '# of Votes',
                    // data: Count,
                    data: [{{ $PL91_total }}, {{ $PL101_total }}, {{ $PL102_total }},
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
                        title: {
                            display: true,
                            text: 'Jumlah Penyata Bulanan'
                        }
                    },
                    x: {
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
                    let datasetIndex = activeEls[0].datasetIndex;
                    let dataIndex = activeEls[0].index;
                    let datasetLabel = e.chart.data.datasets[datasetIndex].label;
                    let value = e.chart.data.datasets[datasetIndex].data[dataIndex];
                    let label = e.chart.data.labels[dataIndex];
                    console.log(label);
                    if (label == 'Kilang Buah') {
                        $('#PL91').modal('show');
                    } else if (label == 'Kilang Penapis') {
                        $('#PL101').modal('show');
                    } else if (label == 'Kilang Isirung') {
                        $('#PL102').modal('show');
                    } else if (label == 'Kilang Oleokimia') {
                        $('#PL104').modal('show');
                    } else if (label == 'Pusat Simpanan') {
                        $('#PL111').modal('show');
                    } else if (label == 'Kilang Biodiesel') {
                        $('#PLBIO').modal('show');
                    }
                },
                // now I want to retrieve the label/data using the index, how to?
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
        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['1hb', '2hb', '3hb', '4hb', '5hb', '6hb', '7hb', '8hb', '9hb', '10hb' ],
                datasets: [{
                    // label: '# of Votes',
                    data: [{{ $PL91[1][0]->pelesen }}, {{ $PL91[2][0]->pelesen }},
                        {{ $PL91[3][0]->pelesen }}, {{ $PL91[4][0]->pelesen }},
                        {{ $PL91[5][0]->pelesen }}, {{ $PL91[6][0]->pelesen }},
                        {{ $PL91[7][0]->pelesen }}, {{ $PL91[8][0]->pelesen }},
                        {{ $PL91[9][0]->pelesen }}, {{ $PL91[10][0]->pelesen }}
                    ],


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
        var myChart3 = new Chart(ctx3, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['1hb', '2hb', '3hb', '4hb', '5hb', '6hb', '7hb', '8hb', '9hb', '10hb' ],
                datasets: [{
                    // label: '# of Votes',
                    data: [{{ $PL101[1][0]->pelesen }}, {{ $PL101[2][0]->pelesen }},
                        {{ $PL101[3][0]->pelesen }}, {{ $PL101[4][0]->pelesen }},
                        {{ $PL101[5][0]->pelesen }}, {{ $PL101[6][0]->pelesen }},
                        {{ $PL101[7][0]->pelesen }}, {{ $PL101[8][0]->pelesen }},
                        {{ $PL101[9][0]->pelesen }}, {{ $PL101[10][0]->pelesen }}
                    ],
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
        var myChart4 = new Chart(ctx4, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['1hb', '2hb', '3hb', '4hb', '5hb', '6hb', '7hb', '8hb', '9hb', '10hb', ],
                datasets: [{
                    // label: '# of Votes',
                    data: [{{ $PL102[1][0]->pelesen }}, {{ $PL102[2][0]->pelesen }},
                        {{ $PL102[3][0]->pelesen }}, {{ $PL102[4][0]->pelesen }},
                        {{ $PL102[5][0]->pelesen }}, {{ $PL102[6][0]->pelesen }},
                        {{ $PL102[7][0]->pelesen }}, {{ $PL102[8][0]->pelesen }},
                        {{ $PL102[9][0]->pelesen }}, {{ $PL102[10][0]->pelesen }}
                    ],
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
        var myChart5 = new Chart(ctx5, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['1hb', '2hb', '3hb', '4hb', '5hb', '6hb', '7hb', '8hb', '9hb', '10hb', ],
                datasets: [{
                    // label: '# of Votes',
                    data: [{{ $PL104[1][0]->pelesen }}, {{ $PL104[2][0]->pelesen }},
                        {{ $PL104[3][0]->pelesen }}, {{ $PL104[4][0]->pelesen }},
                        {{ $PL104[5][0]->pelesen }}, {{ $PL104[6][0]->pelesen }},
                        {{ $PL104[7][0]->pelesen }}, {{ $PL104[8][0]->pelesen }},
                        {{ $PL104[9][0]->pelesen }}, {{ $PL104[10][0]->pelesen }}
                    ],
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
        var myChart6 = new Chart(ctx6, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['1hb', '2hb', '3hb', '4hb', '5hb', '6hb', '7hb', '8hb', '9hb', '10hb', ],
                datasets: [{
                    // label: '# of Votes',
                    data: [{{ $PL111[1][0]->pelesen }}, {{ $PL111[2][0]->pelesen }},
                        {{ $PL111[3][0]->pelesen }}, {{ $PL111[4][0]->pelesen }},
                        {{ $PL111[5][0]->pelesen }}, {{ $PL111[6][0]->pelesen }},
                        {{ $PL111[7][0]->pelesen }}, {{ $PL111[8][0]->pelesen }},
                        {{ $PL111[9][0]->pelesen }}, {{ $PL111[10][0]->pelesen }}
                    ],
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
        var myChart7 = new Chart(ctx7, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['1hb', '2hb', '3hb', '4hb', '5hb', '6hb', '7hb', '8hb', '9hb', '10hb', ],
                datasets: [{
                    // label: '# of Votes',
                    data: [{{ $PLBIO[1][0]->pelesen }}, {{ $PLBIO[2][0]->pelesen }},
                        {{ $PLBIO[3][0]->pelesen }}, {{ $PLBIO[4][0]->pelesen }},
                        {{ $PLBIO[5][0]->pelesen }}, {{ $PLBIO[6][0]->pelesen }},
                        {{ $PLBIO[7][0]->pelesen }}, {{ $PLBIO[8][0]->pelesen }},
                        {{ $PLBIO[9][0]->pelesen }}, {{ $PLBIO[10][0]->pelesen }}
                    ],
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
@endsection
