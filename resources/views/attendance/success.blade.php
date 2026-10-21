<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Absensi Berhasil</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            background: #f6f7fb;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #302c3d;
        }

        .success-card {
            width: 100%;
            max-width: 450px;
            background: white;
            border-radius: 24px;
            padding: 40px 35px;
            text-align: center;
            box-shadow: 0 12px 40px rgba(40, 35, 70, 0.08);
        }

        .success-icon {
            width: 82px;
            height: 82px;
            margin: 0 auto 22px;
            border-radius: 50%;
            background: #eeeafd;
            color: #6858c5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
        }

        .title {
            font-size: 27px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #888392;
            font-size: 14px;
            margin-bottom: 28px;
        }

        .info-box {
            background: #f8f7fc;
            border-radius: 15px;
            padding: 16px 18px;
            text-align: left;
            margin-bottom: 22px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 9px 0;
            border-bottom: 1px solid #e9e7f0;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #8b8795;
            font-size: 13px;
        }

        .info-value {
            font-size: 13px;
            font-weight: 600;
            text-align: right;
            word-break: break-word;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            width: 100%;
            min-height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-primary {
            background: #6858c5;
            color: white;
        }

        .btn-primary:hover {
            background: #5748ae;
            color: white;
        }

        .btn-secondary {
            background: #f1effb;
            color: #6858c5;
        }

        .btn-secondary:hover {
            background: #e8e4f8;
            color: #5748ae;
        }

        .footer-text {
            margin-top: 20px;
            color: #aaa6b3;
            font-size: 12px;
        }

        @media (max-width: 500px) {

            .success-card {
                padding: 32px 22px;
            }

            .title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<div class="success-card">

    <div class="success-icon">
        <i class="bi bi-check-lg"></i>
    </div>

    <div class="title">
        Absensi Berhasil!
    </div>

    <div class="subtitle">
        Data absensi kamu berhasil diterima.
    </div>

    <div class="info-box">

        <div class="info-row">
            <span class="info-label">NIS</span>
            <span class="info-value">
                {{ $nis }}
            </span>
        </div>

        <div class="info-row">
            <span class="info-label">Token</span>
            <span class="info-value">
                {{ $token }}
            </span>
        </div>

        <div class="info-row">
            <span class="info-label">Tanggal</span>
            <span class="info-value">
                {{ date('d/m/Y') }}
            </span>
        </div>

        <div class="info-row">
            <span class="info-label">Waktu</span>
            <span class="info-value">
                {{ date('H:i') }} WIB
            </span>
        </div>

    </div>


    <!-- TOMBOL -->

    <div class="buttons">

        <a
            href="{{ route('admin.scanner') }}"
            class="btn btn-primary"
        >
            <i class="bi bi-qr-code-scan"></i>
            Scan QR Lagi
        </a>

        <a
            href="{{ route('admin.attendance.index') }}"
            class="btn btn-secondary"
        >
            <i class="bi bi-calendar-check"></i>
            Lihat Data Absensi
        </a>

    </div>


    <div class="footer-text">
        Sistem Absensi Sekolah
    </div>

</div>

</body>

</html>