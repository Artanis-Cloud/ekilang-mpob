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
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <p class="font-16 m-b-5">Jumlah Penyata Bulanan Yang Sudah Dihantar</p>
                                        <p class="font-16 m-b-5">Bulan: <b>{{ now()->month }}</b> Tahun:
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
                            <h4 class="card-title">Peratusan Penghantaran Penyata Bulanan</h4>
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
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">PENGESAHAN</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <canvas id="myChart2"></canvas>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block" style="color:#275047">Tidak</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Ya</span>
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['Kilang Buah', 'Kilang Penapis', 'Kilang Isirung', 'Kilang Oleokimia', 'Pusat Simpanan',
                    'Kilang Biodiesel'
                ],
                datasets: [{
                    // label: '# of Votes',
                    data: [50, 50, 30, 25, 32, 53],
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
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
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
                        $('#myModal').modal('show');
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
                    'Belum Hantar',
                ],
                datasets: [{
                    data: [300, 50],
                    backgroundColor: [
                        'rgb(0, 36, 255, 1)',
                        'rgb(255, 0, 0, 1)',

                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                animation: {
                    animateRotate: true
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
                labels: ['Kilang Buah', 'Kilang Penapis', 'Kilang Isirung', 'Kilang Oleokimia', 'Pusat Simpanan',
                    'Kilang Biodiesel'
                ],
                datasets: [{
                    // label: '# of Votes',
                    data: [50, 50, 30, 25, 32, 53],
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
                        beginAtZero: true
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
