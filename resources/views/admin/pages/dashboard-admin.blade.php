@extends('admin.pages.layout')


@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title text-primary ">Dashboard Admin
                        </div>
                        <div class="card-stats-items d-flex justify-content-center">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $adminCount }}</div>
                                <div style="font-size: .7rem">Total Admin</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $officerCount }}</div>
                                <div style="font-size: .7rem">Total Officer</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{ $staffCount }}</div>
                                <div style="font-size: .7rem">Total Staff</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Surat</h4>
                        </div>
                        <div class="card-body">
                            {{ $suratCount }} Data
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
                            <h4> Total Pengajuan Disposisi</h4>
                        </div>
                        <div class="card-body">
                            {{ $pengajuanCount }} Data
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="disposisi-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4> Total Disposisi</h4>
                        </div>
                        <div class="card-body">
                            {{ $alldisposisiCount }} Data
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>

    <script>
        const disposisi_chart = document.getElementById("disposisi-chart").getContext('2d');

        const disposisi_chart_bg_color = disposisi_chart.createLinearGradient(0, 0, 0, 70);
        disposisi_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
        disposisi_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

        const disposisi_chart_data = new Chart(disposisi_chart, {
            type: 'line',
            data: {
                labels: {!! json_encode($disposisiChartData['labels']) !!},
                datasets: [{
                    label: 'Disposisi',
                    data: {!! json_encode($disposisiChartData['data']) !!},
                    backgroundColor: disposisi_chart_bg_color,
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
                labels: {!! json_encode($pengajuanChartData['labels']) !!},
                datasets: [{
                    label: 'Pengajuan',
                    data: {!! json_encode($pengajuanChartData['data']) !!},
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
