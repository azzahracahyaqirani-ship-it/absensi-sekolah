<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class RecapController extends Controller
{
    public function index(Request $request)
    {
        $classes = SchoolClass::orderBy('nama_kelas')->get();

        $query = Attendance::with([
            'student.schoolClass'
        ]);

        if ($request->class_id) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('class_id', $request->class_id);
            });
        }

        if ($request->tanggal_mulai) {
            $query->whereDate('tanggal', '>=', $request->tanggal_mulai);
        }

        if ($request->tanggal_selesai) {
            $query->whereDate('tanggal', '<=', $request->tanggal_selesai);
        }

        $attendances = $query
            ->latest('tanggal')
            ->latest('waktu')
            ->get();

        return view('admin.recap.index', compact(
            'attendances',
            'classes'
        ));
    }

    public function print(Request $request)
    {
        $query = Attendance::with([
            'student.schoolClass'
        ]);

        if ($request->class_id) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('class_id', $request->class_id);
            });
        }

        if ($request->tanggal_mulai) {
            $query->whereDate('tanggal', '>=', $request->tanggal_mulai);
        }

        if ($request->tanggal_selesai) {
            $query->whereDate('tanggal', '<=', $request->tanggal_selesai);
        }

        $attendances = $query
            ->latest('tanggal')
            ->latest('waktu')
            ->get();

        return view('admin.recap.print', compact('attendances'));
    }
}