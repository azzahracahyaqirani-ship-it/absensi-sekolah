<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;


class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $query = Attendance::with([
            'student.schoolClass',
            'qrLocation'
        ]);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->whereHas('student', function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nis', 'like', '%' . $search . '%');
            });
        }

        $attendances = $query
            ->latest()
            ->paginate(10);

        return view('admin.attendance.index', compact('attendances'));
    }
}