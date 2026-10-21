<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolClass;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        $query = SchoolClass::withCount('students');

        // Pencarian kelas
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where('nama_kelas', 'like', '%' . $search . '%');
        }

        $classes = $query
            ->orderBy('nama_kelas')
            ->paginate(10);

        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100|unique:classes,nama_kelas',
        ]);

        SchoolClass::create([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit(SchoolClass $class)
    {
        return view('admin.classes.edit', compact('class'));
    }

    public function update(Request $request, SchoolClass $class)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100|unique:classes,nama_kelas,' . $class->id,
        ]);

        $class->update([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy(SchoolClass $class)
    {
        // Cek apakah kelas masih memiliki siswa
        if ($class->students()->count() > 0) {
            return redirect()
                ->route('admin.classes.index')
                ->with('error', 'Kelas tidak bisa dihapus karena masih memiliki siswa.');
        }

        $class->delete();

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}