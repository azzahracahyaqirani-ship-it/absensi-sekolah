<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jadwal - Admin</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>
        body {
            margin: 0;
            background: #f7f6fb;
            font-family: Arial, sans-serif;
            color: #302c3d;
        }

        .sidebar {
            position: fixed;
            width: 240px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #eeeaf5;
            padding: 25px 15px;
        }

        .brand {
            font-size: 20px;
            font-weight: 700;
            color: #6858c5;
            padding: 0 15px;
            margin-bottom: 30px;
        }

        .menu-title {
            font-size: 11px;
            color: #aaa6b3;
            padding: 0 15px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            margin-bottom: 5px;
            border-radius: 10px;
            text-decoration: none;
            color: #716d7d;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #eeeafd;
            color: #6858c5;
        }

        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .main {
            margin-left: 240px;
            padding: 35px;
        }

        .page-title {
            font-size: 25px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: #9994a3;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .card-custom {
            background: white;
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(50, 45, 80, 0.06);
        }

        .card-header-custom {
            padding: 20px 22px;
            border-bottom: 1px solid #f0eef5;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header-custom h5 {
            margin: 0;
            font-size: 17px;
            font-weight: 700;
        }

        .btn-add {
            background: #6858c5;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 16px;
            font-size: 13px;
            text-decoration: none;
        }

        .btn-add:hover {
            background: #5748ae;
            color: white;
        }

        .table {
            margin: 0;
        }

        .table th {
            color: #888392;
            font-size: 12px;
            font-weight: 600;
            padding: 15px 18px;
            white-space: nowrap;
        }

        .table td {
            padding: 15px 18px;
            font-size: 13px;
            vertical-align: middle;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .badge-day {
            background: #eeeafd;
            color: #6858c5;
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 11px;
        }

        .time {
            color: #716d7d;
            white-space: nowrap;
        }

        .btn-action {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            margin-right: 4px;
        }

        .btn-edit {
            background: #eeeafd;
            color: #6858c5;
        }

        .btn-delete {
            background: #fff0f0;
            color: #dc3545;
        }

        .empty-state {
            text-align: center;
            padding: 45px 20px;
            color: #9994a3;
        }

        .alert {
            border: none;
            border-radius: 11px;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
                padding: 25px;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
@include('admin.layouts.sidebar')

<!-- MAIN -->
<div class="main">

    <div class="page-title">
        Jadwal
    </div>

    <div class="page-subtitle">
        Kelola jadwal pelajaran, kelas, dan guru.
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="card-custom">

        <div class="card-header-custom">

            <h5>
                <i class="bi bi-calendar-week me-2"></i>
                Daftar Jadwal
            </h5>

            <a href="{{ route('admin.schedules.create') }}" class="btn-add">
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Jadwal
            </a>

        </div>

        <div class="table-responsive">

            <table class="table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($schedules as $schedule)

                        <tr>

                            <td>
                                {{ $schedules->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <span class="badge-day">
                                    {{ $schedule->hari }}
                                </span>
                            </td>

                            <td class="time">
                                {{ \Carbon\Carbon::parse($schedule->jam_mulai)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::parse($schedule->jam_selesai)->format('H:i') }}
                            </td>

                            <td>
                                {{ $schedule->schoolClass->nama_kelas ?? '-' }}
                            </td>

                            <td>
                                <strong>{{ $schedule->mata_pelajaran }}</strong>
                            </td>

                            <td>
                                {{ $schedule->teacher->nama ?? '-' }}
                            </td>

                            <td>

                                <a
                                    href="{{ route('admin.schedules.edit', $schedule->id) }}"
                                    class="btn-action btn-edit"
                                    title="Edit"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form
                                    action="{{ route('admin.schedules.destroy', $schedule->id) }}"
                                    method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-action btn-delete"
                                        title="Hapus"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7">

                                <div class="empty-state">

                                    <i
                                        class="bi bi-calendar-week"
                                        style="font-size: 40px;"
                                    ></i>

                                    <div class="mt-3">
                                        Belum ada jadwal.
                                    </div>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        @if($schedules->hasPages())
            <div class="p-3">
                {{ $schedules->links() }}
            </div>
        @endif

    </div>

</div>

</body>
</html>