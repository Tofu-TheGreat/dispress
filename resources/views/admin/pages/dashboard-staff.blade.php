@extends('admin.pages.layout')


@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Staff</h4>
                        </div>
                        <div class="card-body">
                            {{ $staffData }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Disposisi</h4>
                        </div>
                        <div class="card-body">
                            {{ $disposisiCountByUser }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Surat Tugas</h4>
                        </div>
                        <div class="card-body">
                            20
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Online Users</h4>
                        </div>
                        <div class="card-body">
                            47
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <span data-toggle="tooltip" data-placement="top"
                            title="Ini adalah data Pengajuan dan Disposisi yang kamu lakukan."
                            data-original-title="Ini adalah data Pengajuan dan Disposisi yang kamu lakukan." disabled>
                            <i class="bi bi-question-circle mr-2 text-primary"></i>
                        </span>
                        <h4>Statistik Disposisi untuk {{ Auth::user()->nama }}</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChartDisposisi" height="158"></canvas>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <span data-toggle="tooltip" data-placement="top" title="Ini adalah data surat tugas untuk Anda."
                            data-original-title="Ini adalah data surat tugas untuk Anda." disabled>
                            <i class="bi bi-question-circle mr-2 text-primary"></i>
                        </span>
                        <h4>Statistik Surat Tugas untuk {{ Auth::user()->nama }}</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChartSuratTugas" height="158"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card gradient-bottom">
                    <div class="card-header">
                        <span data-toggle="tooltip" data-placement="top"
                            title="Ini adalah data yang Didisposisikan untuk Anda."
                            data-original-title="Ini adalah data yang Didisposisikan untuk Anda." disabled>
                            <i class="bi bi-question-circle mr-2 text-primary"></i>
                        </span>
                        <h4>Disposisi</h4>
                        <div class="card-header-action dropdown">
                            <span class="badge badge-transparent-success mr-2" data-toggle="tooltip" data-placement="top"
                                title="Ini adalah total data yang Didisposisikan untuk Anda."
                                data-original-title="Ini adalah total data yang Didisposisikan untuk Anda.">
                                {{ $disposisiCountByUser }}
                            </span>
                            <a href="/disposisi" class="btn btn-info"><i class="bi bi-eye"></i> Detail</a>
                        </div>
                    </div>
                    <div class="card-body" id="top-5-scroll2">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($disposisiByUser as $dataDisposisi)
                                <li class="media">
                                    <div class="col-12" style="padding: 0">
                                        <div class="card card-primary card-surat shadow-sm">
                                            <div class="card-header d-flex justify-content-between">
                                                <div class="position-relative">
                                                    <h4>{{ $dataDisposisi->pengajuan->nomor_agenda }}</h4>
                                                </div>
                                                <div class="card-header-action btn-group">
                                                    <button class="btn btn-primary mr-1" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Status Disposisi - {{ convertDisposisiField($dataDisposisi->status_disposisi, 'status') }}"
                                                        data-original-title="Status Disposisi - {{ convertDisposisiField($dataDisposisi->status_disposisi, 'status') }}">
                                                        <span class="d-flex justify-content-center m-0">
                                                            {{ convertDisposisiField($dataDisposisi->status_disposisi, 'status') }}
                                                        </span>
                                                    </button>
                                                    <a data-collapse="#mycard-collapse{{ $dataDisposisi->id_pengajuan }}"
                                                        class="btn btn-icon btn-info" href="#"><i
                                                            class="fas fa-minus"></i></a>
                                                </div>
                                            </div>
                                            <div class="collapse show"
                                                id="mycard-collapse{{ $dataDisposisi->id_pengajuan }}">
                                                <div class="card-body card-body-surat position-relative "
                                                    style="min-height: 130px">
                                                    <p class="w-75"> {!! $dataDisposisi->catatan_disposisi !!}</p>
                                                    <p class="mt-3" style="font-size: .7rem;">
                                                        --
                                                        {{ date('d-F-Y', strtotime($dataDisposisi->tanggal_disposisi)) }}
                                                        --</p>
                                                    <a href="{{ route('disposisi.show', Crypt::encryptString($dataDisposisi->id_disposisi)) }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Detail data disposisi"
                                                        data-original-title="Detail data disposisi"
                                                        class="btn btn-info has-icon text-white" href=""><i
                                                            class="bi bi-eye"></i> Detail Data
                                                    </a>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between position-relative">
                                                    <div class="d-flex flex-row ">
                                                        @if ($dataDisposisi->user->foto_user)
                                                            <img alt="image"
                                                                src="{{ asset('image_save/' . $dataDisposisi->user->foto_user) }}"
                                                                style="max-width: 45px;max-height: 45px; border-radius: 50%;aspect-ratio: 1/1"
                                                                class="mr-2 border border-primary">
                                                        @else
                                                            <img alt="image"
                                                                src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                                                style="max-width: 45px;max-height: 45px; border-radius: 50%;aspect-ratio: 1/1"
                                                                class="mr-2">
                                                        @endif
                                                        <div>
                                                            <div class="user-detail-name">
                                                                <span class="text-primary" href="#">
                                                                    {{ $dataDisposisi->user->nama }}</span>
                                                            </div>
                                                            <small style="max-width: max-content; ">
                                                                {{ currencyPhone($dataDisposisi->user->nomor_telpon) }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="text-center " style="margin-left: 15%;">
                                                        <a type="button" class="btn btn-danger btn-scan-pdf"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Preview surat (PDF)"
                                                            data-original-title="Preview surat (PDF)"
                                                            href="{{ asset('document_save/' . $dataDisposisi->pengajuan->surat->scan_dokumen) }}"
                                                            target="_blank" title="Read PDF"><i class="bi bi-file-pdf"
                                                                style="font-size: 1.1rem;"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card gradient-bottom">
                    <div class="card-header">
                        <span data-toggle="tooltip" data-placement="top" title="Ini adalah data surat tugas untuk Anda."
                            data-original-title="Ini adalah data surat tugas untuk Anda." disabled>
                            <i class="bi bi-question-circle mr-2 text-primary"></i>
                        </span>
                        <h4>Surat Tugas</h4>
                        <div class="card-header-action dropdown">
                            <span class="badge badge-transparent-success mr-2" data-toggle="tooltip" data-placement="top"
                                title="Ini adalah total data surat tugas untuk Anda."
                                data-original-title="Ini adalah total data surat tugas untuk Anda.">
                                {{ $disposisiCountByUser }}
                            </span>
                            <a href="/surat-tugas" class="btn btn-info"><i class="bi bi-eye"></i> Detail</a>
                        </div>
                    </div>
                    <div class="card-body" id="top-5-scroll2">
                        <ul class="list-unstyled list-unstyled-border">
                            {{-- @foreach ($disposisiByUser as $dataDisposisi)
                                <li class="media">
                                    <div class="col-12" style="padding: 0">
                                        <div class="card card-primary card-surat shadow-sm">
                                            <div class="card-header d-flex justify-content-between">
                                                <div class="position-relative">
                                                    <h4>{{ $dataDisposisi->pengajuan->nomor_agenda }}</h4>
                                                </div>
                                                <div class="card-header-action btn-group">
                                                    <button class="btn btn-primary mr-1" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Status Disposisi - {{ convertDisposisiField($dataDisposisi->status_disposisi, 'status') }}"
                                                        data-original-title="Status Disposisi - {{ convertDisposisiField($dataDisposisi->status_disposisi, 'status') }}">
                                                        <span class="d-flex justify-content-center m-0">
                                                            {{ convertDisposisiField($dataDisposisi->status_disposisi, 'status') }}
                                                        </span>
                                                    </button>
                                                    <a data-collapse="#mycard-collapse{{ $dataDisposisi->id_pengajuan }}"
                                                        class="btn btn-icon btn-info" href="#"><i
                                                            class="fas fa-minus"></i></a>
                                                </div>
                                            </div>
                                            <div class="collapse show"
                                                id="mycard-collapse{{ $dataDisposisi->id_pengajuan }}">
                                                <div class="card-body card-body-surat position-relative "
                                                    style="min-height: 130px">
                                                    <p class="w-75"> {!! $dataDisposisi->catatan_disposisi !!}</p>
                                                    <p class="mt-3" style="font-size: .7rem;">
                                                        --
                                                        {{ date('d-F-Y', strtotime($dataDisposisi->tanggal_disposisi)) }}
                                                        --</p>
                                                    <a href="{{ route('disposisi.show', Crypt::encryptString($dataDisposisi->id_disposisi)) }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Detail data disposisi"
                                                        data-original-title="Detail data disposisi"
                                                        class="btn btn-info has-icon text-white" href=""><i
                                                            class="bi bi-eye"></i> Detail Data
                                                    </a>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between position-relative">
                                                    <div class="d-flex flex-row ">
                                                        @if ($dataDisposisi->user->foto_user)
                                                            <img alt="image"
                                                                src="{{ asset('image_save/' . $dataDisposisi->user->foto_user) }}"
                                                                style="max-width: 45px;max-height: 45px; border-radius: 50%;aspect-ratio: 1/1"
                                                                class="mr-2 border border-primary">
                                                        @else
                                                            <img alt="image"
                                                                src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                                                style="max-width: 45px;max-height: 45px; border-radius: 50%;aspect-ratio: 1/1"
                                                                class="mr-2">
                                                        @endif
                                                        <div>
                                                            <div class="user-detail-name">
                                                                <span class="text-primary" href="#">
                                                                    {{ $dataDisposisi->user->nama }}</span>
                                                            </div>
                                                            <small style="max-width: max-content; ">
                                                                {{ currencyPhone($dataDisposisi->user->nomor_telpon) }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="text-center " style="margin-left: 15%;">
                                                        <a type="button" class="btn btn-danger btn-scan-pdf"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Preview surat (PDF)"
                                                            data-original-title="Preview surat (PDF)"
                                                            href="{{ asset('document_save/' . $dataDisposisi->pengajuan->surat->scan_dokumen) }}"
                                                            target="_blank" title="Read PDF"><i class="bi bi-file-pdf"
                                                                style="font-size: 1.1rem;"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>

    <script>
        const ctx = document.getElementById("myChartDisposisi").getContext('2d');
        const myChartDisposisi = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($disposisiUserChart['dates']) !!},
                datasets: [{
                    label: 'Disposisi',
                    data: {!! json_encode($disposisiUserChart['disposisi_count']) !!},
                    borderWidth: 2,
                    backgroundColor: 'rgba(63,82,227,.8)',
                    borderWidth: 0,
                    borderColor: 'transparent',
                    pointBorderWidth: 0,
                    pointRadius: 3.5,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
                }]
            },
            options: {
                legend: {
                    display: true
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            // display: false,
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 10,
                            callback: function(value, index, values) {
                                return value;
                            }
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                            tickMarkLength: 15,
                        }
                    }]
                },
            }
        });
    </script>
@endsection
