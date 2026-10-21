<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Jadwal - Admin</title>

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
            max-width: 850px;
            background: white;
            border: none;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 8px 30px rgba(50, 45, 80, 0.06);
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            height: 46px;
            border-radius: 10px;
            border: 1px solid #dfdce8;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #6858c5;
            box-shadow: 0 0 0 3px rgba(104, 88, 197, 0.10);
        }

        .btn-save {
            background: #6858c5;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 11px 20px;
            font-size: 13px;
        }

        .btn-save:hover {
            background: #5748ae;
            color: white;
        }

        .btn-back {
            background: #f0eef5;
            color: #716d7d;
            border-radius: 10px;
            padding: 11px 20px;
            font-size: 13px;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #e5e2ec;
            color: #716d7d;
        }

        .alert {
            border: none;
            border-radius: 10px;
            font-size: 13px;
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
        Tambah Jadwal
    </div>

    <div class="page-subtitle">
        Tambahkan jadwal pelajaran baru.
    </div>

    @if($errors->any())

        <div class="alert alert-danger mb-4">

            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    <div class="card-custom">

        <form
            action="{{ route('admin.schedules.store') }}"
            method="POST"
        >

            @csrf

            <div class="row">

                <!-- Kelas -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Kelas <span class="text-danger">*</span>
                    </label>

                    <select
                        name="class_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            -- Pilih Kelas --
                        </option>

                        @foreach($classes as $class)

                            <option
                                value="{{ $class->id }}"
                                {{ old('class_id') == $class->id ? 'selected' : '' }}
                            >
                                {{ $class->nama_kelas }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- Guru -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Guru <span class="text-danger">*</span>
                    </label>

                    <select
                        name="teacher_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            -- Pilih Guru --
                        </option>

                        @foreach($teachers as $teacher)

                            <option
                                value="{{ $teacher->id }}"
                                {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}
                            >
                                {{ $teacher->nama }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- Mata Pelajaran -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Mata Pelajaran <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="mata_pelajaran"
                        class="form-control"
                        value="{{ old('mata_pelajaran') }}"
                        placeholder="Contoh: Bahasa Indonesia"
                        required
                    >

                </div>


                <!-- Hari -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Hari <span class="text-danger">*</span>
                    </label>

                    <select
                        name="hari"
                        class="form-select"
                        required
                    >

                        <option value="">
                            -- Pilih Hari --
                        </option>

                        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)

                            <option
                                value="{{ $hari }}"
                                {{ old('hari') == $hari ? 'selected' : '' }}
                            >
                                {{ $hari }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- Jam Mulai -->
                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Jam Mulai <span class="text-danger">*</span>
                    </label>

                    <input
                        type="time"
                        name="jam_mulai"
                        class="form-control"
                        value="{{ old('jam_mulai') }}"
                        required
                    >

                </div>


                <!-- Jam Selesai -->
                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Jam Selesai <span class="text-danger">*</span>
                    </label>

                    <input
                        type="time"
                        name="jam_selesai"
                        class="form-control"
                        value="{{ old('jam_selesai') }}"
                        required
                    >

                </div>

            </div>


            <div class="d-flex gap-2">

                <a
                    href="{{ route('admin.schedules.index') }}"
                    class="btn-back"
                >
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali
                </a>

                <button type="submit" class="btn-save">
                    <i class="bi bi-check-lg me-1"></i>
                    Simpan Jadwal
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>