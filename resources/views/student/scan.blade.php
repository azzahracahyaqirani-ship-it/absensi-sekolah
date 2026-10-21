<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Scan QR - Absensi Sekolah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <style>
        body {
            margin: 0;
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
            font-size: 16px;
        }

        .main {
            max-width: 650px;
            margin: auto;
            padding: 35px 20px;
        }

        .back-btn {
            text-decoration: none;
            color: #6f2dbd;
            font-size: 14px;
            font-weight: 600;
        }

        .scan-card {
            background: white;
            border-radius: 24px;
            padding: 30px;
            margin-top: 20px;
            box-shadow: 0 8px 30px rgba(80, 50, 120, 0.08);
        }

        .qr-icon {
            width: 58px;
            height: 58px;
            border-radius: 17px;
            background: #eee4ff;
            color: #6f2dbd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
            margin-bottom: 18px;
        }

        .scan-card h3 {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .scan-card .description {
            color: #888;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .scanner-box {
            background: #faf8ff;
            border: 2px dashed #d8c5f5;
            border-radius: 20px;
            padding: 15px;
            overflow: hidden;
        }

        #reader {
            width: 100%;
            border: none !important;
        }

        #reader video {
            border-radius: 15px !important;
        }

        #reader img {
            display: none;
        }

        #reader button {
            background: #6f2dbd !important;
            color: white !important;
            border: none !important;
            border-radius: 10px !important;
            padding: 9px 15px !important;
            margin-top: 10px;
        }

        #reader select {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 7px;
            margin-top: 8px;
        }

        .info-box {
            background: #f5efff;
            border-radius: 14px;
            padding: 13px 15px;
            margin-top: 20px;
            color: #6f2dbd;
            font-size: 13px;
        }

        .info-box i {
            margin-right: 7px;
        }

        .back-dashboard {
            display: inline-block;
            margin-top: 22px;
            text-decoration: none;
            color: #777;
            font-size: 14px;
        }

        .back-dashboard:hover {
            color: #6f2dbd;
        }

        @media (max-width: 576px) {
            .main {
                padding: 25px 15px;
            }

            .scan-card {
                padding: 22px 18px;
                border-radius: 20px;
            }
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
           class="back-btn">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

    </div>
</nav>


<div class="main">

    <div class="scan-card">

        <div class="qr-icon">
            <i class="bi bi-qr-code-scan"></i>
        </div>

        <h3>Scan QR Absensi</h3>

        <p class="description">
            Arahkan kamera ke QR Code yang telah disediakan
            untuk melakukan absensi.
        </p>


        <div class="scanner-box">

            <div id="reader"></div>

        </div>


        <div id="result"></div>


        <div class="info-box">
            <i class="bi bi-info-circle"></i>
            Pastikan QR Code berada di dalam kotak pemindaian.
        </div>


        <a href="{{ route('student.dashboard') }}"
           class="back-dashboard">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Dashboard
        </a>

    </div>

</div>


<script>

function onScanSuccess(decodedText) {

    document.getElementById('result').innerHTML = `
        <div class="alert alert-success mt-3 rounded-3">
            <i class="bi bi-check-circle me-1"></i>
            QR berhasil dipindai. Mengarahkan...
        </div>
    `;

    setTimeout(function () {
      const token = decodedText.split('/').pop();

window.location.href = `/student/absen/${token}`;
    }, 500);
}


function onScanFailure(error) {
    // Abaikan error scan sementara
}


const scanner = new Html5QrcodeScanner(
    "reader",
    {
        fps: 10,
        qrbox: {
            width: 250,
            height: 250
        },
        rememberLastUsedCamera: true
    },
    false
);

scanner.render(onScanSuccess, onScanFailure);

</script>

</body>
</html>