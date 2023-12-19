<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Disposisi {{ $dataDisposisi->pengajuan->nomor_agenda }} - {{ $dataDisposisi->tanggal_disposisi }}</title>

    <style>
        .container {
            display: grid;
            grid-template-areas:
                "surat pengajuan"
                "disposisi disposisi";
        }

        .surat {
            grid-area: surat;
        }

        .pengajuan {
            grid-area: pengajuan;
        }

        .disposisi {
            grid-area: disposisi;
        }
    </style>
</head>

<body>
    <div class="container">
        <section class="surat">
            <input type="text" value="{{ $dataDisposisi->pengajuan->surat->nomor_surat }}" id="nomor_agenda">
        </section>
        <section class="pengajuan">
            <input type="text" value="{{ $dataDisposisi->pengajuan->nomor_agenda }}" id="nomor_agenda">
        </section>
        <section class="disposisi">
            <input type="text" value="{{ $dataDisposisi->pengajuan->nomor_agenda }}" id="nomor_agenda">
        </section>
    </div>


    <div style="page-break-after: always"></div>

    <embed src="{{ public_path('document_save/' . $dataDisposisi->pengajuan->surat->scan_dokumen) }}" width="500"
        height="375" type="application/pdf">

</body>

<script>
    window.print();
</script>

</html>
