<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Siswa - Absensi Sekolah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            min-height: 100vh;
            background: #f6f2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .login-box {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(80, 50, 120, 0.10);
        }

        .logo {
            width: 65px;
            height: 65px;
            margin: auto;
            border-radius: 18px;
            background: #eee5ff;
            color: #6f2dbd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .title {
            color: #302040;
            font-weight: 700;
        }

        .subtitle {
            color: #999;
            font-size: 14px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
        }

        .btn-login {
            background: #6f2dbd;
            border: none;
            color: white;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
        }

        .btn-login:hover {
            background: #5d249f;
            color: white;
        }
    </style>
</head>

<body>

<div class="login-box">

    <div class="text-center mb-4">

        <div class="logo mb-3">
            <i class="bi bi-person"></i>
        </div>

        <h4 class="title mb-1">
            Login Siswa
        </h4>

        <div class="subtitle">
            Sistem Absensi Sekolah
        </div>

    </div>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('student.authenticate') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">
                Email
            </label>

            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Masukkan email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div class="mb-4">
            <label class="form-label">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password"
                required
            >
        </div>

        <button type="submit" class="btn btn-login w-100">
            Login
        </button>

    </form>

</div>

</body>
</html>