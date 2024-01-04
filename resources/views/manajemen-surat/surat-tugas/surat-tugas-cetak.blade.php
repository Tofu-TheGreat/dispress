<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Surat Tugas {{ $dataSuratTugas->nomor_surat_tugas }} - {{ $dataSuratTugas->tanggal_surat_tugas }}
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
            width: 95px;
            padding-top: 17px;
            padding-bottom: 10px;
            padding-right: 5px;
            padding-left: 30px;
            float: left;
        }

        .logo {
            aspect-ratio: 1/1;
            min-width: 150px;
            max-width: 150px;
        }

        .keterangan-instansi {
            width: 470px;
            padding-bottom: 5px;
            padding-left: 10px;
            float: right;
            text-align: center;
            line-height: .1;
        }


        .keterangan-instansi .header {
            margin-bottom: 7px !important;
            margin-top: ;
        }

        .keterangan-instansi .header p {
            font-size: 1.1rem;
            line-height: 11px;
            margin-bottom: 4px;
            margin-top: 0;
            font-weight: normal;
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

        .tanggal-surat-tugas {
            float: right;
            width: 190px;
            font-size: .9rem;
        }

        .keterangan-instansi {
            width: 480px;
            float: left;
        }

        .keterangan-surat {
            text-align: center;
        }

        .keterangan-surat h2 {
            text-decoration: underline solid black 2px;
            margin-bottom: 1px;
        }

        .keterangan-surat p {
            display: inline-block;
            margin-top: -20%;
            padding-top: 0;
            font-size: .9rem;
        }

        .left-side {
            width: 100px;
            float: left;
        }

        .right-side {
            width: 530px;
            float: right;
        }

        .dasar p {
            text-align: justify;
        }

        .pembatas h2 {
            text-decoration: underline solid black 2px;
            margin-bottom: 0;
        }

        .ttd {
            float: right;
            width: 250px;
            margin-top: -10px;
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
                            {!! $dataWeb->header_surat !!}</h2>
                    @endif
                    <h2 style="text-transform: uppercase;" class="nama_instansi">
                        {{ $dataWeb->instansi->nama_instansi }}
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
            {{-- <div class="tanggal-surat-tugas">
                {{ Carbon\Carbon::parse($dataSuratTugas->tanggal_surat_tugas)->isoFormat('dddd, D MMMM Y') }}
            </div> --}}
            <div class="keterangan-surat">
                <h2>SURAT PERINTAH TUGAS</h2>
                <p>Nomor : {!! $dataSuratTugas->nomor_surat_tugas !!}</p>
            </div>

            <div class="left-side">
                <p>
                    Dasar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                </p>
            </div>

            <div class="right-side">
                <div class="dasar">
                    <p>
                        {!! $dataSuratTugas->dasar !!}
                    </p>
                </div>
            </div>

            <div class="pembatas">
                <p style="color: white">======================</p>
            </div>

            <div>
                <h3 style="text-align: center; margin-top:-30px; margin-bottom: 5px;">MEMERINTAHKAN</h3>
            </div>

            <div class="left-side">
                <p>
                    Kepada &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                </p>
            </div>

            <div class="right-side">
                <div class="dasar" style="line-height: .2; margin-top: 6px">
                    @foreach ($userGet as $data)
                        <div class="penerima-surat-tugas" style="margin-top: 3px">
                            <p>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                {!! $data->nama !!}</p>
                            <p>NIP
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                :
                                {!! $data->nip !!}</p>
                            @if ($data->pangkat == null && $data->golongan == null)
                                <p>-</p>
                            @else
                                <p>Pangkat,Gol &nbsp;&nbsp;&nbsp;: {{ $data->pangkat }},
                                    {{ $data->golongan }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="pembatas" style="width: 100%; margin-top: 10px">
                <p style="color: white">======================</p>
            </div>

            <div class="left-side" style="margin-top: -60px;">
                <p>
                    Untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                </p>
            </div>

            <div class="right-side" style="margin-top:16px;">
                <div class="dasar">
                    <span style="font-size: .9rem;">{!! $dataSuratTugas->tujuan_pelaksanaan !!}, yang akan dilaksanakan
                        pada:</span>
                    <div style="line-height: .2;margin-top: 6px">
                        @if ($dataSuratTugas->tanggal_mulai == $dataSuratTugas->tanggal_selesai)
                            <p>Hari/Tanggal &nbsp; :
                                {!! $dataSuratTugas->tanggal_mulai !!}</p>
                        @else
                            <p>Hari/Tanggal &nbsp; :
                                {!! $dataSuratTugas->tanggal_mulai !!} s.d {!! $dataSuratTugas->tanggal_selesai !!}</p>
                        @endif
                        <p>Waktu
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                            {!! $dataSuratTugas->waktu_mulai !!} s.d {!! $dataSuratTugas->waktu_selesai !!}</p>
                        <p style="line-height: 1.1;">Tempat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                            {!! $dataSuratTugas->tempat_pelaksanaan !!}</p>
                    </div>
                </div>
            </div>

            <div class="pembatas" style="width: 100%; margin-top: -40px">
                <p style="color: white">======================</p>
            </div>

            <p>
                Demikian untuk dapat dilaksanakan sebagai mestinya dan membuat laporan.
            </p>

            <div class="ttd">
                <div class="ttd-disposisi">
                    <div class="tanggal-tdd">
                        <p class="small">{{ $dataWeb->kota_user }}, <span>...........................</span>
                            <br>
                            Plt. Kepala {{ $dataWeb->instansi->nama_instansi }}
                        </p>
                        <br>
                        <br>
                        <p class="small" style="margin-bottom: 0">
                            <span class="text-bold" style="text-decoration: underline; text-transform: uppercase;">
                                {{ $dataWeb->ketua->nama }}
                            </span>
                            <br>
                        </p>
                        <p style="margin-top: 0;font-size: .7rem">
                            {{ $dataSuratTugas->pengirim->pangkat }},{{ $dataSuratTugas->pengirim->golongan }}
                            <br>
                            NIP. {{ convertToNIP($dataWeb->ketua->nip) }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="pembatas" style="width: 100%; margin-top: -70px">
                <p style="color: white">======================</p>
            </div>

            <div class="tembusan" style="line-height: .2">
                <p>Tembusan disampaikan kepada Yth:</p>
                <p>{!! $dataSuratTugas->tembusan !!}</p>
            </div>
        </div>
    </div>
</body>

</html>
