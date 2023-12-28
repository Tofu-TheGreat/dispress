<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Disposisi {{ $dataDisposisi->pengajuan->nomor_agenda }} - {{ $dataDisposisi->tanggal_disposisi }}</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter&display=swap");

        body {
            font-family: "Inter", sans-serif;
            font-size: 14px;
            line-height: 1.5;
        }

        p {
            font-size: .9rem;

        }

        .text-bold {
            font-weight: bold;
        }

        .border-bottom-dotted {
            border-bottom: 1px dotted black;
        }

        .title-disposisi {
            text-decoration: underline;
            text-underline-offset: 1em;
            margin-bottom: 45px;
        }

        .container {
            border: 2px solid black;
        }

        .surat {
            width: 315px;
            padding: 10px 20px;
            float: left;
            border-right: 2px solid black;
        }

        .pengajuan {
            width: 315px;
            padding: 10px 20px;
            float: right;
        }

        .disposisi {
            width: 100%;
            padding: 20px;
            border-top: 2px solid black;
        }

        .sifat-status {
            width: 290px;
            padding: 5px 15px;
            float: left;
        }

        .sifat-disposisi {
            width: 120px;
            float: right;
            text-align: center
        }

        .status-disposisi {
            width: 140px;
            float: left;
            padding-right: 20px;
            text-align: center
        }

        .diteruskan {
            width: 300px;
            padding: 5px 15px;
            float: right;
        }

        .catatan-disposisi {
            margin-top: 20px;
            width: 100%;
            padding: 5px 15px;

        }

        .ttd {
            margin-top: 30px;
        }

        .catatan {
            width: 290px;
            padding: 5px 15px;
            line-height: 0.7;
            float: left;
            padding-top: 65px;
        }

        .catatan .small {
            line-height: 1.1;
            font-size: .7rem !important;
        }

        .ttd-disposisi {
            width: 290px;
            float: right;
        }

        .ttd-disposisi .tanggal-tdd {
            line-height: 1.1;
        }

        .ttd-disposisi .tanggal-tdd p {
            font-size: .8rem !important;
        }
    </style>
</head>

<body>
    <h2 class="title-disposisi">Diposisi Surat</h2>
    <div class="container">
        <div class="d-flex justify-content-evenly">
            <div class="surat-pengajuan">
                <div class="surat">
                    <p>No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {!! formatCetak($dataDisposisi->pengajuan->surat->nomor_surat) !!}</p>
                    <p>Dari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        {!! formatCetak($dataDisposisi->pengajuan->surat->instansi->nama_instansi) !!}</p>
                    <p>Tanggal &nbsp;&nbsp;:
                        {!! formatCetak(date('d-F-Y', strtotime($dataDisposisi->pengajuan->surat->tanggal_surat))) !!}</p>
                    <p>Perihal &nbsp;&nbsp;&nbsp;&nbsp;: {!! formatCetak($dataDisposisi->pengajuan->surat->isi_surat) !!}</p>
                </div>
                <div class="pengajuan">
                    <p>No. Agenda&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        {!! formatCetak($dataDisposisi->pengajuan->nomor_agenda) !!}
                    </p>
                    <p>Tanggal Terima&nbsp;&nbsp;&nbsp;&nbsp;:
                        {!! formatCetak(date('d-F-Y', strtotime($dataDisposisi->pengajuan->tanggal_terima))) !!}
                    </p>
                    <p>Kepada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        @if ($dataDisposisi->id_penerima != null)
                            {!! formatCetak($dataDisposisi->penerima->posisiJabatan->nama_posisi_jabatan) !!}
                        @else
                            {!! formatCetak($dataDisposisi->posisiJabatan->nama_posisi_jabatan) !!}
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="disposisi">
            <div class="sifat-status">
                <div class="status-disposisi">
                    <p class="text-bold">Status Disposisi</p>
                    <p style="text-align: center">
                        ({{ convertDisposisiField($dataDisposisi->status_disposisi, 'status') }})
                    </p>
                </div>
                <div class="sifat-disposisi">
                    <p class="text-bold">Sifat Disposisi</p>
                    <p style="text-align: center">
                        ({{ convertDisposisiField($dataDisposisi->sifat_disposisi, 'sifat') }})
                    </p>
                </div>
            </div>
            <div class="diteruskan">
                <p class="text-bold">Diteruskan Kepada : </p>
                @if ($dataDisposisi->posisiJabatan != null)
                    <?php
                    $no = 1;
                    $uniquePosisi = $disposisiByRow->unique('posisiJabatan.nama_posisi_jabatan');
                    ?>
                    @foreach ($uniquePosisi as $data)
                        <p class="border-bottom-dotted">{{ $no++ }}.
                            {{ $data->posisiJabatan->nama_posisi_jabatan }}
                        </p>
                    @endforeach
                @elseif ($dataDisposisi->id_penerima != null)
                    <?php
                    $no = 1;
                    ?>
                    @foreach ($disposisiByRow as $data)
                        <p class="border-bottom-dotted">{{ $no++ }}.
                            {{ $data->penerima->nama }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="catatan-disposisi">
                <p class="text-bold">Pesan/Catatan Disposisi</p>
                <p class="border-bottom-dotted">{{ $dataDisposisi->catatan_disposisi }}</p>
            </div>
            <div class="ttd">
                <div class="catatan">
                    <p>Catatan: </p>
                    <p class="small">
                        Setelah dipelajari segera dikembalikan<br>
                        ke Bagian Persuratan<br>
                    </p>
                </div>
                <div class="ttd-disposisi">
                    <div class="tanggal-tdd">
                        <p class="small">Tangerang, <span>...........................</span>
                            <br>
                            Plt. Kepala {{ $dataWeb->instansi->nama_instansi }}
                        </p>
                        <br>
                        <br>
                        <br>
                        <p class="small">
                            <span class="text-bold" style="text-decoration: underline; text-transform: uppercase;">
                                {{ $dataWeb->ketua->nama }}
                            </span>
                            <br>
                            NIP. {{ convertToNIP($dataWeb->ketua->nip) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
