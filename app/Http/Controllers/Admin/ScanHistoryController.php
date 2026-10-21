<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class ScanHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Attendance::with([
            'student.schoolClass',
            'qrLocation'
        ]);

        // Filter pencarian siswa
        if ($request->search) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('nis', 'like', '%' . $request->search . '%')
                  ->orWhere('nama', 'like', '%' . $request->search . '%');
            });
        }

        // Filter tanggal
        if ($request->tanggal) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $histories = $query
            ->latest('tanggal')
            ->latest('waktu')
            ->paginate(15)
            ->withQueryString();

        return view('admin.scan-history.index', compact('histories'));
    }
}