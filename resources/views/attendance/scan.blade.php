<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Absensi Siswa</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

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
            background: linear-gradient(135deg, #f4f2ff, #faf9ff);
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #302c3d;
        }

        .attendance-card {
            width: 100%;
            max-width: 450px;
            background: #ffffff;
            border-radius: 24px;
            padding: 34px;
            box-shadow: 0 15px 45px rgba(60, 50, 100, 0.10);
        }

        .icon-box {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: #eeeafd;
            color: #6858c5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto 18px;
        }

        .title {
            text-align: center;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #888392;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .scan-info {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f7f6fc;
            border-radius: 13px;
            padding: 13px 15px;
            margin-bottom: 24px;
            font-size: 13px;
            color: #716d7d;
        }

        .scan-info i {
            color: #6858c5;
            font-size: 18px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            height: 50px;
            border-radius: 12px;
            border: 1px solid #dfdce8;
            padding: 0 15px;
            font-size: 14px;
        }

        .form-control::placeholder {
            color: #aaa6b3;
        }

        .form-control:focus {
            border-color: #6858c5;
            box-shadow: 0 0 0 3px rgba(104, 88, 197, 0.10);
        }

        .btn-absen {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 12px;
            background: #6858c5;
            color: white;
            font-weight: 600;
            margin-top: 10px;
            transition: 0.2s;
        }

        .btn-absen:hover {
            background: #5748ae;
            transform: translateY(-1px);
        }

        .token-info {
            margin-top: 22px;
            padding: 11px 14px;
            background: #faf9fc;
            border: 1px solid #eeeaf5;
            border-radius: 10px;
            font-size: 11px;
            color: #9994a3;
            text-align: center;
            word-break: break-all;
        }

        .footer-text {
            text-align: center;
            margin-top: 22px;
            font-size: 11px;
            color: #aaa6b3;
        }

        @media (max-width: 480px) {
            .attendance-card {
                padding: 27px 22px;
                border-radius: 20px;
            }

            .title {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<div class="attendance-card">

    <!-- Icon -->
    <div class="icon-box">
        <i class="bi bi-person-check-fill"></i>
    </div>

    <!-- Judul -->
    <div class="title">
        Absensi Siswa
    </div>

    <div class="subtitle">
        Silakan masukkan NIS kamu untuk mencatat kehadiran.
    </div>

    <!-- Info setelah scan QR -->
    <div class="scan-info">
        <i class="bi bi-qr-code-scan"></i>

        <span>
            QR berhasil dipindai. Silakan lanjutkan dengan memasukkan NIS.
        </span>
    </div>

    <!-- Pesan error -->
    @if(session('error'))
        <div
            class="alert alert-danger text-center"
            style="border-radius: 11px; font-size: 14px;"
        >
            <i class="bi bi-exclamation-circle me-1"></i>
            {{ session('error') }}
        </div>
    @endif

    <!-- Form Absensi -->
    <form action="{{ route('attendance.submit', $token) }}" method="POST">

        @csrf

        <div class="mb-3">

            <label for="nis" class="form-label">
                Nomor Induk Siswa (NIS)
            </label>

            <input
                type="text"
                name="nis"
                id="nis"
                class="form-control"
                placeholder="Contoh: 123456789"
                autocomplete="off"
                required
            >

        </div>

        <button type="submit" class="btn-absen">
            <i class="bi bi-check-circle me-2"></i>
            Absen Sekarang
        </button>

    </form>

    <!-- Token -->
    <div class="token-info">
        <i class="bi bi-shield-check me-1"></i>
        QR Token: {{ $token }}
    </div>

    <div class="footer-text">
        Sistem Absensi Sekolah
    </div>

</div>

</body>

</html>