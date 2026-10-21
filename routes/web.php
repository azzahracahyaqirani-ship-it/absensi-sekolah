<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\QrLocationController;
use App\Http\Controllers\Admin\QrTokenController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\RecapController;
use App\Http\Controllers\Admin\ScanHistoryController;
use App\Http\Controllers\StudentAuthController;
use Illuminate\Support\Facades\Auth;

use App\Models\Student;
use App\Models\Attendance;
use App\Models\QrToken;
use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/absen/{token}', function ($token) {
    return view('attendance.scan', compact('token'));
})->name('attendance.scan');

Route::post('/absen/{token}', function ($token) {
    $nis = request('nis');

    $student = Student::where('nis', $nis)->first();

if (!$student) {
    return back()->with('error', 'NIS tidak ditemukan. NIS yang dikirim: ' . $nis);
}

  $qrToken = QrToken::where('token', $token)
    ->where('status', 'Aktif')
    ->first();

if (!$qrToken) {
    return back()->with('error', 'QR Token tidak valid atau statusnya bukan Aktif.');
}

/*
|--------------------------------------------------------------------------
| CEK WAKTU QR TOKEN
|--------------------------------------------------------------------------
*/

$sekarang = Carbon::now();

$mulai = Carbon::parse(
    $qrToken->tanggal . ' ' . $qrToken->waktu_mulai
);

$berakhir = Carbon::parse(
    $qrToken->tanggal . ' ' . $qrToken->waktu_berakhir
);

if ($sekarang->lt($mulai)) {
    return back()->with(
        'error',
        'QR belum bisa digunakan. Absensi dimulai pukul ' .
        Carbon::parse($qrToken->waktu_mulai)->format('H:i')
    );
}

if ($sekarang->gt($berakhir)) {
    return back()->with(
        'error',
        'QR sudah tidak berlaku. Absensi berakhir pukul ' .
        Carbon::parse($qrToken->waktu_berakhir)->format('H:i')
    );
}

$alreadyAttend = Attendance::where('student_id', $student->id)
    ->where('tanggal', Carbon::today()->toDateString())
    ->where('qr_location_id', $qrToken->qr_location_id)
    ->exists();

if ($alreadyAttend) {
    return back()->with(
        'error',
        'Kamu sudah melakukan absensi hari ini.'
    );
}

    Attendance::create([
        'student_id' => $student->id,
        'tanggal' => Carbon::today()->toDateString(),
        'waktu' => Carbon::now()->format('H:i:s'),
        'status' => 'Hadir',
        'qr_location_id' => $qrToken->qr_location_id,
        'token' => $token,
    ]);

    return view('attendance.success', [
        'token' => $token,
        'nis' => $nis,
    ]);
})->name('attendance.submit');

/*
|--------------------------------------------------------------------------
| LOGIN SISWA
|--------------------------------------------------------------------------
*/

Route::get('/student/login', [StudentAuthController::class, 'login'])
    ->name('student.login');

Route::post('/student/login', [StudentAuthController::class, 'authenticate'])
    ->name('student.authenticate');

Route::post('/student/logout', [StudentAuthController::class, 'logout'])
    ->name('student.logout');

Route::get('/student/dashboard', function () {

    if (!Auth::check() || Auth::user()->role !== 'siswa') {
        return redirect()->route('student.login');
    }

    $student = Auth::user()->student;

    if (!$student) {
        Auth::logout();

        return redirect()
            ->route('student.login')
            ->with('error', 'Data siswa tidak ditemukan.');
    }

    return view('student.dashboard', compact('student'));

})->name('student.dashboard');

Route::get('/student/scan', function () {
    return view('student.scan');
})->name('student.scan');

Route::get('/student/absen/{token}', function ($token) {

    $student = Auth::user()->student;

    if (!$student) {
        return redirect()
            ->route('student.dashboard')
            ->with('error', 'Data siswa tidak ditemukan.');
    }

    $qrToken = QrToken::where('token', $token)
        ->where('status', 'Aktif')
        ->first();

    if (!$qrToken) {
        return redirect()
            ->route('student.scan')
            ->with('error', 'QR Token tidak valid atau sudah tidak aktif.');
    }

    $now = Carbon::now();

    $mulai = Carbon::parse(
        $qrToken->tanggal . ' ' . $qrToken->waktu_mulai
    );

    $berakhir = Carbon::parse(
        $qrToken->tanggal . ' ' . $qrToken->waktu_berakhir
    );

    if (!$now->between($mulai, $berakhir)) {
        return redirect()
            ->route('student.scan')
            ->with('error', 'QR belum bisa digunakan pada waktu ini.');
    }

    $sudahAbsen = Attendance::where('student_id', $student->id)
        ->whereDate('tanggal', $now->toDateString())
        ->where('qr_location_id', $qrToken->qr_location_id)
        ->exists();

    if ($sudahAbsen) {
        return redirect()
            ->route('student.scan')
            ->with('error', 'Kamu sudah melakukan absensi hari ini.');
    }

    Attendance::create([
        'student_id' => $student->id,
        'tanggal' => $now->toDateString(),
        'waktu' => $now->format('H:i:s'),
        'status' => 'Hadir',
        'qr_location_id' => $qrToken->qr_location_id,
        'token' => $qrToken->token,
    ]);

    return redirect()
        ->route('student.dashboard')
        ->with('success', 'Absensi berhasil! Selamat, kamu tercatat hadir.');
})->name('student.absen');

