<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Absensi Hari Ini</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: #f7f3ff;
            font-family: Arial, sans-serif;
            color: #2d2340;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid #eee;
        }

        .brand {
            color: #6f2dbd;
            font-weight: 700;
        }

        .main {
            max-width: 650px;
            margin: auto;
            padding: 35px 20px;
        }

        .back {
            text-decoration: none;
            color: #6f2dbd;
            font-size: 14px;
            font-weight: 600;
        }

        .card-status {
            background: white;
            border-radius: 24px;
            padding: 30px;
            margin-top: 20px;
            box-shadow: 0 8px 30px rgba(80, 50, 120, 0.08);
        }

        .icon {
            width: 60px;
            height: 60px;
            border-radius: 18px;
            background: #eee4ff;
            color: #6f2dbd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 18px;
        }

        h3 {
            font-weight: 700;
        }

        .date {
            color: #888;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .status-hadir {
            background: #e9f9ef;
            color: #198754;
            border-radius: 16px;
            padding: 20px;
        }

        .status-belum {
            background: #fff4df;
            color: #a66a00;
            border-radius: 16px;
            padding: 20px;
        }

        .status-title {
            font-size: 18px;
            font-weight: 700;
        }

        .info {
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<nav class="navbar px-4 py-3">
    <div class="container-fluid">

        <span class="brand">
            <i class="bi bi-person-check me-2"></i>
            Absensi Sekolah
        </span>

        <a href="{{ route('student.dashboard') }}"
           class="back">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

    </div>
</nav>


<div class="main">

    <a href="{{ route('student.dashboard') }}" class="back">
        <i class="bi bi-arrow-left me-1"></i>
        Kembali ke Dashboard
    </a>


    <div class="card-status">

        <div class="icon">
            <i class="bi bi-calendar-check"></i>
        </div>

        <h3>Absensi Hari Ini</h3>

        <p class="date">
            {{ now()->translatedFormat('l, d F Y') }}
        </p>


        @if($attendance)

            <div class="status-hadir">

                <div class="status-title">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Kamu sudah hadir
                </div>

                <div class="info">
                    <strong>Waktu:</strong>
                    {{ $attendance->waktu }}
                </div>

                <div class="info">
                    <strong>Status:</strong>
                    {{ $attendance->status }}
                </div>

            </div>

        @else

            <div class="status-belum">

                <div class="status-title">
                    <i class="bi bi-clock me-2"></i>
                    Belum melakukan absensi
                </div>

                <div class="info">
                    Silakan lakukan absensi melalui Scan QR.
                </div>

                <a href="{{ route('student.scan') }}"
                   class="btn btn-purple mt-3"
                   style="background:#6f2dbd;color:white;border:none;border-radius:10px;">
                    <i class="bi bi-qr-code-scan me-1"></i>
                    Scan QR Sekarang
                </a>

            </div>

        @endif

    </div>

</div>

</body>
</html>