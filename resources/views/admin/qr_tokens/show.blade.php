<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>QR Code Absensi - Admin</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>
        body {
            background: #f6f7fb;
            font-family: Arial, sans-serif;
            color: #2f2b3d;
        }

        .main-content {
            min-height: 100vh;
            padding: 40px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h3 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .page-header p {
            color: #858090;
            margin: 0;
        }

        .btn-back {
            background: white;
            color: #5d586b;
            border: 1px solid #e5e2eb;
            border-radius: 10px;
            padding: 10px 18px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-back:hover {
            background: #f0eef8;
            color: #5d4fb3;
        }

        .qr-card {
            max-width: 560px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 8px 30px rgba(40, 35, 70, 0.08);
        }

        .location-icon {
            width: 55px;
            height: 55px;
            border-radius: 15px;
            background: #eeeafd;
            color: #6858c5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            margin: 0 auto 15px;
        }

        .location-name {
            font-size: 21px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 5px;
        }

        .location-subtitle {
            text-align: center;
            color: #8b8795;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .qr-wrapper {
            width: 320px;
            height: 320px;
            background: white;
            border: 1px solid #eeeaf5;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            box-shadow: 0 5px 20px rgba(40, 35, 70, 0.06);
        }

        #qrcode img {
            display: block;
            width: 260px;
            height: 260px;
        }

        .info-box {
            background: #f8f7fc;
            border-radius: 14px;
            padding: 18px;
            margin-top: 10px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 10px 0;
            border-bottom: 1px solid #e8e5ef;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #888392;
            font-size: 13px;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;
            text-align: right;
            color: #3d3849;
        }

        .token-value {
            max-width: 280px;
            word-break: break-all;
        }

        .badge-active {
            background: #e7f7ed;
            color: #249153;
            padding: 5px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .badge-inactive {
            background: #eeeeef;
            color: #77727f;
            padding: 5px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .btn-print {
            width: 100%;
            border: none;
            background: #6858c5;
            color: white;
            border-radius: 11px;
            padding: 12px;
            margin-top: 20px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-print:hover {
            background: #5748ae;
        }

        @media (max-width: 768px) {

            .main-content {
                padding: 20px;
            }

            .page-header {
                align-items: flex-start;
                gap: 15px;
            }

            .page-header h3 {
                font-size: 21px;
            }

            .qr-card {
                padding: 25px 18px;
            }

            .qr-wrapper {
                width: 290px;
                height: 290px;
            }

            #qrcode img {
                width: 240px;
                height: 240px;
            }

            .info-item {
                flex-direction: column;
                gap: 4px;
            }

            .info-value {
                text-align: left;
            }
        }

        @media print {

            body {
                background: white;
            }

            .page-header,
            .btn-print {
                display: none !important;
            }

            .main-content {
                padding: 0;
            }

            .qr-card {
                box-shadow: none;
                max-width: 100%;
            }

            .info-box {
                border: 1px solid #ddd;
            }
        }
    </style>
</head>

<body>

<div class="main-content">

    <!-- HEADER -->
    <div class="page-header">

        <div>
            <h3>
                <i class="bi bi-qr-code me-2"></i>
                QR Code Absensi
            </h3>

            <p>
                Gunakan QR Code ini untuk absensi siswa.
            </p>
        </div>

        <a
            href="{{ route('admin.qr-tokens.index') }}"
            class="btn-back"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

    </div>


    <!-- QR CARD -->
    <div class="qr-card">

        <div class="location-icon">
            <i class="bi bi-geo-alt-fill"></i>
        </div>

        <div class="location-name">
            {{ $qrToken->qrLocation->nama_lokasi }}
        </div>

        <div class="location-subtitle">
            QR Token Absensi
        </div>


        <!-- QR CODE -->
        <div class="qr-wrapper">

            <div id="qrcode"></div>

        </div>


        <!-- INFO -->
        <div class="info-box">

            <div class="info-item">

                <div class="info-label">
                    Token
                </div>

                <div class="info-value token-value">
                    {{ $qrToken->token }}
                </div>

            </div>


            <div class="info-item">

                <div class="info-label">
                    Tanggal
                </div>

                <div class="info-value">
                    {{ \Carbon\Carbon::parse($qrToken->tanggal)->format('d-m-Y') }}
                </div>

            </div>


            <div class="info-item">

                <div class="info-label">
                    Waktu
                </div>

                <div class="info-value">
                    {{ $qrToken->waktu_mulai }}
                    -
                    {{ $qrToken->waktu_berakhir }}
                </div>

            </div>


            <div class="info-item">

                <div class="info-label">
                    Status
                </div>

                <div class="info-value">

                    @if($qrToken->status === 'Aktif')

                        <span class="badge-active">
                            Aktif
                        </span>

                    @else

                        <span class="badge-inactive">
                            Nonaktif
                        </span>

                    @endif

                </div>

            </div>

        </div>


        <!-- PRINT -->
        <button
            type="button"
            class="btn-print"
            onclick="window.print()"
        >
            <i class="bi bi-printer me-2"></i>
            Cetak QR Code
        </button>

    </div>

</div>


<!-- QR CODE LIBRARY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>

    new QRCode(document.getElementById("qrcode"), {

       text: @json('http://10.1.2.6:8000/absen/' . $qrToken->token),

        width: 260,

        height: 260,

        correctLevel: QRCode.CorrectLevel.H

    });

</script>

</body>
</html>