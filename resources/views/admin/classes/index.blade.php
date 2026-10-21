<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Kelas - Absensi Sekolah</title>

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

        .content-card {
            background: #ffffff;
            border: 1px solid #eeeaf5;
            border-radius: 18px;
            padding: 23px;
            box-shadow: 0 5px 20px rgba(83, 69, 120, .05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .card-header h2 {
            font-size: 18px;
            color: #454052;
        }

        .card-header p {
            font-size: 11px;
            color: #aaa5b8;
            margin-top: 4px;
        }

        /* =========================
           SEARCH + BUTTON
        ========================= */

        .tools {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 13px;
            top: 11px;
            color: #aaa5b8;
        }

        .search-box input {
            width: 240px;
            height: 38px;
            border: 1px solid #e8e4ef;
            border-radius: 10px;
            padding: 0 12px 0 38px;
            outline: none;
            font-size: 12px;
            color: #555061;
        }

        .search-box input:focus {
            border-color: #a497ee;
        }

        .btn-add {
            height: 38px;
            padding: 0 15px;
            border: none;
            border-radius: 10px;
            background: #7865c8;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .btn-add:hover {
            background: #6754b7;
            color: white;
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            padding: 12px 15px;
            border-radius: 11px;
            margin-bottom: 18px;
            font-size: 12px;
        }

        .alert-success {
            background: #edf8f1;
            color: #4d9a67;
        }

        .alert-danger {
            background: #fff0f2;
            color: #d45b70;
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
            min-width: 650px;
        }

        th {
            text-align: left;
            padding: 13px 12px;
            background: #faf9fd;
            color: #9993a7;
            font-size: 11px;
            font-weight: 600;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #f0edf5;
            font-size: 12px;
            color: #625d6d;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .number {
            color: #aaa5b8;
        }

        .class-name {
            font-weight: 600;
            color: #4b4658;
        }

        .student-count {
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

        .actions {
            display: flex;
            gap: 7px;
        }

        .action-btn {
            width: 33px;
            height: 33px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .edit {
            background: #fff7e5;
            color: #d59a27;
        }

        .edit:hover {
            background: #ffefc8;
            color: #c48616;
        }

        .delete {
            background: #fff0f2;
            color: #d95b70;
        }

        .delete:hover {
            background: #ffe0e5;
            color: #c7465c;
        }

        /* =========================
           EMPTY
        ========================= */

        .empty {
            text-align: center;
            padding: 45px !important;
            color: #aaa5b8;
        }

        .empty i {
            font-size: 35px;
            display: block;
            margin-bottom: 10px;
        }

        /* =========================
           PAGINATION
        ========================= */

        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 22px;
            list-style: none;
        }

        .pagination li a,
        .pagination li span {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 9px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 11px;
            border: 1px solid #eeeaf5;
            color: #777286;
            background: white;
        }

        .pagination li.active span {
            background: #7865c8;
            color: white;
            border-color: #7865c8;
        }

        /* =========================
           MOBILE
        ========================= */

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

            .card-header {
                flex-direction: column;
                align-items: stretch;
            }

            .tools {
                width: 100%;
            }

            .search-box {
                flex: 1;
            }

            .search-box input {
                width: 100%;
            }
        }

        @media (max-width: 500px) {

            .tools {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-add {
                justify-content: center;
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

                <h1>Data Kelas</h1>

                <p>
                    Kelola data kelas dan jumlah siswa.
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

                <div class="alert alert-success">

                    <i class="bi bi-check-circle"></i>

                    {{ session('success') }}

                </div>

            @endif


            @if(session('error'))

                <div class="alert alert-danger">

                    <i class="bi bi-exclamation-circle"></i>

                    {{ session('error') }}

                </div>

            @endif


            <div class="content-card">


                <div class="card-header">

                    <div>

                        <h2>
                            Daftar Kelas
                        </h2>

                        <p>
                            Daftar kelas yang tersedia di sekolah.
                        </p>

                    </div>


                    <div class="tools">


                        <!-- SEARCH -->

                        <form
                            action="{{ route('admin.classes.index') }}"
                            method="GET"
                        >

                            <div class="search-box">

                                <i class="bi bi-search"></i>

                                <input
                                    type="text"
                                    name="search"
                                    placeholder="Cari kelas..."
                                    value="{{ request('search') }}"
                                >

                            </div>

                        </form>


                        <!-- TAMBAH -->

                        <a
                            href="{{ route('admin.classes.create') }}"
                            class="btn-add"
                        >

                            <i class="bi bi-plus-lg"></i>

                            Tambah Kelas

                        </a>

                    </div>

                </div>


                <!-- TABLE -->

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th width="70">
                                    No
                                </th>

                                <th>
                                    Nama Kelas
                                </th>

                                <th>
                                    Jumlah Siswa
                                </th>

                                <th width="110">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($classes as $class)

                                <tr>

                                    <td class="number">
                                        {{ $classes->firstItem() + $loop->index }}
                                    </td>


                                    <td class="class-name">
                                        {{ $class->nama_kelas }}
                                    </td>


                                    <td>

                                        <span class="student-count">

                                            <i class="bi bi-people"></i>

                                            {{ $class->students_count }}
                                            Siswa

                                        </span>

                                    </td>


                                    <td>

                                        <div class="actions">


                                            <!-- EDIT -->

                                            <a
                                                href="{{ route('admin.classes.edit', $class->id) }}"
                                                class="action-btn edit"
                                                title="Edit"
                                            >

                                                <i class="bi bi-pencil"></i>

                                            </a>


                                            <!-- HAPUS -->

                                            <form
                                                action="{{ route('admin.classes.destroy', $class->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus kelas ini?')"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-btn delete"
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

                                    <td
                                        colspan="4"
                                        class="empty"
                                    >

                                        <i class="bi bi-building"></i>

                                        Belum ada data kelas.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                <!-- PAGINATION -->

                {{ $classes->links() }}


            </div>

        </section>

    </main>

</body>
</html>