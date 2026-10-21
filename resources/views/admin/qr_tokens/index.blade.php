<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>QR Token - Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f8f7fc;
            font-family: 'Segoe UI', sans-serif;
            color: #403a55;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #ffffff;
            border-right: 1px solid #eeeaf5;
            padding: 28px 18px;
            z-index: 1000;
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
            font-weight: 700;
            margin: 0;
            color: #403a55;
        }

        .brand-text p {
            font-size: 11px;
            color: #aaa5b8;
            margin: 2px 0 0;
        }

        .menu-title {
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #aaa5b8;
            padding: 0 12px;
            margin: 20px 0 10px;
            font-weight: 600;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #777286;
            text-decoration: none;
            padding: 12px 13px;
            margin-bottom: 6px;
            border-radius: 12px;
            font-size: 13px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #f6f3ff;
            color: #7865c8;
            transform: translateX(2px);
        }

        .sidebar a.active {
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

        /* ================= LOGOUT ================= */

        .logout-area {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 25px;
        }

        .logout-btn {
            width: 100%;
            border: 1px solid #eeeaf5;
            background: #faf9fd;
            color: #817b8e;
            padding: 11px;
            border-radius: 12px;
            font-size: 13px;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #f5f2fb;
            color: #705bc2;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* ================= NAVBAR ================= */

        .navbar-admin {
            height: 76px;
            background: #ffffff;
            border-bottom: 1px solid #eeeaf5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
        }

        .navbar-title h1 {
            font-size: 21px;
            font-weight: 700;
            color: #403a55;
            margin: 0;
        }

        .navbar-title p {
            font-size: 12px;
            color: #aaa5b8;
            margin: 3px 0 0;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-avatar {
            width: 39px;
            height: 39px;
            border-radius: 50%;
            background: #eee9ff;
            color: #7865c8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .admin-info strong {
            display: block;
            font-size: 13px;
            color: #403a55;
        }

        .admin-info span {
            display: block;
            font-size: 11px;
            color: #aaa5b8;
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 32px 35px;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h2 {
            font-size: 21px;
            font-weight: 700;
            color: #403a55;
            margin: 0;
        }

        .page-heading p {
            font-size: 12px;
            color: #aaa5b8;
            margin: 5px 0 0;
        }

        /* ================= ALERT ================= */

        .alert {
            border: none;
            border-radius: 12px;
            font-size: 13px;
        }

        /* ================= CARD ================= */

        .card-custom {
            background: #ffffff;
            border: 1px solid #eeeaf5;
            border-radius: 18px;
            padding: 23px;
            box-shadow: 0 5px 20px rgba(100, 90, 150, 0.04);
        }

        /* ================= TOOLBAR ================= */

        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 20px;
        }

        .search-form {
            display: flex;
            gap: 8px;
            flex: 1;
            max-width: 450px;
        }

        .search-box {
            height: 42px;
            border-radius: 11px;
            border: 1px solid #e5e1f2;
            padding: 10px 14px;
            font-size: 13px;
            color: #403a55;
        }

        .search-box:focus {
            border-color: #8b7cf6;
            box-shadow: 0 0 0 3px rgba(139, 124, 246, 0.12);
        }

        .btn-purple {
            height: 42px;
            background: #8576ef;
            color: #ffffff;
            border: none;
            border-radius: 11px;
            padding: 0 17px;
            font-size: 13px;
            font-weight: 500;
        }

        .btn-purple:hover {
            background: #7161dc;
            color: #ffffff;
        }

        /* ================= TABLE ================= */

        .table-responsive {
            width: 100%;
        }

        .table {
            width: 100%;
            margin-bottom: 0;
        }

        .table thead th {
            color: #8b869d;
            font-size: 12px;
            font-weight: 600;
            border-bottom: 1px solid #eeeaf7;
            padding: 14px 12px;
            white-space: nowrap;
        }

        .table tbody td {
            color: #5f596f;
            font-size: 13px;
            padding: 16px 12px;
            vertical-align: middle;
            border-bottom: 1px solid #f1eef8;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background: #faf9fe;
        }

        .table strong {
            color: #403a55;
            font-weight: 600;
        }

        /* ================= TOKEN ================= */

        .token-box {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #f3f1f8;
            color: #655f73;
            padding: 7px 10px;
            border-radius: 8px;
            font-size: 11px;
            font-family: monospace;
            max-width: 180px;
        }

        .token-text {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .location-badge {
            display: inline-block;
            background: #eeeaff;
            color: #7565e8;
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-active {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #e8f8ef;
            color: #36a269;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-inactive {
            display: inline-flex;
            align-items: center;
            background: #f1eff5;
            color: #8b8698;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        /* ================= ACTION ================= */

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-edit,
        .btn-delete {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 9px;
            font-size: 14px;
            transition: 0.2s;
        }

        .btn-edit {
            background: #eeeaff;
            color: #7565e8;
        }

        .btn-edit:hover {
            background: #e2ddff;
            color: #6656d4;
        }

        .btn-delete {
            background: #fff0f0;
            color: #d86666;
        }

        .btn-delete:hover {
            background: #ffe2e2;
            color: #c95555;
        }

        /* ================= EMPTY ================= */

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #aaa5b7;
        }

        .empty-state i {
            display: block;
            font-size: 48px;
            color: #c8c2e8;
            margin-bottom: 14px;
        }

        .empty-state h5 {
            font-size: 15px;
            color: #6f697d;
            margin-bottom: 6px;
        }

        .empty-state p {
            font-size: 12px;
        }

        /* ================= PAGINATION ================= */

        .pagination {
            margin-bottom: 0;
        }

        .page-link {
            color: #7565e8;
            border: none;
            margin: 0 3px;
            border-radius: 8px;
            font-size: 12px;
        }

        .page-item.active .page-link {
            background: #8576ef;
            color: white;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1000px) {

            .table-responsive {
                overflow-x: auto;
            }

            .table {
                min-width: 950px;
            }
        }

        @media (max-width: 900px) {

            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
            }

            .navbar-admin {
                padding: 0 25px;
            }

            .content {
                padding: 25px;
            }

            .toolbar {
                align-items: stretch;
                flex-direction: column;
            }

            .search-form {
                max-width: 100%;
            }
        }

        @media (max-width: 700px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .logout-area {
                position: static;
                margin-top: 20px;
            }

            .main {
                margin-left: 0;
            }

            .navbar-admin {
                height: auto;
                padding: 18px 20px;
            }

            .admin-info {
                display: none;
            }

            .content {
                padding: 20px;
            }

            .card-custom {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

<!-- ================= SIDEBAR ================= -->

@include('admin.layouts.sidebar')

    <div class="logout-area">

        <form action="{{ route('admin.logout') }}" method="POST">

            @csrf

            <button type="submit" class="logout-btn">

                <i class="bi bi-box-arrow-right me-2"></i>
                Logout

            </button>

        </form>

    </div>

</div>


<!-- ================= MAIN ================= -->

<div class="main">

    <!-- NAVBAR -->

    <div class="navbar-admin">

        <div class="navbar-title">

            <h1>QR Token</h1>

            <p>Kelola token QR untuk absensi</p>

        </div>


        <div class="admin-profile">

            <div class="admin-avatar">
                <i class="bi bi-person-fill"></i>
            </div>

            <div class="admin-info">

                <strong>{{ Auth::user()->name }}</strong>

                <span>Administrator</span>

            </div>

        </div>

    </div>


    <!-- CONTENT -->

    <div class="content">

        <div class="page-heading">

            <h2>Data QR Token</h2>

            <p>
                Kelola token QR yang digunakan siswa untuk melakukan absensi.
            </p>

        </div>


        @if(session('success'))

            <div class="alert alert-success mb-4">

                <i class="bi bi-check-circle me-1"></i>

                {{ session('success') }}

            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-danger mb-4">

                <i class="bi bi-exclamation-circle me-1"></i>

                {{ session('error') }}

            </div>

        @endif


        <!-- CARD -->

        <div class="card-custom">

            <!-- TOOLBAR -->

            <div class="toolbar">

                <form
                    action="{{ route('admin.qr-tokens.index') }}"
                    method="GET"
                    class="search-form"
                >

                    <input
                        type="text"
                        name="search"
                        class="form-control search-box"
                        placeholder="Cari token atau lokasi..."
                        value="{{ request('search') }}"
                    >

                    <button type="submit" class="btn btn-purple">

                        <i class="bi bi-search"></i>

                    </button>

                </form>


                <a
                    href="{{ route('admin.qr-tokens.create') }}"
                    class="btn btn-purple"
                >

                    <i class="bi bi-plus-lg me-1"></i>
                    Buat QR Token

                </a>

            </div>


            <!-- TABLE -->

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Lokasi</th>

                            <th>Token</th>

                            <th>Tanggal</th>

                            <th>Waktu Mulai</th>

                            <th>Waktu Berakhir</th>

                            <th>Status</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($tokens as $token)

                            <tr>

                                <td>
                                    {{ $tokens->firstItem() + $loop->index }}
                                </td>


                                <td>

                                    <span class="location-badge">

                                        <i class="bi bi-geo-alt me-1"></i>

                                        {{ $token->qrLocation->nama_lokasi ?? '-' }}

                                    </span>

                                </td>


                                <td>

                                    <span class="token-box">

                                        <i class="bi bi-qr-code"></i>

                                        <span class="token-text">
                                            {{ $token->token }}
                                        </span>

                                    </span>

                                </td>


                                <td>
                                    {{ $token->tanggal }}
                                </td>


                                <td>
                                    {{ $token->waktu_mulai }}
                                </td>


                                <td>
                                    {{ $token->waktu_berakhir }}
                                </td>


                                <td>

                                    @if($token->status === 'Aktif')

                                        <span class="badge-active">

                                            <i class="bi bi-check-circle"></i>

                                            Aktif

                                        </span>

                                    @else

                                        <span class="badge-inactive">
                                            Nonaktif
                                        </span>

                                    @endif

                                </td>


                                <td>
    <div class="action-buttons">

        <a
            href="{{ route('admin.qr-tokens.edit', $token) }}"
            class="btn-edit"
            title="Edit"
        >
            <i class="bi bi-pencil"></i>
        </a>

        <a
            href="{{ route('admin.qr-tokens.show', $token) }}"
            class="btn-edit"
            title="Lihat QR"
        >
            <i class="bi bi-qr-code"></i>
        </a>


                                        <form
                                            action="{{ route('admin.qr-tokens.destroy', $token) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus QR Token ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-delete"
                                                title="Hapus"
                                            >

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8">

                                    <div class="empty-state">

                                        <i class="bi bi-qr-code"></i>

                                        <h5>
                                            Belum ada QR Token
                                        </h5>

                                        <p class="mb-3">
                                            Buat QR Token untuk digunakan
                                            dalam proses absensi siswa.
                                        </p>

                                        <a
                                            href="{{ route('admin.qr-tokens.create') }}"
                                            class="btn btn-purple"
                                        >

                                            <i class="bi bi-plus-lg me-1"></i>
                                            Buat QR Token

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <!-- PAGINATION -->

            @if($tokens->hasPages())

                <div class="mt-4">

                    {{ $tokens->withQueryString()->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

</body>
</html>