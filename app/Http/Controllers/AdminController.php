<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Attendance;
use App\Models\QrLocation;
use App\Models\QrToken;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function dashboard()
{
    $totalSiswa = Student::count();
    $totalKelas = SchoolClass::count();
    $totalAbsensi = Attendance::count();
    $totalLokasi = QrLocation::count();
    $qrAktif = QrToken::where('status', 'Aktif')->count();

    $absensiTerbaru = Attendance::with(['student.schoolClass', 'qrLocation'])
        ->latest()
        ->take(5)
        ->get();

    return view('admin.dashboard', compact(
        'totalSiswa',
        'totalKelas',
        'totalAbsensi',
        'totalLokasi',
        'qrAktif',
        'absensiTerbaru'
    ));
}
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}