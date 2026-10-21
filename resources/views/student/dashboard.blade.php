<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: #f6f2ff;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid #eee;
        }

        .brand {
            color: #6f2dbd;
            font-weight: 700;
        }

        .container-main {
            max-width: 1100px;
            margin: auto;
            padding: 35px 20px;
        }

        .welcome {
            background: #6f2dbd;
            color: white;
            border-radius: 20px;
            padding: 28px;
            margin-bottom: 25px;
        }

        .welcome h3 {
            font-weight: 700;
        }

        .menu-card {
            background: white;
            border: none;
            border-radius: 18px;
            padding: 25px;
            height: 100%;
            box-shadow: 0 5px 20px rgba(80, 50, 120, 0.07);
            transition: 0.2s;
        }

        .menu-card:hover {
            transform: translateY(-3px);
        }

        .menu-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #eee5ff;
            color: #6f2dbd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .menu-card h5 {
            font-weight: 700;
            color: #302040;
        }

        .menu-card p {
            color: #888;
            font-size: 13px;
        }

        .btn-purple {
            background: #6f2dbd;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
        }

        .btn-purple:hover {
            background: #5d249f;
            color: white;
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

        <form action="{{ route('student.logout') }}" method="POST">
            @csrf

            <button type="submit" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-box-arrow-right me-1"></i>
                Logout
            </button>
        </form>
    </div>
</nav>

<div class="container-main">

    <h3>Selamat Datang, {{ $student->nama }} 👋</h3>

<p class="mb-1">
    NIS: {{ $student->nis }}
</p>

<p class="mb-0">
    Kelas: {{ $student->schoolClass->nama_kelas ?? '-' }}
</p>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="menu-card">
                <div class="menu-icon">
                    <i class="bi bi-person"></i>
                </div>

                <h5>Profil Siswa</h5>

                <p>
                    Melihat informasi profil siswa.
                </p>

                <button class="btn btn-purple">
                    Lihat Profil
                </button>
            </div>
        </div>

        <div class="col-md-4">
            <div class="menu-card">
                <div class="menu-icon">
                    <i class="bi bi-qr-code-scan"></i>
                </div>

                <h5>Scan QR</h5>

                <p>
                    Scan QR Code untuk melakukan absensi.
                </p>

                <a href="/student/scan" class="btn btn-purple">
    Scan Sekarang
</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="menu-card">
                <div class="menu-icon">
                    <i class="bi bi-calendar-check"></i>
                </div>

                <h5>Absensi Hari Ini</h5>

                <p>
                    Melihat status kehadiran hari ini.
                </p>

                <a href="{{ route('student.attendance.today') }}"
   class="btn btn-purple">
    Lihat Status
</a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="menu-card">
                <div class="menu-icon">
                    <i class="bi bi-clock-history"></i>
                </div>

                <h5>Riwayat Absensi</h5>

                <p>
                    Melihat riwayat absensi yang sudah dilakukan.
                </p>

                <button class="btn btn-purple">
                    Lihat Riwayat
                </button>
            </div>
        </div>

        <div class="col-md-6">
            <div class="menu-card">
                <div class="menu-icon">
                    <i class="bi bi-mortarboard"></i>
                </div>

                <h5>Kelas</h5>

                <p>
                    Melihat informasi kelas siswa.
                </p>

                <button class="btn btn-purple">
                    Lihat Kelas
                </button>
            </div>
        </div>

    </div>

</div>

</body>
</html>