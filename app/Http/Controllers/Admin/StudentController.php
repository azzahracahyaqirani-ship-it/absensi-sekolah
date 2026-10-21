<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Attendance;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('schoolClass');

        // Pencarian siswa
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nis', 'like', '%' . $search . '%');
            });
        }

        $students = $query->latest()->paginate(10);

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $classes = SchoolClass::orderBy('nama_kelas')->get();

        return view('admin.students.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis',
            'nama' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
        ]);

        Student::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'class_id' => $request->class_id,
        ]);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Student $student)
    {
        $classes = SchoolClass::orderBy('nama_kelas')->get();

        return view('admin.students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis,' . $student->id,
            'nama' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
        ]);

        $student->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'class_id' => $request->class_id,
        ]);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Student $student)
{
    $hasAttendance = Attendance::where('student_id', $student->id)
        ->exists();

    if ($hasAttendance) {
        return redirect()
            ->route('admin.students.index')
            ->with('error', 'Siswa tidak bisa dihapus karena sudah memiliki riwayat absensi.');
    }

    $student->delete();

    return redirect()
        ->route('admin.students.index')
        ->with('success', 'Data siswa berhasil dihapus.');
}
}