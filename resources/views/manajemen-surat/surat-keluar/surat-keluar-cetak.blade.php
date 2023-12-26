<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Surat Keluar {{ $dataSuratKeluar->nomor_surat_keluar }} - {{ $dataSuratKeluar->tanggal_surat_keluar }}
    </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .letter-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .letter-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            float: right;
            margin-top: -50px;
        }

        .header-text {
            text-align: right;
            margin-top: -50px;
        }

        .header-text h3 {
            margin: 0;
            font-weight: normal;
        }

        .address {
            margin-top: 20px;
        }

        .address p {
            margin: 5px 0;
        }

        .divider {
            border-top: 2px solid #000;
            margin: 20px 0;
        }

        .letter-info {
            margin-bottom: 20px;
        }

        .letter-info p {
            margin: 5px 0;
        }

        .content {
            margin-bottom: 40px;
        }

        .closing {
            margin-top: 20px;
        }

        .signature {
            margin-top: 40px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="letter-container">
        <div class="letter-header">
            <div class="logo">
                <img src="path/to/your/logo.png" alt="Logo" width="80">
            </div>
            <div class="header-text">
                <h3>Pemerintah Provinsi Banten</h3>
                <p>Badan Pengelolaan Keuangan dan Aset Daerah</p>
                <p>Kawasan Pusat Pemerintah Provinsi Banten (KP3B)</p>
            </div>
        </div>

        <div class="address">
            <p>Alamat: [Alamat]</p>
            <p>Nomor Telpon: [Nomor Telpon]</p>
        </div>

        <div class="divider"></div>

        <div class="letter-info">
            <p>Nomor Surat: [Nomor Surat]</p>
            <p>Sifat: [Sifat]</p>
            <p>Lampiran: [Lampiran]</p>
            <p>Perihal: [Perihal]</p>
        </div>

        <div class="letter-info" style="text-align: right;">
            <p>Tanggal: [Tanggal Surat]</p>
            <p>Tujuan: [Tujuan Surat]</p>
        </div>

        <div class="content">
            <p>
                Kepada Yth.,<br>
                [Nama Penerima]<br>
                [Jabatan Penerima]<br>
                [Alamat Penerima]
            </p>

            <p>
                Dengan hormat,
            </p>

            <p>
                [Isi Surat Dinas]
            </p>
        </div>

        <div class="closing">
            <p>
                Hormat kami,
            </p>
        </div>

        <div class="signature">
            <p>
                [Nama Pengirim]<br>
                [Jabatan Pengirim]
            </p>
        </div>
    </div>
</body>

</html>
