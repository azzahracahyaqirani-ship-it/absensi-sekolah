<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Scan QR - Admin</title>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        .page {
            min-height: 100vh;
            padding: 35px 20px;
        }

        .wrapper {
            max-width: 900px;
            margin: auto;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #2563eb;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .card {
            background: #fff;
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 12px 35px rgba(15, 23, 42, .08);
        }

        .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .title-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .qr-icon {
            width: 55px;
            height: 55px;
            border-radius: 16px;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
        }

        h1 {
            margin: 0;
            font-size: 25px;
        }

        .subtitle {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .status {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 8px 13px;
            border-radius: 20px;
            background: #f1f5f9;
            color: #64748b;
            font-size: 13px;
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #94a3b8;
        }

        /* AREA SCANNER */

        .scanner-area {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 35px 25px;
            text-align: center;
        }

        .scanner-frame {
            width: 300px;
            height: 300px;
            margin: 0 auto 25px;
            background: #fff;
            border-radius: 20px;
            border: 2px solid #dbeafe;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .scanner-frame::before,
        .scanner-frame::after {
            content: "";
            position: absolute;
            width: 35px;
            height: 35px;
            border-color: #2563eb;
            z-index: 2;
        }

        .scanner-frame::before {
            top: 15px;
            left: 15px;
            border-top: 4px solid #2563eb;
            border-left: 4px solid #2563eb;
            border-radius: 8px 0 0 0;
        }

        .scanner-frame::after {
            bottom: 15px;
            right: 15px;
            border-bottom: 4px solid #2563eb;
            border-right: 4px solid #2563eb;
            border-radius: 0 0 8px 0;
        }

        .scan-icon {
            font-size: 70px;
            opacity: .18;
        }

        .scan-line {
            position: absolute;
            width: 80%;
            height: 2px;
            background: #2563eb;
            opacity: .7;
            animation: scan 2.2s infinite;
        }

        @keyframes scan {
            0% {
                top: 15%;
            }

            50% {
                top: 85%;
            }

            100% {
                top: 15%;
            }
        }

        .scan-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .scan-desc {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 22px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #eef2ff;
            color: #2563eb;
        }

        .btn-secondary:hover {
            background: #e0e7ff;
        }

        #fileInput {
            display: none;
        }

        /* HASIL */

        .result {
            display: none;
            margin-top: 25px;
            padding: 22px;
            border-radius: 16px;
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
        }

        .result-head {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            color: #15803d;
            margin-bottom: 12px;
        }

        .check {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #22c55e;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qr-result {
            background: white;
            border-radius: 10px;
            padding: 12px;
            font-size: 13px;
            color: #475569;
            word-break: break-all;
        }

        .open-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 11px 18px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
        }

        /* INFO */

        .info {
            margin-top: 22px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .info-box {
            padding: 16px;
            background: #f8fafc;
            border-radius: 13px;
            border: 1px solid #eef2f7;
        }

        .info-box strong {
            display: block;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .info-box span {
            font-size: 12px;
            color: #64748b;
            line-height: 1.5;
        }

        /* CAMERA */

        #reader {
            display: none;
        }

        @media (max-width: 600px) {

            .page {
                padding: 20px 14px;
            }

            .card {
                padding: 22px;
            }

            .top {
                align-items: flex-start;
            }

            .status {
                display: none;
            }

            .scanner-frame {
                width: 250px;
                height: 250px;
            }

            .info {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <div class="wrapper">

        <a href="{{ route('admin.dashboard') }}" class="back">
            ← Kembali ke Dashboard
        </a>

        <div class="card">

            <div class="top">

                <div class="title-area">

                    <div class="qr-icon">
                        📷
                    </div>

                    <div>
                        <h1>Scan QR</h1>

                        <p class="subtitle">
                            Scan QR Code untuk absensi siswa
                        </p>
                    </div>

                </div>

                <div class="status">
                    <span class="dot"></span>
                    Scanner siap
                </div>

            </div>


            <!-- SCANNER -->

            <div class="scanner-area">

                <div class="scanner-frame">

                    <div class="scan-icon">
                        ▦
                    </div>

                    <div class="scan-line"></div>

                </div>

                <div class="scan-title">
                    Scan QR Code Absensi
                </div>

                <div class="scan-desc">
                    Gunakan kamera atau pilih gambar QR dari komputer.
                </div>

                <div class="buttons">

                    <button
                        type="button"
                        class="btn btn-primary"
                        onclick="startCamera()">
                        📷 Gunakan Kamera
                    </button>

                    <button
                        type="button"
                        class="btn btn-secondary"
                        onclick="document.getElementById('fileInput').click()">
                        🖼️ Pilih Gambar QR
                    </button>

                </div>

                <input
                    type="file"
                    id="fileInput"
                    accept="image/*">

            </div>


            <!-- HASIL -->

            <div class="result" id="result">

                <div class="result-head">

                    <div class="check">
                        ✓
                    </div>

                    QR berhasil dibaca!

                </div>

                <div class="qr-result" id="qrText"></div>

                <a
                    href="#"
                    id="openQr"
                    class="open-btn">
                    Buka QR Absensi →
                </a>

            </div>


            <!-- INFO -->

            <div class="info">

                <div class="info-box">

                    <strong>📷 Kamera</strong>

                    <span>
                        Gunakan kamera jika perangkat memiliki kamera.
                    </span>

                </div>

                <div class="info-box">

                    <strong>🖼️ Gambar QR</strong>

                    <span>
                        Tidak punya kamera? Pilih gambar QR yang sudah disimpan.
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- Hidden scanner library -->

<div id="reader"></div>


<script>

let scanner = null;


/*
|--------------------------------------------------------------------------
| SCAN DARI FILE GAMBAR
|--------------------------------------------------------------------------
*/

document.getElementById('fileInput').addEventListener('change', function(event) {

    const file = event.target.files[0];

    if (!file) {
        return;
    }

    const html5QrCode = new Html5Qrcode("reader");

    html5QrCode.scanFile(file, true)

        .then(decodedText => {

            tampilkanHasil(decodedText);

            html5QrCode.clear();

        })

        .catch(error => {

            alert("QR tidak berhasil dibaca. Pastikan gambar berisi QR Code yang jelas.");

            html5QrCode.clear();

        });

});


/*
|--------------------------------------------------------------------------
| TAMPILKAN HASIL
|--------------------------------------------------------------------------
*/

function tampilkanHasil(decodedText) {

    document.getElementById('result').style.display = 'block';

    document.getElementById('qrText').innerText = decodedText;

    try {

        const url = new URL(decodedText);

        const token = url.pathname.split('/').pop();

        document.getElementById('openQr').href =
            window.location.origin + "/absen/" + token;

    } catch (error) {

        document.getElementById('openQr').href = decodedText;

    }

}


/*
|--------------------------------------------------------------------------
| KAMERA
|--------------------------------------------------------------------------
*/

function startCamera() {

    const reader = document.getElementById('reader');

    reader.style.display = 'block';

    scanner = new Html5Qrcode("reader");

    Html5Qrcode.getCameras()

        .then(devices => {

            if (devices && devices.length) {

                const cameraId = devices[0].id;

                scanner.start(
                    cameraId,
                    {
                        fps: 10,
                        qrbox: {
                            width: 250,
                            height: 250
                        }
                    },

                    decodedText => {

                        scanner.stop();

                        tampilkanHasil(decodedText);

                    },

                    errorMessage => {
                        // abaikan error scanning
                    }
                );

            } else {

                alert("Kamera tidak ditemukan di perangkat ini.");

            }

        })

        .catch(error => {

            alert("Kamera tidak tersedia di perangkat ini.");

        });

}

</script>

</body>
</html>