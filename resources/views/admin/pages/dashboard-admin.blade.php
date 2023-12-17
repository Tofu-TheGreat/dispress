@extends('admin.pages.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
@endsection

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
            <div class="col-lg-4 col-md-4 col-sm-12 position-relative">
                <div style="position: absolute; top: 2px; left: 20px;z-index: 9;">
                    <span data-toggle="tooltip" data-placement="top" title="Ini adalah Semua data Pengajuan Disposisi."
                        data-original-title="Ini adalah Semua data Pengajuan Disposisi.">
                        <i class="bi bi-question-circle mr-2 text-dark"></i>
                    </span>
                </div>
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
            <div class="col-lg-4 col-md-4 col-sm-12 position-relative">
                <div style="position: absolute; top: 2px; left: 20px;z-index: 9;">
                    <span data-toggle="tooltip" data-placement="top" title="Ini adalah Semua data Disposisi."
                        data-original-title="Ini adalah Semua data Disposisi.">
                        <i class="bi bi-question-circle mr-2 text-dark"></i>
                    </span>
                </div>
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="disposisi-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary ">
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
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <span data-toggle="tooltip" data-placement="top"
                            title="Ini adalah data Pengajuan dan Disposisi yang Anda lakukan."
                            data-original-title="Ini adalah data Pengajuan dan Disposisi yang Anda lakukan." disabled>
                            <i class="bi bi-question-circle mr-2 text-primary"></i>
                        </span>
                        <h4>Pengajuan dan Disposisi oleh {{ auth()->user()->nama }}</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="158"></canvas>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary position-relative">
                                <div style="position: absolute; top: -33px; left: 5px">
                                    <span data-toggle="tooltip" data-placement="top" title="Ini adalah semua data Intansi."
                                        data-original-title="Ini adalah semua data Intansi.">
                                        <i class="bi bi-question-circle mr-2 text-white"></i>
                                    </span>
                                </div>
                                <i class="far fa-building"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Instansi</h4>
                                </div>
                                <div class="card-body">
                                    {{ $instansiData }} Data
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger position-relative">
                                <div style="position: absolute; top: -33px; left: 5px">
                                    <span data-toggle="tooltip" data-placement="top"
                                        title="Ini adalah semua data Posisi Jabatan."
                                        data-original-title="Ini adalah semua data Posisi Jabatan.">
                                        <i class="bi bi-question-circle mr-2 text-white"></i>
                                    </span>
                                </div>
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Jabatan</h4>
                                </div>
                                <div class="card-body">
                                    {{ $jabatanData }} Data
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning position-relative">
                                <div style="position: absolute; top: -33px; left: 5px">
                                    <span data-toggle="tooltip" data-placement="top"
                                        title="Ini adalah semua data Surat Keluar."
                                        data-original-title="Ini adalah semua data Surat Keluar.">
                                        <i class="bi bi-question-circle mr-2 text-white"></i>
                                    </span>
                                </div>
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Surat Keluar</h4>
                                </div>
                                <div class="card-body">
                                    20 Data
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <span data-toggle="tooltip" data-placement="top"
                            title="Ini adalah data Surat Keluar untuk {{ auth()->user()->nama }}."
                            data-original-title="Ini adalah data Surat Keluar untuk {{ auth()->user()->nama }}." disabled>
                            <i class="bi bi-question-circle mr-2 text-primary"></i>
                        </span>
                        <h4>Statistik surat keluar untuk {{ auth()->user()->nama }}</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart2" height="158"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-statistic-1 position-relative">
                    <div style="position: absolute; top: 5px; right: 5px">
                        <a href="/disposisi" data-toggle="tooltip" data-placement="top"
                            title="Menuju detail disposisi untuk anda."
                            data-original-title="Menuju detail disposisi untuk anda.">
                            <i class="bi bi-arrow-right-circle-fill mr-2 text-primary" style="font-size: 1rem;"></i>
                        </a>
                    </div>
                    <div class="card-icon bg-primary position-relative">
                        <div style="position: absolute; top: -33px; left: 5px">
                            <span data-toggle="tooltip" data-placement="top"
                                title="Ini adalah data yang Didisposisikan untuk Anda."
                                data-original-title="Ini adalah data yang Didisposisikan untuk Anda.">
                                <i class="bi bi-question-circle mr-2 text-white"></i>
                            </span>
                        </div>
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Disposisi untuk {{ auth()->user()->nama }}</h4>
                        </div>
                        <div class="card-body">
                            {{ $disposisiCountByUser }} Data
                        </div>
                    </div>
                </div>
                <div class="card gradient-bottom">
                    <div class="card-header">
                        <span data-toggle="tooltip" data-placement="top" title="Ini adalah semua data Disposisi terbaru"
                            data-original-title="Ini adalah semua data Disposisi terbaru" disabled>
                            <i class="bi bi-question-circle mr-2 text-primary"></i>
                        </span>
                        <h4>Disposisi Terbaru</h4>
                        <div class="card-header-action dropdown">
                            <a href="/disposisi" class="btn btn-info"><i class="bi bi-eye"></i> Detail</a>
                        </div>
                    </div>
                    <div class="card-body" id="top-5-scroll2">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($newestDisposisi as $dataDisposisi)
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
                                                    <div
                                                        class="d-flex flex-column btn-group-action btn-group-action-dashboard">
                                                        <a href="{{ route('disposisi.show', Crypt::encryptString($dataDisposisi->id_disposisi)) }}"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Detail data disposisi"
                                                            data-original-title="Detail data disposisi"
                                                            class="btn btn-info has-icon text-white tombol-detail-card"
                                                            href=""><i class="pl-1 bi bi-eye"></i>
                                                        </a>
                                                        <a type="button" data-toggle="tooltip" data-placement="left"
                                                            title="Edit data disposisi"
                                                            data-original-title="Edit data disposisi"
                                                            class="btn btn-warning has-icon text-white tombol-edit-card"
                                                            href="{{ route('disposisi.edit', Crypt::encryptString($dataDisposisi->id_disposisi)) }}"><i
                                                                class="pl-1  bi bi-pencil-square "></i>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('disposisi.destroy', Crypt::encryptString($dataDisposisi->id_disposisi)) }}"
                                                            class="tombol-hapus-disposisi">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" data-toggle="tooltip"
                                                                data-placement="bottom" title="Hapus data "
                                                                data-original-title="Hapus data "
                                                                class="btn btn-danger has-icon text-white tombol-hapus-card tombol-hapus-disposisi"
                                                                href=""><i
                                                                    class="pl-1  bi bi-trash tombol-hapus-disposisi"></i>
                                                            </button>
                                                        </form>
                                                    </div>
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
                        <span data-toggle="tooltip" data-placement="top" title="Ini adalah semua data Pengajuan terbaru"
                            data-original-title="Ini adalah semua data Pengajuan terbaru" disabled>
                            <i class="bi bi-question-circle mr-2 text-primary"></i>
                        </span>
                        <h4>Pengajuan Terbaru</h4>
                        <div class="card-header-action dropdown">
                            <a href="/pengajuan-disposisi" class="btn btn-info"><i class="bi bi-eye"></i> Detail</a>
                        </div>
                    </div>
                    <div class="card-body" id="top-5-scroll">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($newestPengajuan as $dataPengajuan)
                                <li class="media">
                                    <div class="col-12" style="padding: 0">
                                        <div class="card card-primary card-surat shadow-sm">
                                            <div class="card-header d-flex justify-content-between">
                                                <div class="position-relative">
                                                    <h4>{{ $dataPengajuan->surat->nomor_surat }}</h4>
                                                </div>
                                                <div class="card-header-action btn-group">
                                                    @if ($dataPengajuan->status_pengajuan == '0')
                                                        <button class="btn btn-danger tombol-disposisi mr-2"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Belum Didisposisikan"
                                                            data-original-title="Belum Didisposisikan" disabled>
                                                            <span class="d-flex justify-content-center m-0"><i
                                                                    class="bi bi bi-patch-minus"></i></span>
                                                        </button>
                                                    @elseif ($dataPengajuan->status_pengajuan == '1')
                                                        <button class="btn btn-success tombol-disposisi mr-2"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Sudah Didisposisikan"
                                                            data-original-title="Sudah Didisposisikan" disabled>
                                                            <span class="d-flex justify-content-center m-0"><i
                                                                    class="bi bi bi-patch-check"></i></span>
                                                        </button>
                                                    @endif
                                                    <a data-collapse="#mycard-collapse{{ $dataPengajuan->id_pengajuan }}"
                                                        class="btn btn-icon btn-info" href="#"><i
                                                            class="fas fa-minus"></i></a>
                                                </div>
                                            </div>
                                            <div class="collapse show"
                                                id="mycard-collapse{{ $dataPengajuan->id_pengajuan }}">
                                                <div class="card-body card-body-surat position-relative "
                                                    style="min-height: 130px">
                                                    <p class="w-75"> {!! $dataPengajuan->catatan_pengajuan !!}</p>
                                                    <p class="mt-3" style="font-size: .7rem;">
                                                        --
                                                        {{ date('d-F-Y', strtotime($dataPengajuan->tanggal_terima)) }}
                                                        --</p>
                                                    @if ($dataPengajuan->status_pengajuan == '0')
                                                        <div class="mt-1 mb-1 tombol-disposisi">
                                                            <span class="tombol-disposisi" data-toggle="tooltip"
                                                                data-placement="right" title="klik Untuk Mendisposisikan"
                                                                data-original-title="klik Untuk Mendisposisikan" disabled>
                                                                <button type="button"
                                                                    class="btn btn-success mr-2 tombol-disposisi"
                                                                    data-toggle="modal"
                                                                    data-target="#disposisi-modal{{ $dataPengajuan->id_pengajuan }}"
                                                                    type="button">
                                                                    Disposisi
                                                                </button>
                                                            </span>
                                                        </div>
                                                    @endif
                                                    <div
                                                        class="d-flex flex-column btn-group-action btn-group-action-dashboard">
                                                        <a href="{{ route('pengajuan-disposisi.show', Crypt::encryptString($dataPengajuan->id_pengajuan)) }}"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Detail data pengajuan disposisi"
                                                            data-original-title="Detail data pengajuan disposisi"
                                                            class="btn btn-info has-icon text-white tombol-detail-card"
                                                            href=""><i class="pl-1 bi bi-eye"></i>
                                                        </a>
                                                        <a type="button" data-toggle="tooltip" data-placement="left"
                                                            title="Edit data disposisi"
                                                            data-original-title="Edit data disposisi"
                                                            class="btn btn-warning has-icon text-white tombol-edit-card"
                                                            href="{{ route('pengajuan-disposisi.edit', Crypt::encryptString($dataPengajuan->id_pengajuan)) }}"><i
                                                                class="pl-1  bi bi-pencil-square "></i>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('pengajuan-disposisi.destroy', Crypt::encryptString($dataPengajuan->id_pengajuan)) }}"
                                                            class="tombol-hapus-pengajuan">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" data-toggle="tooltip"
                                                                data-placement="bottom" title="Hapus data Pengajuan"
                                                                data-original-title="Hapus data Pengajuan"
                                                                class="btn btn-danger has-icon text-white tombol-hapus-card tombol-hapus-pengajuan"
                                                                href=""><i
                                                                    class="pl-1  bi bi-trash tombol-hapus-pengajuan"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex justify-content-between position-relative">
                                                    <div class="d-flex flex-row ">
                                                        @if ($dataPengajuan->user->foto_user)
                                                            <img alt="image"
                                                                src="{{ asset('image_save/' . $dataPengajuan->user->foto_user) }}"
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
                                                                    {{ $dataPengajuan->user->nama }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center " style="margin-left: 15%;">
                                                        <a type="button" class="btn btn-danger btn-scan-pdf"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Preview surat (PDF)"
                                                            data-original-title="Preview surat (PDF)"
                                                            href="{{ asset('document_save/' . $dataPengajuan->surat->scan_dokumen) }}"
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
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>

    {{-- Toast --}}
    @if (Session::has('success'))
        <script>
            $(document).ready(function() {
                iziToast.success({
                    title: 'Success',
                    message: "{{ Session::get('success') }}",
                    position: 'topRight'
                })
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            $(document).ready(function() {
                iziToast.error({
                    title: 'Error',
                    message: "{{ Session::get('error') }} Import",
                    position: 'topRight'
                })
            });
        </script>
    @endif

    {{-- Handle delete button --}}
    <script>
        document.body.addEventListener("click", function(event) {
            const element = event.target;

            if (element.classList.contains("tombol-hapus-disposisi")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin menghapus data Disposisi ini!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal('Data Disposisi berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data Disposisi tidak jadi dihapus!');
                        }
                    });
            }

            if (element.classList.contains("tombol-hapus-pengajuan")) {
                swal({
                        title: 'Apakah anda yakin?',
                        text: 'Ingin menghapus data Pengajuan ini!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal('Data Pengajuan berhasil dihapus!', {
                                icon: 'success',
                            });
                            element.closest('form').submit();
                        } else {
                            swal('Data Pengajuan tidak jadi dihapus!');
                        }
                    });
            }
        });
    </script>

    {{-- Chart Disposisi --}}
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

    {{-- Chart Pengajuan --}}
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

    {{-- Chart data pengajuan dan disposisi yang di lakukan oleh admin ini --}}
    <script>
        const ctx = document.getElementById("myChart").getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($pengajuanDisposisiChartData['dates']) !!},
                datasets: [{
                        label: 'Pengajuan',
                        data: {!! json_encode($pengajuanDisposisiChartData['pengajuan_count']) !!},
                        borderWidth: 2,
                        backgroundColor: 'rgba(63,82,227,.8)',
                        borderWidth: 0,
                        borderColor: 'transparent',
                        pointBorderWidth: 0,
                        pointRadius: 3.5,
                        pointBackgroundColor: 'transparent',
                        pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
                    },
                    {
                        label: 'Disposisi',
                        data: {!! json_encode($pengajuanDisposisiChartData['disposisi_count']) !!},
                        borderWidth: 2,
                        backgroundColor: 'rgba(254,86,83,.7)',
                        borderWidth: 0,
                        borderColor: 'transparent',
                        pointBorderWidth: 0,
                        pointRadius: 3.5,
                        pointBackgroundColor: 'transparent',
                        pointHoverBackgroundColor: 'rgba(254,86,83,.8)',
                    }
                ]
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
                        // ticks: {
                        //     beginAtZero: true,
                        //     stepSize: 50,
                        //     callback: function(value, index, values) {
                        //         return value;
                        //     }
                        // }
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

    {{-- Chart data Surat Keluar untuk User --}}
    <script>
        const myChartSurat = document.getElementById("myChart2").getContext('2d');
        const myChart2 = new Chart(myChartSurat, {
            type: 'line',
            data: {
                labels: {!! json_encode($pengajuanDisposisiChartData['dates']) !!},
                datasets: [{
                    label: 'Surat Keluar',
                    data: {!! json_encode($pengajuanDisposisiChartData['pengajuan_count']) !!},
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
                        // ticks: {
                        //     beginAtZero: true,
                        //     stepSize: 50,
                        //     callback: function(value, index, values) {
                        //         return value;
                        //     }
                        // }
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
