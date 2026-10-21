<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Absensi - Absensi Sekolah</title>

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

        .content-box {
            background: #ffffff;
            border: 1px solid #eeeaf5;
            border-radius: 18px;
            padding: 23px;
            box-shadow: 0 5px 20px rgba(83, 69, 120, .05);
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .content-header h2 {
            font-size: 17px;
            color: #454052;
        }

        .content-header p {
            font-size: 11px;
            color: #aaa5b8;
            margin-top: 4px;
        }

        /* =========================
           SEARCH
        ========================= */

        .search-form {
            display: flex;
            gap: 8px;
        }

        .search-box {
            width: 260px;
            height: 38px;
            border: 1px solid #eeeaf5;
            border-radius: 11px;
            padding: 0 13px;
            outline: none;
            font-size: 12px;
            color: #625d6d;
        }

        .search-box:focus {
            border-color: #b5a9e8;
        }

        .search-btn {
            width: 40px;
            height: 38px;
            border: none;
            border-radius: 11px;
            background: #7865c8;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .search-btn:hover {
            background: #6d59bd;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
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
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .number {
            color: #aaa5b8;
            font-weight: 600;
        }

        .student-name {
            color: #454052;
            font-weight: 600;
        }

        /* =========================
           STATUS
        ========================= */

        .badge-hadir {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 20px;
            background: #edf8f1;
            color: #4d9a67;
            font-size: 10px;
            font-weight: 600;
        }

        .badge-lain {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 20px;
            background: #fff4e8;
            color: #d98242;
            font-size: 10px;
            font-weight: 600;
        }

        /* =========================
           EMPTY
        ========================= */

        .empty-state {
            text-align: center;
            padding: 35px 20px;
            color: #aaa5b8;
        }

        .empty-state i {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .empty-state h5 {
            font-size: 14px;
            color: #777286;
            margin-bottom: 5px;
        }

        .empty-state p {
            font-size: 11px;
        }

        /* =========================
           PAGINATION
        ========================= */

        .pagination {
            margin-top: 20px;
            justify-content: center;
        }

        .page-link {
            color: #7565e8;
            border: none;
            margin: 0 3px;
            border-radius: 8px;
        }

        .page-item.active .page-link {
            background: #8576ef;
            color: white;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1150px) {

            .content-header {
                align-items: flex-start;
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

            .admin-name {
                display: none;
            }

            .content-header {
                flex-direction: column;
            }

            .search-form {
                width: 100%;
            }

            .search-box {
                flex: 1;
            }
        }

        @media (max-width: 500px) {

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

    <!-- SIDEBAR -->

    @include('admin.layouts.sidebar')

        <!-- LOGOUT -->

        <div class="logout-area">

            <form
                action="{{ route('admin.logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout"
                >
                    <span>
                        <i class="bi bi-box-arrow-right"></i>
                        &nbsp; Keluar
                    </span>
                </button>

            </form>

        </div>

    </aside>


    <!-- MAIN -->

    <main class="main">

        <!-- NAVBAR -->

        <nav class="navbar">

            <div class="page-title">

                <h1>Data Absensi</h1>

                <p>
                    Kelola dan lihat riwayat kehadiran siswa
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

            <div class="content-box">

                <div class="content-header">

                    <div>

                        <h2>
                            Riwayat Absensi
                        </h2>

                        <p>
                            Data kehadiran siswa yang tersimpan dalam sistem
                        </p>

                    </div>


                    <form
                        action="{{ route('admin.attendance.index') }}"
                        method="GET"
                        class="search-form"
                    >

                        <input
                            type="text"
                            name="search"
                            class="search-box"
                            placeholder="Cari nama atau NIS..."
                            value="{{ request('search') }}"
                        >

                        <button
                            type="submit"
                            class="search-btn"
                        >
                            <i class="bi bi-search"></i>
                        </button>

                    </form>

                </div>


                <!-- TABLE -->

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>No</th>
                                <th>Siswa</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Lokasi QR</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($attendances as $attendance)

                                <tr>

                                    <td class="number">
                                        {{ $attendances->firstItem() + $loop->index }}
                                    </td>

                                    <td class="student-name">
                                        {{ $attendance->student->nama ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $attendance->student->nis ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $attendance->student->schoolClass->nama_kelas ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $attendance->tanggal ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $attendance->waktu ?? '-' }}
                                    </td>

                                    <td>

                                        @if(strtolower($attendance->status ?? '') == 'hadir')

                                            <span class="badge-hadir">
                                                <i class="bi bi-check-circle"></i>
                                                Hadir
                                            </span>

                                        @else

                                            <span class="badge-lain">
                                                {{ $attendance->status ?? '-' }}
                                            </span>

                                        @endif

                                    </td>

                                    <td>
                                        {{ $attendance->qrLocation->nama_lokasi ?? '-' }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8">

                                        <div class="empty-state">

                                            <i class="bi bi-calendar-x"></i>

                                            <h5>
                                                Belum ada data absensi
                                            </h5>

                                            <p>
                                                Data absensi siswa akan muncul di sini.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                @if($attendances->hasPages())

                    <div class="mt-4">

                        {{ $attendances->withQueryString()->links() }}

                    </div>

                @endif

            </div>

        </section>

    </main>

</body>
</html>