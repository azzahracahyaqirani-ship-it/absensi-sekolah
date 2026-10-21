<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit QR Token - Admin</title>

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

        /* SIDEBAR */

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

        /* LOGOUT */

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
        }

        /* MAIN */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* NAVBAR */

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

        /* CONTENT */

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

        /* CARD */

        .card-custom {
            background: #ffffff;
            border: 1px solid #eeeaf5;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(100, 90, 150, 0.04);
        }

        /* TOKEN BOX */

        .token-box {
            background: #f6f3ff;
            border-radius: 13px;
            padding: 15px 17px;
            margin-bottom: 25px;
        }

        .token-label {
            font-size: 11px;
            color: #aaa5b8;
            margin-bottom: 5px;
        }

        .token-value {
            font-size: 13px;
            font-weight: 600;
            color: #6d5bc4;
            word-break: break-all;
            font-family: monospace;
        }

        /* FORM */

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #5d576c;
            margin-bottom: 8px;
        }

        .required {
            color: #d86666;
        }

        .form-control,
        .form-select {
            height: 44px;
            border: 1px solid #e5e1f2;
            border-radius: 11px;
            font-size: 13px;
            color: #403a55;
            padding: 10px 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #8b7cf6;
            box-shadow: 0 0 0 3px rgba(139, 124, 246, 0.12);
        }

        .form-text {
            font-size: 11px;
            color: #aaa5b8;
        }

        /* BUTTON */

        .btn-purple {
            height: 42px;
            background: #8576ef;
            color: #ffffff;
            border: none;
            border-radius: 11px;
            padding: 0 18px;
            font-size: 13px;
            font-weight: 500;
        }

        .btn-purple:hover {
            background: #7161dc;
            color: #ffffff;
        }

        .btn-cancel {
            height: 42px;
            background: #f3f1f8;
            color: #716b7e;
            border: none;
            border-radius: 11px;
            padding: 0 18px;
            font-size: 13px;
        }

        .btn-cancel:hover {
            background: #eae7f1;
            color: #5f596f;
        }

        .alert {
            border: none;
            border-radius: 12px;
            font-size: 13px;
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
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->

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


<!-- MAIN -->

<div class="main">

    <!-- NAVBAR -->

    <div class="navbar-admin">

        <div class="navbar-title">

            <h1>Edit QR Token</h1>

            <p>Perbarui data QR Token absensi</p>

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

            <h2>Edit QR Token</h2>

            <p>
                Ubah informasi QR Token sesuai kebutuhan.
            </p>

        </div>


        @if($errors->any())

            <div class="alert alert-danger mb-4">

                <i class="bi bi-exclamation-circle me-1"></i>

                <strong>Periksa kembali data yang diisi.</strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div class="card-custom">

            <!-- TOKEN -->

            <div class="token-box">

                <div class="token-label">
                    Token QR
                </div>

                <div class="token-value">
                    {{ $qrToken->token }}
                </div>

            </div>


            <form
                action="{{ route('admin.qr-tokens.update', $qrToken->id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <div class="row g-4">

                    <!-- LOKASI -->

                    <div class="col-md-6">

                        <label class="form-label">

                            Lokasi QR
                            <span class="required">*</span>

                        </label>

                        <select
                            name="qr_location_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                -- Pilih Lokasi --
                            </option>

                            @foreach($locations as $location)

                                <option
                                    value="{{ $location->id }}"
                                    {{ old('qr_location_id', $qrToken->qr_location_id) == $location->id ? 'selected' : '' }}
                                >

                                    {{ $location->nama_lokasi }}

                                    ({{ $location->kode_lokasi }})

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- TANGGAL -->

                    <div class="col-md-6">

                        <label class="form-label">

                            Tanggal
                            <span class="required">*</span>

                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            class="form-control"
                            value="{{ old('tanggal', $qrToken->tanggal) }}"
                            required
                        >

                    </div>


                    <!-- WAKTU MULAI -->

                    <div class="col-md-6">

                        <label class="form-label">

                            Waktu Mulai
                            <span class="required">*</span>

                        </label>

                        <input
                            type="time"
                            name="waktu_mulai"
                            class="form-control"
                            value="{{ old('waktu_mulai', $qrToken->waktu_mulai) }}"
                            required
                        >

                        <div class="form-text">
                            Waktu mulai token dapat digunakan.
                        </div>

                    </div>


                    <!-- WAKTU BERAKHIR -->

                    <div class="col-md-6">

                        <label class="form-label">

                            Waktu Berakhir
                            <span class="required">*</span>

                        </label>

                        <input
                            type="time"
                            name="waktu_berakhir"
                            class="form-control"
                            value="{{ old('waktu_berakhir', $qrToken->waktu_berakhir) }}"
                            required
                        >

                        <div class="form-text">
                            Harus lebih dari waktu mulai.
                        </div>

                    </div>


                    <!-- STATUS -->

                    <div class="col-md-6">

                        <label class="form-label">

                            Status
                            <span class="required">*</span>

                        </label>

                        <select
                            name="status"
                            class="form-select"
                            required
                        >

                            <option
                                value="Aktif"
                                {{ old('status', $qrToken->status) == 'Aktif' ? 'selected' : '' }}
                            >
                                Aktif
                            </option>

                            <option
                                value="Nonaktif"
                                {{ old('status', $qrToken->status) == 'Nonaktif' ? 'selected' : '' }}
                            >
                                Nonaktif
                            </option>

                        </select>

                    </div>

                </div>


                <!-- BUTTON -->

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

                    <a
                        href="{{ route('admin.qr-tokens.index') }}"
                        class="btn btn-cancel"
                    >

                        <i class="bi bi-arrow-left me-1"></i>
                        Batal

                    </a>


                    <button
                        type="submit"
                        class="btn btn-purple"
                    >

                        <i class="bi bi-check2-circle me-1"></i>
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>