Route::get('/student/attendance-today', function () {
    $student = Auth::user()->student;

    $attendance = Attendance::where('student_id', $student->id)
        ->whereDate('tanggal', Carbon::today())
        ->latest('waktu')
        ->first();

    return view('student.attendance-today', compact(
        'student',
        'attendance'
    ));
})->name('student.attendance.today');
/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'authenticate'])
    ->name('admin.authenticate');

Route::post('/admin/logout', [AdminController::class, 'logout'])
    ->name('admin.logout');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {

Route::get('/admin/scan-history', [ScanHistoryController::class, 'index'])
    ->name('admin.scan-history.index');

Route::get('/admin/recap/print', [RecapController::class, 'print'])
    ->name('admin.recap.print');

Route::get('/admin/recap', [RecapController::class, 'index'])
    ->name('admin.recap.index');

Route::resource('/admin/teachers', TeacherController::class)
    ->names('admin.teachers');

Route::get('/admin/scanner', function () {
    return view('admin.scanner.index');
})->name('admin.scanner');

Route::resource('/admin/schedules', ScheduleController::class)
    ->names('admin.schedules');

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | DATA SISWA
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/students', [StudentController::class, 'index'])
        ->name('admin.students.index');

    Route::get('/admin/students/create', [StudentController::class, 'create'])
        ->name('admin.students.create');

    Route::post('/admin/students', [StudentController::class, 'store'])
        ->name('admin.students.store');

    Route::get('/admin/students/{student}/edit', [StudentController::class, 'edit'])
        ->name('admin.students.edit');

    Route::put('/admin/students/{student}', [StudentController::class, 'update'])
        ->name('admin.students.update');

    Route::delete('/admin/students/{student}', [StudentController::class, 'destroy'])
        ->name('admin.students.destroy');


    /*
    |--------------------------------------------------------------------------
    | DATA KELAS
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/classes', [ClassController::class, 'index'])
        ->name('admin.classes.index');

    Route::get('/admin/classes/create', [ClassController::class, 'create'])
        ->name('admin.classes.create');

    Route::post('/admin/classes', [ClassController::class, 'store'])
        ->name('admin.classes.store');

    Route::get('/admin/classes/{class}/edit', [ClassController::class, 'edit'])
        ->name('admin.classes.edit');

    Route::put('/admin/classes/{class}', [ClassController::class, 'update'])
        ->name('admin.classes.update');

    Route::delete('/admin/classes/{class}', [ClassController::class, 'destroy'])
        ->name('admin.classes.destroy');


    /*
    |--------------------------------------------------------------------------
    | DATA ABSENSI
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/attendance', [AttendanceController::class, 'index'])
        ->name('admin.attendance.index');


    /*
    |--------------------------------------------------------------------------
    | LOKASI QR
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/qr-locations', [QrLocationController::class, 'index'])
        ->name('admin.qr-locations.index');

    Route::get('/admin/qr-locations/create', [QrLocationController::class, 'create'])
        ->name('admin.qr-locations.create');

    Route::post('/admin/qr-locations', [QrLocationController::class, 'store'])
        ->name('admin.qr-locations.store');

    Route::get('/admin/qr-locations/{qrLocation}/edit', [QrLocationController::class, 'edit'])
        ->name('admin.qr-locations.edit');

    Route::put('/admin/qr-locations/{qrLocation}', [QrLocationController::class, 'update'])
        ->name('admin.qr-locations.update');

    Route::delete('/admin/qr-locations/{qrLocation}', [QrLocationController::class, 'destroy'])
        ->name('admin.qr-locations.destroy');


    /*
    |--------------------------------------------------------------------------
    | QR TOKEN
    |--------------------------------------------------------------------------
    */

Route::get('/admin/qr-tokens', [QrTokenController::class, 'index'])
    ->name('admin.qr-tokens.index');

Route::get('/admin/qr-tokens/create', [QrTokenController::class, 'create'])
    ->name('admin.qr-tokens.create');

Route::post('/admin/qr-tokens', [QrTokenController::class, 'store'])
    ->name('admin.qr-tokens.store');

Route::get('/admin/qr-tokens/{qrToken}/edit', [QrTokenController::class, 'edit'])
    ->name('admin.qr-tokens.edit');

Route::put('/admin/qr-tokens/{qrToken}', [QrTokenController::class, 'update'])
    ->name('admin.qr-tokens.update');

Route::delete('/admin/qr-tokens/{qrToken}', [QrTokenController::class, 'destroy'])
    ->name('admin.qr-tokens.destroy');

Route::get('/admin/qr-tokens/{qrToken}', [QrTokenController::class, 'show'])
    ->name('admin.qr-tokens.show');

});