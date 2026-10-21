<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Guru - Admin</title>

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
            background: #fff;
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
            max-width: 800px;
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

        .form-control {
            height: 46px;
            border-radius: 10px;
            border: 1px solid #dfdce8;
            font-size: 14px;
        }

        .form-control:focus {
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
            border: none;
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

@include('admin.layouts.sidebar')


<div class="main">

    <div class="page-title">
        Edit Guru
    </div>

    <div class="page-subtitle">
        Perbarui data guru yang sudah terdaftar.
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
            action="{{ route('admin.teachers.update', $teacher->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        NIP <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="nip"
                        class="form-control"
                        value="{{ old('nip', $teacher->nip) }}"
                        required
                    >
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        Nama Guru <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="{{ old('nama', $teacher->nama) }}"
                        required
                    >
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $teacher->email) }}"
                    >
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        No. HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        class="form-control"
                        value="{{ old('no_hp', $teacher->no_hp) }}"
                    >
                </div>

                <div class="col-12 mb-4">
                    <label class="form-label">
                        Mata Pelajaran
                    </label>

                    <input
                        type="text"
                        name="mata_pelajaran"
                        class="form-control"
                        value="{{ old('mata_pelajaran', $teacher->mata_pelajaran) }}"
                    >
                </div>

            </div>

            <div class="d-flex gap-2">

                <a
                    href="{{ route('admin.teachers.index') }}"
                    class="btn-back"
                >
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali
                </a>

                <button type="submit" class="btn-save">
                    <i class="bi bi-check-lg me-1"></i>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>