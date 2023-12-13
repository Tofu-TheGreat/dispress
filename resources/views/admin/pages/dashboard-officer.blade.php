@extends('admin.pages.layout')


@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title text-primary">Dashboard Officer
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">24</div>
                                <div style="font-size: .7rem">Instansi</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">12</div>
                                <div style="font-size: .7rem">Surat Keluar</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">23</div>
                                <div style="font-size: .7rem">Staff</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Officer</h4>
                        </div>
                        <div class="card-body">
                            {{ $officerCount }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="surat-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Surat</h4>
                        </div>
                        <div class="card-body">
                            10 Data
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="pengajuan-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pengajuan</h4>
                        </div>
                        <div class="card-body">
                            10 Data
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>

    {{-- Chart Surat --}}
    <script>
        const surat_chart = document.getElementById("surat-chart").getContext('2d');

        const surat_chart_bg_color = surat_chart.createLinearGradient(0, 0, 0, 70);
        surat_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
        surat_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

        const surat_chart_data = new Chart(surat_chart, {
            type: 'line',
            data: {
                labels: {!! json_encode($suratChartData['labels']) !!},
                datasets: [{
                    label: 'Surat',
                    data: {!! json_encode($suratChartData['data']) !!},
                    backgroundColor: surat_chart_bg_color,
                    borderWidth: 3,
                    borderColor: 'rgba(63,82,227,1)',
                    pointBorderWidth: 0,
                    pointBorderColor: 'transparent',
                    pointRadius: 3,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,1)',
                }]
            },
            options: {
                layout: {
                    padding: {
                        bottom: -1,
                        left: -1
                    }
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            beginAtZero: true,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false,
                        },
                        ticks: {
                            display: false
                        }
                    }]
                },
            }
        });
    </script>

    <script>
        const pengajuan_chart = document.getElementById("pengajuan-chart").getContext('2d');

        const pengajuan_chart_bg_color = pengajuan_chart.createLinearGradient(0, 0, 0, 70);
        pengajuan_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
        pengajuan_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

        const pengajuan_chart_data = new Chart(pengajuan_chart, {
            type: 'line',
            data: {
                labels: {!! json_encode($pengajuanUserChart['labels']) !!},
                datasets: [{
                    label: 'Pengajuan',
                    data: {!! json_encode($pengajuanUserChart['data']) !!},
                    backgroundColor: pengajuan_chart_bg_color,
                    borderWidth: 3,
                    borderColor: 'rgba(63,82,227,1)',
                    pointBorderWidth: 0,
                    pointBorderColor: 'transparent',
                    pointRadius: 3,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,1)',
                }]
            },
            options: {
                layout: {
                    padding: {
                        bottom: -1,
                        left: -1
                    }
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            beginAtZero: true,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false,
                        },
                        ticks: {
                            display: false
                        }
                    }]
                },
            }
        });
    </script>
@endsection
