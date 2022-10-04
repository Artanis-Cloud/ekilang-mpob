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

            {{-- <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body analytics-info">
                                <h4 class="card-title">Bsic Line Chart</h4>
                                <div id="basic-line" style="height:400px;"></div>
                            </div>
                        </div>
                    </div> --}}
            <div class="card-body analytics-info">

                <div class="text-center">
                    <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Prestasi OER</h3>
                    <h5 style="color: rgb(39, 80, 71); font-size:14px">Laporan Prestasi OER Kilang Buah</h5>
                </div>
                <hr>
                <div id="oer" style="height:400px; "></div>
                {{-- <canvas class="ct-chart-line" id="myChart"
                    style="height: 300px; width: 100%; max-height: 300px; position: relative;"></canvas> --}}

            </div>
        </div>
    </div>
    </div>
    <br><br><br>
@endsection
@section('scripts')
    <!--Custom JavaScript -->
    <script src="{{ asset('nice-admin/dist/js/custom.min.js') }}"></script>
    <!-- This Page JS -->
    <script src="{{ asset('nice-admin/dist/js/pages/c3-chart/line/c3-line-region.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('nice-admin/assets/extra-libs/c3/c3.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="{{ asset('nice-admin/assets/libs/echarts/dist/echarts-en.min.js') }}"></script>
    <script src="{{ asset('nice-admin/dist/js/pages/echarts/line/line-charts.js') }}"></script>
    <script>
        $(function() {

            // Callback that creates and populates a data table, instantiates the line region chart, passes in the data and draws it.
            var lineRegionChart = c3.generate({
                bindto: '#oer',
                data: {
                    columns: [
                        // loop
                        ['Individu', {{ $individu }}],
                        ['Daerah', {{ $individu }}],
                        ['Negeri', {{ $negeri }}],
                        ['Semenanjung Malaysia', {{ $individu }}],
                        ['Malaysia', {{ $individu }}],
                    ],
                    type: 'line'
                },
                bar: {
                    width: {
                        ratio: 0.5
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        categories: [],
                        title: {
                            display: true,
                            text: 'BULAN/TAHUN'
                        }
                    }
                }
            });
        });
    </script>
    <script>
        // Chart.register(ChartDataLabels);

        // var Labels = new Array();
        // var Count = new Array();
        // $(document).ready(function() {
        //     $.ajax({ //create an ajax request to display.php
        //         type: "GET",
        //         url: "{{ route('jumlah_penyata_dashboard') }}",
        //         success: function(response) {
        //             datas = JSON.parse(response);
        //             Object.keys(datas).forEach(key => {
        //                 nama_kilang = datas[key].nama_kilang
        //                 Labels.push(nama_kilang);
        //                 Count.push(datas[key].count);
        //             });
        //         }
        //     });
        //     console.log(Labels);

        // });
        // Labels.push('Kilang Buah');
        // Labels.push('Kilang Penapis');
        // Labels.push('Kilang Isirung');
        // Labels.push('Kilang Oleokimia');
        // Labels.push('Pusat Simpanan');
        // Labels.push('Kilang Biodiesel');
        // console.log(Labels);
        const ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            responsive: false,
            maintainAspectRatio: false,
            point: {
                r: 4
            },
            color: {
                pattern: ['#2962FF', '#4fc3f7']
            },
            data: {
                columns: [
                    ['OER', 30, 200, 100, 400, 0, 100],
                    ['data2', 100, 200, 10, 400, 100, 25]
                ],
                regions: {
                    'data3': [{
                        'start': 1,
                        'end': 2,
                        'style': 'dashed'
                    }, {
                        'start': 3
                    }], // currently 'dashed' style only
                    'data2': [{
                        'end': 3
                    }]
                }



                // labels: ['Kilang Buah', 'Kilang Penapis', 'Kilang Isirung', 'Kilang Oleokimia', 'Pusat Simpanan',
                //     'Kilang Biodiesel'
                // ],
                // columns: [
                //                     [ 30, 200, 100, 400, 0, 100],
                //                     [ 100, 200, 10, 400, 100, 25],
                //                     [ 100, 200, 10, 400, 100, 25],
                //                     [ 100, 200, 10, 400, 100, 25],
                //                     [ 100, 200, 10, 400, 100, 25],
                //                     [ 100, 200, 10, 400, 100, 25],
                //                 ],
                // labels: Labels,


                // datasets: [{
                // label: '# of Votes',
                // data: Count,
                // data: [100, 45, 250,187, 76, 90
                // ],

                // data: [{
                //     columns: [
                //         ['Kilang Buah', 30, 200, 100, 400, 0, 100],
                //         ['Kilang Penapis', 100, 200, 10, 400, 100, 25],
                //         ['Kilang Isirung', 100, 200, 10, 400, 100, 25],
                //         ['Kilang Oleokimia', 100, 200, 10, 400, 100, 25],
                //         ['Pusat Simpanan', 100, 200, 10, 400, 100, 25],
                //         ['Kilang Biodiesel', 100, 200, 10, 400, 100, 25],
                //     ],
                // regions: {
                //     'Kilang Buah': [{
                //         'start': 1,
                //         'end': 2,
                //         'style': 'dashed'
                //     }, {
                //         'start': 3
                //     }], // currently 'dashed' style only
                //     'Kilang Penapis': [{
                //         'end': 3
                //     }]
                // }
                // }],
                // backgroundColor: [
                //     'rgba(255, 99, 132, 0.2)',
                //     'rgba(54, 162, 235, 0.2)',
                //     'rgba(255, 206, 86, 0.2)',
                //     'rgba(75, 192, 192, 0.2)',
                //     'rgba(153, 102, 255, 0.2)',
                //     'rgba(255, 159, 64, 0.2)'
                // ],
                // borderColor: [
                //     'rgba(255, 99, 132, 1)',
                //     'rgba(54, 162, 235, 1)',
                //     'rgba(255, 206, 86, 1)',
                //     'rgba(75, 192, 192, 1)',
                //     'rgba(153, 102, 255, 1)',
                //     'rgba(255, 159, 64, 1)'
                // ],
                // borderWidth: 1
                // }]
            },
            grid: {
                y: {
                    show: true
                }
            },
            options: {
                scales: {
                    y: {
                        suggestedMin: 10,
                        suggestedMax: 10,
                        title: {
                            display: true,
                            text: 'OER (%)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan & Tahun'
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
                // onClick: (e, activeEls) => {
                //     let datasetIndex = activeEls[0].datasetIndex;
                //     let dataIndex = activeEls[0].index;
                //     let datasetLabel = e.chart.data.datasets[datasetIndex].label;
                //     let value = e.chart.data.datasets[datasetIndex].data[dataIndex];
                //     let label = e.chart.data.labels[dataIndex];
                //     console.log(label);
                //     if (label == 'Kilang Buah') {
                //         $('#PL91').modal('show');
                //     } else if (label == 'Kilang Penapis') {
                //         $('#PL101').modal('show');
                //     } else if (label == 'Kilang Isirung') {
                //         $('#PL102').modal('show');
                //     } else if (label == 'Kilang Oleokimia') {
                //         $('#PL104').modal('show');
                //     } else if (label == 'Pusat Simpanan') {
                //         $('#PL111').modal('show');
                //     } else if (label == 'Kilang Biodiesel') {
                //         $('#PLBIO').modal('show');
                //     }
                // },
                // now I want to retrieve the label/data using the index, how to?
            }
        });
    </script>
@endsection
