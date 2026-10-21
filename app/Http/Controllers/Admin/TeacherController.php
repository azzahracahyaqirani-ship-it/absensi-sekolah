<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);

        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:teachers,nip',
            'nama' => 'required',
            'email' => 'nullable|email',
            'no_hp' => 'nullable',
            'mata_pelajaran' => 'nullable',
        ]);

        Teacher::create($request->all());

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'nip' => 'required|unique:teachers,nip,' . $teacher->id,
            'nama' => 'required',
            'email' => 'nullable|email',
            'no_hp' => 'nullable',
            'mata_pelajaran' => 'nullable',
        ]);

        $teacher->update($request->all());

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}