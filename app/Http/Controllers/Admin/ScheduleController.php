<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with([
            'schoolClass',
            'teacher'
        ])->latest()->paginate(10);

        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $classes = SchoolClass::orderBy('nama_kelas')->get();
        $teachers = Teacher::orderBy('nama')->get();

        return view('admin.schedules.create', compact(
            'classes',
            'teachers'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'teacher_id' => 'required|exists:teachers,id',
            'mata_pelajaran' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        Schedule::create($request->all());

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Schedule $schedule)
    {
        $classes = SchoolClass::orderBy('nama_kelas')->get();
        $teachers = Teacher::orderBy('nama')->get();

        return view('admin.schedules.edit', compact(
            'schedule',
            'classes',
            'teachers'
        ));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'teacher_id' => 'required|exists:teachers,id',
            'mata_pelajaran' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $schedule->update($request->all());

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}