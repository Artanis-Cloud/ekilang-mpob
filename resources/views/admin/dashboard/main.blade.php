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

    </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    <script type=text/javascript>

    </script>

    <script>
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
                    data: [26, 32, 90, 61, 74, 43],
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
                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', ],
                datasets: [{
                    // label: '# of Votes',
                    data: [26, 32, 90, 61, 4, 5, 2, 7, 9, 2],
                    // backgroundColor: [
                    //     getRandomColor(),
                    //     getRandomColor(),
                    //     getRandomColor(),
                    //     getRandomColor(),
                    //     getRandomColor(),
                    //     getRandomColor(),
                    //     getRandomColor(),
                    //     getRandomColor(),
                    //     getRandomColor(),
                    //     getRandomColor()],



                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)',
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
    <script>
        const ctx3 = document.getElementById('myChart3');
        var myChart3 = new Chart(ctx3, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', ],
                datasets: [{
                    // label: '# of Votes',
                    data: [26, 32, 90, 61, 4, 5, 2, 7, 9, 2],
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
    <script>
        const ctx4 = document.getElementById('myChart4');
        var myChart4 = new Chart(ctx4, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', ],
                datasets: [{
                    // label: '# of Votes',
                    data: [26, 32, 90, 61, 4, 5, 2, 7, 9, 2],
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
    <script>
        const ctx5 = document.getElementById('myChart5');
        var myChart5 = new Chart(ctx5, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', ],
                datasets: [{
                    // label: '# of Votes',
                    data: [26, 32, 90, 61, 4, 5, 2, 7, 9, 2],
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
    <script>
        const ctx6 = document.getElementById('myChart6');
        var myChart6 = new Chart(ctx6, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', ],
                datasets: [{
                    // label: '# of Votes',
                    data: [26, 32, 90, 61, 4, 5, 2, 7, 9, 2],
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
    <script>
        const ctx7 = document.getElementById('myChart7');
        var myChart7 = new Chart(ctx7, {
            type: 'bar',
            responsive: false,
            maintainAspectRatio: false,
            data: {
                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', ],
                datasets: [{
                    // label: '# of Votes',
                    data: [26, 32, 90, 61, 4, 5, 2, 7, 9, 2],
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
