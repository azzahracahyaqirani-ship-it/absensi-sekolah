<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Kelas - Absensi Sekolah</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f7f6ff;
            color: #333;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: white;
            padding: 28px 18px;
            box-shadow: 5px 0 25px rgba(110, 95, 180, 0.08);
        }

        .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo-icon {
            width: 55px;
            height: 55px;
            margin: auto;
            border-radius: 16px;
            background: #8576ef;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            font-weight: bold;
        }

        .logo h2 {
            margin-top: 12px;
            font-size: 18px;
            color: #5548b8;
        }

        .menu-title {
            font-size: 11px;
            color: #aaa;
            margin: 20px 12px 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #666;
            padding: 12px 14px;
            border-radius: 12px;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .menu a:hover,
        .menu a.active {
            background: #eeeaff;
            color: #7565e8;
        }

        .main {
            margin-left: 250px;
            padding: 35px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar h1 {
            color: #3f3a68;
            font-size: 28px;
        }

        .topbar p {
            color: #999;
            margin-top: 5px;
            font-size: 14px;
        }

        .back-btn {
            text-decoration: none;
            background: white;
            color: #7565e8;
            padding: 11px 17px;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgba(110, 95, 180, 0.08);
            font-size: 14px;
        }

        .form-card {
            max-width: 700px;
            background: white;
            padding: 30px;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(110, 95, 180, 0.08);
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #4d496b;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #e3e0f3;
            border-radius: 12px;
            outline: none;
            font-size: 14px;
            background: #faf9ff;
        }

        .form-group input:focus {
            border-color: #8576ef;
            background: white;
            box-shadow: 0 0 0 3px rgba(133, 118, 239, 0.10);
        }

        .error {
            color: #e05b7d;
            font-size: 12px;
            margin-top: 6px;
        }

        .button-area {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            border: none;
            padding: 13px 22px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-save {
            background: #8576ef;
            color: white;
        }

        .btn-save:hover {
            background: #7161dc;
        }

        .btn-cancel {
            background: #f1effb;
            color: #666;
        }

        .btn-cancel:hover {
            background: #e7e4f7;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
                padding: 20px;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>
</head>

<body>

   @include('admin.layouts.sidebar')



    <main class="main">

        <div class="topbar">

            <div>
                <h1>Edit Kelas</h1>
                <p>Perbarui nama kelas yang dipilih.</p>
            </div>

            <a href="{{ route('admin.classes.index') }}" class="back-btn">
                ← Kembali
            </a>

        </div>

        <div class="form-card">

            <form
                action="{{ route('admin.classes.update', $class->id) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label for="nama_kelas">Nama Kelas</label>

                    <input
                        type="text"
                        id="nama_kelas"
                        name="nama_kelas"
                        value="{{ old('nama_kelas', $class->nama_kelas) }}"
                        placeholder="Contoh: XI RPL 3"
                    >

                    @error('nama_kelas')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="button-area">

                    <button type="submit" class="btn btn-save">
                        💾 Simpan Perubahan
                    </button>

                    <a
                        href="{{ route('admin.classes.index') }}"
                        class="btn btn-cancel"
                    >
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </main>

</body>
</html>