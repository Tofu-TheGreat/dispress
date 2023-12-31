<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Surat Keluar {{ $dataSuratKeluar->nomor_surat_keluar }} - {{ $dataSuratKeluar->tanggal_surat_keluar }}
    </title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter&display=swap");

        body {
            font-family: serif;
            /* font-family: "Inter", sans-serif; */
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
            padding: 15px 25px;
        }

        .keterangan-wrapper {
            border-bottom: 3px solid black;
            margin-bottom: 1.3px;
        }

        .logo-wrapper {
            width: 110px;
            padding-top: 20px;
            padding-bottom: 10px;
            padding-right: 5px;
            padding-left: 20px;
            float: left;
        }

        .logo {
            aspect-ratio: 1/1;
            min-width: 150px;
            max-width: 150px;
        }

        .keterangan-instansi {
            width: 470px;
            padding-top: 35px;
            padding-bottom: 5px;
            padding-left: 10px;
            float: right;
            text-align: center;
            line-height: .9;
            margin-top: 15px
        }


        .keterangan-instansi .header {
            margin-bottom: 7px !important;
            margin-top: 0;
            font-size: 1.2rem;
        }

        .keterangan-instansi .nama_instansi {
            margin-bottom: 7px !important;
            margin-top: 0;
            font-size: 1.4rem;
        }

        .isi-surat-wrappper {
            width: 100%;
            padding: 15px;
            border-top: 2px solid black;
        }

        .tanggal-surat-keluar {
            float: right;
            width: 190px;
            font-size: .9rem;
        }

        .keterangan-instansi {
            width: 480px;
            float: left;
        }

        .keterangan-surat p {
            display: inline-block;
            margin-top: 5px;
            margin-bottom: 0;
            font-size: .9rem;
        }

        .tujuan-surat {
            margin-top: 25px;
        }

        .tujuan-surat p {
            margin-top: 4px;
            margin-bottom: 0;
        }

        .tujuan-surat .kepada {
            font-size: .9rem;
        }

        .isi-surat {
            margin-top: 10px;
        }

        .ttd {
            margin-top: 35px;
        }

        .small {
            line-height: 1.1;
            font-size: .7rem !important;
        }

        .ttd-disposisi {
            width: 250px;
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
    <div class="container">
        <div class="d-flex justify-content-evenly">
            <div class="keterangan-wrapper">
                <div class="logo-wrapper">
                    @if ($dataWeb->default_logo)
                        <img src="{{ public_path('image_save/' . $dataWeb->default_logo) }}" alt="logo"
                            width="100px" class="logo">
                    @else
                        <p style="color:red;">Harap isi logo instansi di halaman web setting!</p>
                    @endif
                </div>
                <div class="keterangan-instansi">
                    @if ($dataWeb->header_surat != null)
                        <h2 style="text-transform: uppercase;" class="header">
                            {{ $dataWeb->header_surat }}</h2>
                    @endif
                    <h2 style="text-transform: uppercase" class="nama_instansi"> {{ $dataWeb->instansi->nama_instansi }}
                    </h2>
                    <div class="small">
                        <span style="display: block;">{!! $dataWeb->instansi->alamat_instansi !!}</span>
                        <span>Telepon : {{ $dataWeb->instansi->nomor_telpon }}</span>
                        <span>Email : {{ $dataWeb->instansi->email }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="isi-surat-wrappper">
            <div class="tanggal-surat-keluar">
                {{ Carbon\Carbon::parse($dataSuratKeluar->tanggal_surat_keluar)->isoFormat('dddd, D MMMM Y') }}
            </div>
            <div class="keterangan-surat">
                <p>Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {!! formatCetak($dataSuratKeluar->nomor_surat_keluar) !!}</p>
                <p>Sifat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                    {!! formatCetak($dataSuratKeluar->sifat_surat_keluar) !!}</p>
                <p>Lampiran &nbsp;&nbsp;&nbsp;&nbsp;: {{ $dataSuratKeluar->jumlah_lampiran }} Lembar</p>
                <p>Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {!! formatCetak($dataSuratKeluar->perihal) !!}</p>
            </div>
            <div class="tujuan-surat">
                <p>Kepada Yth. </p>
                <p class="kepada">{!! $dataSuratKeluar->tujuan_surat_keluar !!}</p>
            </div>
            <div class="isi-surat">
                <p>
                    {!! $dataSuratKeluar->isi_surat !!}.
                </p>
            </div>
            <div class="ttd">
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
