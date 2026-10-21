<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rekap Absensi - Admin</title>

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
            padding: 25px;
            box-shadow: 0 8px 30px rgba(50, 45, 80, 0.06);
            margin-bottom: 25px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            height: 44px;
            border-radius: 10px;
            border: 1px solid #dfdce8;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #6858c5;
            box-shadow: 0 0 0 3px rgba(104, 88, 197, 0.10);
        }

        .btn-filter {
            background: #6858c5;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            font-size: 13px;
        }

        .btn-filter:hover {
            background: #5748ae;
            color: white;
        }

        .btn-reset {
            background: #f0eef5;
            color: #716d7d;
            border-radius: 10px;
            padding: 10px 18px;
            font-size: 13px;
            text-decoration: none;
        }

        .btn-reset:hover {
            background: #e5e2ec;
            color: #716d7d;
        }

        .table {
            margin-bottom: 0;
            font-size: 13px;
        }

        .table thead th {
            background: #f8f7fc;
            color: #716d7d;
            font-weight: 600;
            border-bottom: 1px solid #eeeaf5;
            padding: 13px;
        }

        .table tbody td {
            padding: 13px;
            vertical-align: middle;
            border-color: #f0eef5;
        }

        .badge-hadir {
            background: #e8f7ee;
            color: #23834d;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
        }

        .badge-lain {
            background: #fff1f1;
            color: #d34b4b;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
        }

        .empty {
            text-align: center;
            padding: 45px 20px;
            color: #9994a3;
        }

        .empty i {
            font-size: 40px;
            display: block;
            margin-bottom: 10px;
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
        Rekap Absensi
    </div>

    <div class="page-subtitle">
        Lihat dan filter rekap kehadiran siswa.
    </div>


    <!-- FILTER -->
    <div class="card-custom">

        <form method="GET" action="{{ route('admin.recap.index') }}">

            <div class="row align-items-end">

                <div class="col-md-3 mb-3">

                    <label class="form-label">
                        Kelas
                    </label>

                    <select name="class_id" class="form-select">

                        <option value="">
                            Semua Kelas
                        </option>

                        @foreach($classes as $class)

                            <option
                                value="{{ $class->id }}"
                                {{ request('class_id') == $class->id ? 'selected' : '' }}
                            >
                                {{ $class->nama_kelas }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="col-md-3 mb-3">

                    <label class="form-label">
                        Tanggal Mulai
                    </label>

                    <input
                        type="date"
                        name="tanggal_mulai"
                        class="form-control"
                        value="{{ request('tanggal_mulai') }}"
                    >

                </div>


                <div class="col-md-3 mb-3">

                    <label class="form-label">
                        Tanggal Selesai
                    </label>

                    <input
                        type="date"
                        name="tanggal_selesai"
                        class="form-control"
                        value="{{ request('tanggal_selesai') }}"
                    >

                </div>


                <div class="col-md-3 mb-3 d-flex gap-2">

                    <button
                        type="submit"
                        class="btn-filter"
                    >
                        <i class="bi bi-funnel me-1"></i>
                        Filter
                    </button>

                    <a
                        href="{{ route('admin.recap.index') }}"
                        class="btn-reset"
                    >
                        Reset
                    </a>

                    <a
    href="{{ route('admin.recap.print', request()->query()) }}"
    target="_blank"
    class="btn btn-dark"
    style="border-radius: 10px; padding: 10px 18px; font-size: 13px;"
>
    <i class="bi bi-printer me-1"></i>
    Cetak Laporan
</a>

                </div>

            </div>

        </form>

    </div>


    <!-- TABLE -->
    <div class="card-custom">

        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($attendances as $attendance)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($attendance->tanggal)->format('d-m-Y') }}
                            </td>

                            <td>
                                {{ $attendance->waktu }}
                            </td>

                            <td>
                                {{ $attendance->student->nis ?? '-' }}
                            </td>

                            <td>
                                {{ $attendance->student->nama ?? '-' }}
                            </td>

                            <td>
                                {{ $attendance->student->schoolClass->nama_kelas ?? '-' }}
                            </td>

                            <td>

                                @if($attendance->status == 'Hadir')

                                    <span class="badge-hadir">
                                        Hadir
                                    </span>

                                @else

                                    <span class="badge-lain">
                                        {{ $attendance->status }}
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7">

                                <div class="empty">

                                    <i class="bi bi-clipboard-x"></i>

                                    Belum ada data absensi.

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>