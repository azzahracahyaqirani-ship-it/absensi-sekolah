<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Lokasi QR - Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f6f4ff;
            font-family: 'Segoe UI', sans-serif;
            color: #3f3a58;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: white;
            padding: 25px 18px;
            box-shadow: 3px 0 15px rgba(100, 90, 150, 0.08);
        }

        .brand {
            color: #7565e8;
            font-size: 21px;
            font-weight: 700;
            margin-bottom: 30px;
            padding-left: 10px;
        }

        .menu-title {
            font-size: 11px;
            color: #aaa5bd;
            font-weight: 600;
            margin: 20px 10px 8px;
            text-transform: uppercase;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin: 5px 0;
            text-decoration: none;
            color: #77728d;
            border-radius: 12px;
        }

        .sidebar a:hover {
            background: #f0edff;
            color: #7565e8;
        }

        .sidebar a.active {
            background: #ebe8ff;
            color: #7565e8;
            font-weight: 600;
        }

        .main {
            margin-left: 250px;
            padding: 35px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #39344f;
        }

        .page-subtitle {
            color: #918ca3;
            margin-bottom: 25px;
        }

        .card-custom {
            background: white;
            border: none;
            border-radius: 18px;
            box-shadow: 0 5px 25px rgba(100, 90, 150, 0.07);
            max-width: 850px;
        }

        .form-label {
            font-weight: 600;
            font-size: 13px;
            color: #57516b;
        }

        .form-control,
        .form-select {
            border: 1px solid #e5e1f2;
            border-radius: 11px;
            padding: 11px 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #8b7cf6;
            box-shadow: 0 0 0 3px rgba(139, 124, 246, 0.12);
        }

        .btn-purple {
            background: #8576ef;
            color: white;
            border: none;
            border-radius: 11px;
            padding: 11px 20px;
        }

        .btn-purple:hover {
            background: #7161dc;
            color: white;
        }

        .btn-back {
            background: #f0edff;
            color: #7565e8;
            border: none;
            border-radius: 11px;
            padding: 11px 20px;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #e5e0ff;
            color: #6656d4;
        }

        .info-box {
            background: #f5f2ff;
            border: 1px solid #e7e1ff;
            border-radius: 12px;
            padding: 15px;
            color: #7565a8;
            font-size: 13px;
        }

        .text-danger {
            font-size: 12px;
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
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

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf

        <button type="submit"
                style="border:none;background:none;width:100%;text-align:left;padding:0;">

            <span style="
                display:flex;
                align-items:center;
                gap:12px;
                padding:12px 14px;
                color:#77728d;
                border-radius:12px;
            ">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </span>

        </button>
    </form>

</div>


<div class="main">

    <h1 class="page-title">Edit Lokasi QR</h1>

    <p class="page-subtitle">
        Ubah informasi lokasi yang digunakan untuk absensi siswa.
    </p>


    <div class="card-custom p-4 p-md-5">

        <div class="info-box mb-4">
            <i class="bi bi-info-circle"></i>
            Perbarui koordinat lokasi dan radius sesuai kebutuhan absensi.
        </div>


        <form action="{{ route('admin.qr-locations.update', $qrLocation->id) }}" method="POST">

            @csrf
            @method('PUT')


            <div class="mb-4">

                <label class="form-label">
                    Nama Lokasi
                </label>

                <input
                    type="text"
                    name="nama_lokasi"
                    class="form-control"
                    value="{{ old('nama_lokasi', $qrLocation->nama_lokasi) }}"
                    required
                >

                @error('nama_lokasi')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="mb-4">

                <label class="form-label">
                    Kode Lokasi
                </label>

                <input
                    type="text"
                    name="kode_lokasi"
                    class="form-control"
                    value="{{ old('kode_lokasi', $qrLocation->kode_lokasi) }}"
                    required
                >

                @error('kode_lokasi')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Latitude
                    </label>

                    <input
                        type="number"
                        step="any"
                        name="latitude"
                        class="form-control"
                        value="{{ old('latitude', $qrLocation->latitude) }}"
                    >

                    @error('latitude')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Longitude
                    </label>

                    <input
                        type="number"
                        step="any"
                        name="longitude"
                        class="form-control"
                        value="{{ old('longitude', $qrLocation->longitude) }}"
                    >

                    @error('longitude')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Radius Absensi
                    </label>

                    <div class="input-group">

                        <input
                            type="number"
                            name="radius"
                            class="form-control"
                            min="1"
                            value="{{ old('radius', $qrLocation->radius) }}"
                            required
                        >

                        <span class="input-group-text">
                            meter
                        </span>

                    </div>

                    @error('radius')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status" class="form-select" required>

                        <option value="Aktif"
                            {{ old('status', $qrLocation->status) == 'Aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="Nonaktif"
                            {{ old('status', $qrLocation->status) == 'Nonaktif' ? 'selected' : '' }}>
                            Nonaktif
                        </option>

                    </select>

                    @error('status')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            <div class="d-flex gap-2 mt-3">

                <a href="{{ route('admin.qr-locations.index') }}"
                   class="btn-back">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>

                <button type="submit" class="btn-purple">
                    <i class="bi bi-save"></i>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>