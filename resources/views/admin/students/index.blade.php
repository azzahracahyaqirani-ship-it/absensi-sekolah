<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa - Absensi Sekolah</title>

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

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* =========================
           SEARCH
        ========================= */

        .search-box {
            position: relative;
            width: 260px;
        }

        .search-box i {
            position: absolute;
            left: 13px;
            top: 11px;
            color: #aaa5b8;
            font-size: 14px;
        }

        .search-box input {
            width: 100%;
            height: 38px;
            border: 1px solid #eeeaf5;
            border-radius: 11px;
            padding: 0 12px 0 36px;
            outline: none;
            font-size: 12px;
            color: #625d6d;
            background: #ffffff;
        }

        .search-box input:focus {
            border-color: #b5a9e8;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn-add {
            height: 38px;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            background: #7865c8;
            color: #ffffff;
            padding: 0 15px;
            border-radius: 11px;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
            white-space: nowrap;
        }

        .btn-add:hover {
            background: #6d59bd;
            color: #ffffff;
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

        .number {
            color: #aaa5b8;
            font-weight: 600;
        }

        .student-name {
            color: #454052;
            font-weight: 600;
        }

        .class-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background: #eee9ff;
            color: #705bc2;
            font-size: 10px;
            font-weight: 600;
        }

        /* =========================
           ACTION
        ========================= */

        .action-btn {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
        }

        .edit-btn {
            background: #fff7e8;
            color: #d49a32;
        }

        .delete-btn {
            background: #fff0f2;
            color: #df5d70;
        }

        .edit-btn:hover {
            background: #fff0d5;
        }

        .delete-btn:hover {
            background: #ffe3e7;
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            background: #edf8f1;
            color: #4d9a67;
            border: 1px solid #d9efdf;
            border-radius: 11px;
            padding: 11px 14px;
            margin-bottom: 18px;
            font-size: 12px;
        }

        /* =========================
           EMPTY
        ========================= */

        .empty {
            text-align: center;
            padding: 35px !important;
            color: #aaa5b8;
        }

        .empty i {
            font-size: 28px;
            margin-bottom: 8px;
        }

        /* =========================
           PAGINATION
        ========================= */

        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 20px;
        }

        .pagination a,
        .pagination span {
            padding: 7px 11px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 11px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1150px) {

            .content-header {
                align-items: flex-start;
            }

            .header-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                width: 100%;
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
        }

        @media (max-width: 600px) {

            .content-header {
                flex-direction: column;
            }

            .header-actions {
                width: 100%;
            }

            .btn-add {
                justify-content: center;
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

                <h1>Data Siswa</h1>

                <p>
                    Kelola data siswa yang terdaftar dalam sistem
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

            @if(session('success'))

                <div class="alert">
                    <i class="bi bi-check-circle"></i>
                    &nbsp;
                    {{ session('success') }}
                </div>

            @endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

            <div class="content-box">

                <div class="content-header">

                    <div>

                        <h2>
                            Daftar Siswa
                        </h2>

                        <p>
                            Data siswa yang tersimpan dalam sistem
                        </p>

                    </div>


                    <div class="header-actions">

                        <form
                            action="{{ route('admin.students.index') }}"
                            method="GET"
                        >

                            <div class="search-box">

                                <i class="bi bi-search"></i>

                                <input
                                    type="text"
                                    name="search"
                                    placeholder="Cari nama / NIS..."
                                    value="{{ request('search') }}"
                                >

                            </div>

                        </form>


                        <a
                            href="{{ route('admin.students.create') }}"
                            class="btn-add"
                        >
                            <i class="bi bi-plus-lg"></i>
                            &nbsp; Tambah Siswa
                        </a>

                    </div>

                </div>


                <!-- TABLE -->

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th width="60">
                                    No
                                </th>

                                <th>
                                    NIS
                                </th>

                                <th>
                                    Nama Siswa
                                </th>

                                <th>
                                    Kelas
                                </th>

                                <th width="100">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($students as $student)

                                <tr>

                                    <td class="number">
                                        {{ $students->firstItem() + $loop->index }}
                                    </td>

                                    <td>
                                        {{ $student->nis }}
                                    </td>

                                    <td class="student-name">
                                        {{ $student->nama }}
                                    </td>

                                    <td>

                                        @if($student->schoolClass)

                                            <span class="class-badge">
                                                {{ $student->schoolClass->nama_kelas }}
                                            </span>

                                        @else

                                            <span>
                                                Belum ada kelas
                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        <a
                                            href="{{ route('admin.students.edit', $student->id) }}"
                                            class="action-btn edit-btn"
                                            title="Edit"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </a>


                                        <form
                                            action="{{ route('admin.students.destroy', $student->id) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus siswa ini?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-btn delete-btn"
                                                title="Hapus"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="empty"
                                    >

                                        <i class="bi bi-people"></i>

                                        <br>

                                        Belum ada data siswa.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                <!-- PAGINATION -->

                {{ $students->links() }}

            </div>

        </section>

    </main>

</body>
</html>