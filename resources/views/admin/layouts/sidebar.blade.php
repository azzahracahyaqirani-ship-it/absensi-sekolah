<style>
    .sidebar {
    width: 250px;
    height: 100vh;
    background: #ffffff;
    border-right: 1px solid #eee;
    padding: 24px 16px;
    position: fixed;
    left: 0;
    top: 0;
    z-index: 1000;
    overflow-y: auto;
    box-sizing: border-box;
}

.sidebar::-webkit-scrollbar {
    width: 5px;
}

.sidebar::-webkit-scrollbar-thumb {
    background: #ddd;
    border-radius: 10px;
}

.sidebar::-webkit-scrollbar-track {
    background: transparent;
}

    .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 4px 10px 28px;
    }

    .brand-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #f0eaff;
        color: #6f2dbd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .brand-title {
        font-size: 15px;
        font-weight: 700;
        color: #2d2340;
    }

    .brand-subtitle {
        font-size: 12px;
        color: #999;
        margin-top: 2px;
    }

    .menu-title {
        font-size: 10px;
        font-weight: 600;
        color: #aaa;
        letter-spacing: 1px;
        margin: 0 10px 10px;
        text-transform: uppercase;
    }

    .sidebar a {
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
        padding: 11px 12px;
        margin-bottom: 4px;
        border-radius: 10px;
        text-decoration: none;
        color: #666;
        font-size: 14px;
        font-weight: 500;
        transition: 0.2s;
    }

    .sidebar a:hover {
        background: #f5efff;
        color: #6f2dbd;
    }

    .menu-icon {
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        color: #777;
    }

    .sidebar a:hover .menu-icon {
        color: #6f2dbd;
    }

    .sidebar-logout {
    margin-top: 20px;
    padding-top: 15px;
    border-top: 1px solid #eee;
    width: 100%;
}

.sidebar-logout form {
    width: 100%;
}

.sidebar-logout button {
    display: flex;
    align-items: center;
    gap: 12px;
    width: 100%;
    padding: 11px 12px;
    border: none;
    border-radius: 10px;
    background: transparent;
    color: #dc3545;
    font-size: 14px;
    cursor: pointer;
    text-align: left;
}

.sidebar-logout button:hover {
    background: #fff1f1;
}
</style>

<div class="sidebar">

    <div class="brand">
        <div class="brand-icon">
            <i class="bi bi-person-check"></i>
        </div>

        <div>
            <div class="brand-title">Admin Panel</div>
            <div class="brand-subtitle">Absensi Sekolah</div>
        </div>
    </div>

    <div class="menu-title">
        Menu Utama
    </div>

    <a href="{{ route('admin.dashboard') }}">
        <div class="menu-icon">
            <i class="bi bi-speedometer2"></i>
        </div>
        <span>Dashboard</span>
    </a>

    <a href="{{ route('admin.students.index') }}">
        <div class="menu-icon">
            <i class="bi bi-people"></i>
        </div>
        <span>Data Siswa</span>
    </a>

    <a href="{{ route('admin.classes.index') }}">
        <div class="menu-icon">
            <i class="bi bi-building"></i>
        </div>
        <span>Data Kelas</span>
    </a>

    <a href="{{ route('admin.teachers.index') }}">
        <div class="menu-icon">
            <i class="bi bi-person-badge"></i>
        </div>
        <span>Data Guru</span>
    </a>

    <a href="{{ route('admin.schedules.index') }}">
        <div class="menu-icon">
            <i class="bi bi-calendar3"></i>
        </div>
        <span>Jadwal</span>
    </a>

    <a href="{{ route('admin.attendance.index') }}">
        <div class="menu-icon">
            <i class="bi bi-calendar-check"></i>
        </div>
        <span>Data Absensi</span>
    </a>

    <a href="/admin/scanner">
        <div class="menu-icon">
            <i class="bi bi-qr-code-scan"></i>
        </div>
        <span>Scan QR</span>
    </a>

    <a href="/admin/qr-locations">
        <div class="menu-icon">
            <i class="bi bi-geo-alt"></i>
        </div>
        <span>Lokasi QR</span>
    </a>

    <a href="/admin/qr-tokens">
        <div class="menu-icon">
            <i class="bi bi-qr-code"></i>
        </div>
        <span>QR Token</span>
    </a>

    <a href="{{ route('admin.recap.index') }}">
        <div class="menu-icon">
            <i class="bi bi-bar-chart"></i>
        </div>
        <span>Rekap Absensi</span>
    </a>

    <a href="{{ route('admin.scan-history.index') }}">
    <div class="menu-icon">
        <i class="bi bi-clock-history"></i>
    </div>
    <span>Riwayat Scan</span>
</a>

<div class="sidebar-logout">

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf

        <button type="submit">
            <div class="menu-icon">
                <i class="bi bi-box-arrow-right"></i>
            </div>

            <span>Logout</span>
        </button>
    </form>

</div>
</div>
