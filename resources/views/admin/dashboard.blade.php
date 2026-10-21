<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - Absensi Sekolah</title>

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            background: #f8f7fc;
            color: #353344;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #eeeaf5;
            padding: 28px 18px;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px;
            margin-bottom: 38px;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: #eee9ff;
            color: #7865c8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .brand-text h2 {
            font-size: 16px;
            color: #403a55;
        }

        .brand-text p {
            font-size: 11px;
            color: #aaa5b8;
            margin-top: 3px;
        }

        .menu-title {
            font-size: 10px;
            color: #aaa5b8;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 12px;
            margin-bottom: 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            text-decoration: none;
            color: #777286;
            padding: 12px 13px;
            margin-bottom: 6px;
            border-radius: 12px;
            font-size: 13px;
            transition: all .2s ease;
        }

        .menu a:hover {
            background: #f6f3ff;
            color: #7865c8;
            transform: translateX(2px);
        }

        .menu a.active {
            background: #eee9ff;
            color: #705bc2;
            font-weight: 600;
        }

        .menu-icon {
            width: 22px;
            min-width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .logout-area {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 25px;
        }

        .logout {
            width: 100%;
            border: 1px solid #eeeaf5;
            background: #faf9fd;
            color: #817b8e;
            padding: 11px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 13px;
            transition: .2s;
        }

        .logout:hover {
            background: #f3efff;
            color: #705bc2;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 76px;
            background: rgba(255, 255, 255, .9);
            border-bottom: 1px solid #eeeaf5;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 35px;
        }

        .page-title h1 {
            font-size: 21px;
            color: #393447;
            font-weight: 650;
        }

        .page-title p {
            font-size: 12px;
            color: #aaa5b8;
            margin-top: 4px;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .admin-avatar {
            width: 39px;
            height: 39px;
            border-radius: 50%;
            background: #eee9ff;
            color: #705bc2;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
        }

        .admin-name strong {
            display: block;
            font-size: 13px;
            color: #454052;
        }

        .admin-name span {
            display: block;
            font-size: 11px;
            color: #aaa5b8;
            margin-top: 2px;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 32px 35px;
        }

        .welcome {
            background: linear-gradient(135deg, #eee9ff, #f8f5ff);
            border: 1px solid #e8e1ff;
            border-radius: 20px;
            padding: 27px 30px;
            margin-bottom: 25px;
        }

        .welcome h2 {
            font-size: 21px;
            color: #4d426d;
            margin-bottom: 7px;
        }

        .welcome p {
            color: #827b92;
            font-size: 13px;
        }

        /* =========================
           CARDS
        ========================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
            margin-bottom: 25px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #eeeaf5;
            border-radius: 17px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(83, 69, 120, .05);
            transition: .2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 9px 25px rgba(83, 69, 120, .09);
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card p {
            font-size: 11px;
            color: #aaa5b8;
            margin-bottom: 6px;
        }

        .card h3 {
            font-size: 25px;
            color: #454052;
        }

        .card-icon {
            width: 42px;
            height: 42px;
            border-radius: 13px;
            background: #f1edff;
            color: #7865c8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        /* =========================
           TABLE
        ========================= */

        .table-box {
            background: #ffffff;
            border: 1px solid #eeeaf5;
            border-radius: 18px;
            padding: 23px;
            box-shadow: 0 5px 20px rgba(83, 69, 120, .05);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .table-header h2 {
            font-size: 17px;
            color: #454052;
        }

        .table-header span {
            font-size: 11px;
            color: #aaa5b8;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th {
            text-align: left;
            padding: 12px;
            background: #faf9fd;
            color: #9993a7;
            font-size: 11px;
            font-weight: 600;
        }

        td {
            padding: 13px 12px;
            border-bottom: 1px solid #f0edf5;
            font-size: 12px;
            color: #625d6d;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background: #edf8f1;
            color: #4d9a67;
            font-size: 10px;
            font-weight: 600;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #aaa5b8;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 1150px) {

            .cards {
                grid-template-columns: repeat(3, 1fr);
            }

        }

        @media (max-width: 800px) {

            .sidebar {
                width: 72px;
                padding: 25px 10px;
            }

            .brand {
                justify-content: center;
                padding: 0;
            }

            .brand-text,
            .menu-title,
            .menu a span,
            .logout span {
                display: none;
            }

            .brand-icon {
                width: 43px;
                height: 43px;
            }

            .menu a {
                justify-content: center;
                padding: 12px;
            }

            .menu-icon {
                font-size: 18px;
            }

            .main {
                margin-left: 72px;
            }

            .navbar {
                padding: 0 20px;
            }

            .content {
                padding: 22px 20px;
            }

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .admin-name {
                display: none;
            }

        }

        @media (max-width: 500px) {

            .cards {
                grid-template-columns: 1fr;
            }

            .welcome {
                padding: 22px;
            }

            .page-title h1 {
                font-size: 18px;
            }

            .page-title p {
                display: none;
            }

        }
    </style>
</head>

<body>

    <!-- =========================
         SIDEBAR
    ========================== -->

    @include('admin.layouts.sidebar')

    <!-- =========================
         MAIN
    ========================== -->

    <main class="main">


        <!-- NAVBAR -->

        <nav class="navbar">

            <div class="page-title">

                <h1>Dashboard</h1>

                <p>
                    Ringkasan sistem absensi sekolah
                </p>

            </div>


            <div class="admin-info">

                <div class="admin-avatar">
                    A
                </div>

                <div class="admin-name">

                    <strong>Admin</strong>

                    <span>
                        Administrator
                    </span>

                </div>

            </div>

        </nav>


        <!-- CONTENT -->

        <section class="content">


            <!-- WELCOME -->

            <div class="welcome">

                <h2>
                    Halo, Admin! ✨
                </h2>

                <p>
                    Selamat datang di dashboard sistem absensi sekolah.
                    Pantau data dan aktivitas absensi dengan mudah.
                </p>

            </div>


            <!-- STATISTIK -->

            <div class="cards">


                <!-- TOTAL SISWA -->

                <div class="card">

                    <div class="card-top">

                        <div>

                            <p>
                                Total Siswa
                            </p>

                            <h3>
                                {{ $totalSiswa }}
                            </h3>

                        </div>

                        <div class="card-icon">
                            <i class="bi bi-people"></i>
                        </div>

                    </div>

                </div>


                <!-- TOTAL KELAS -->

                <div class="card">

                    <div class="card-top">

                        <div>

                            <p>
                                Total Kelas
                            </p>

                            <h3>
                                {{ $totalKelas }}
                            </h3>

                        </div>

                        <div class="card-icon">
                            <i class="bi bi-building"></i>
                        </div>

                    </div>

                </div>


                <!-- TOTAL ABSENSI -->

                <div class="card">

                    <div class="card-top">

                        <div>

                            <p>
                                Total Absensi
                            </p>

                            <h3>
                                {{ $totalAbsensi }}
                            </h3>

                        </div>

                        <div class="card-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>

                    </div>

                </div>


                <!-- LOKASI QR -->

                <div class="card">

                    <div class="card-top">

                        <div>

                            <p>
                                Lokasi QR
                            </p>

                            <h3>
                                {{ $totalLokasi }}
                            </h3>

                        </div>

                        <div class="card-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                    </div>

                </div>


                <!-- QR AKTIF -->

                <div class="card">

                    <div class="card-top">

                        <div>

                            <p>
                                QR Aktif
                            </p>

                            <h3>
                                {{ $qrAktif }}
                            </h3>

                        </div>

                        <div class="card-icon">
                            <i class="bi bi-qr-code"></i>
                        </div>

                    </div>

                </div>


            </div>


            <!-- ABSENSI TERBARU -->

            <div class="table-box">


                <div class="table-header">

                    <h2>
                        Absensi Terbaru
                    </h2>

                    <span>
                        5 data terakhir
                    </span>

                </div>


                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Nama Siswa</th>

                                <th>Kelas</th>

                                <th>Tanggal</th>

                                <th>Waktu</th>

                                <th>Status</th>

                                <th>Lokasi</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($absensiTerbaru as $absensi)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $absensi->student->nama ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $absensi->student->schoolClass->nama_kelas ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $absensi->tanggal }}
                                    </td>

                                    <td>
                                        {{ $absensi->waktu }}
                                    </td>

                                    <td>

                                        <span class="status">
                                            {{ $absensi->status }}
                                        </span>

                                    </td>

                                    <td>
                                        {{ $absensi->qrLocation->nama_lokasi ?? '-' }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="7"
                                        class="empty"
                                    >

                                        <i class="bi bi-calendar-x"></i>
                                        <br>

                                        Belum ada data absensi.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


        </section>

    </main>

</body>
</html>