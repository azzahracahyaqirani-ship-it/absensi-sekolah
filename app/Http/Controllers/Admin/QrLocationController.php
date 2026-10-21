<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QrLocation;
use Illuminate\Http\Request;

class QrLocationController extends Controller
{
    public function index(Request $request)
    {
        $query = QrLocation::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_lokasi', 'like', '%' . $search . '%')
                  ->orWhere('kode_lokasi', 'like', '%' . $search . '%');
            });
        }

        $locations = $query
            ->latest()
            ->paginate(10);

        return view('admin.qr_locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.qr_locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:100',
            'kode_lokasi' => 'required|string|max:100|unique:qr_locations,kode_lokasi',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'radius' => 'required|numeric|min:1',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        QrLocation::create([
            'nama_lokasi' => $request->nama_lokasi,
            'kode_lokasi' => $request->kode_lokasi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'radius' => $request->radius,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.qr-locations.index')
            ->with('success', 'Lokasi QR berhasil ditambahkan.');
    }

    public function edit(QrLocation $qrLocation)
    {
        return view('admin.qr_locations.edit', compact('qrLocation'));
    }

    public function update(Request $request, QrLocation $qrLocation)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:100',
            'kode_lokasi' => 'required|string|max:100|unique:qr_locations,kode_lokasi,' . $qrLocation->id,
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'radius' => 'required|numeric|min:1',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $qrLocation->update([
            'nama_lokasi' => $request->nama_lokasi,
            'kode_lokasi' => $request->kode_lokasi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'radius' => $request->radius,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.qr-locations.index')
            ->with('success', 'Lokasi QR berhasil diperbarui.');
    }

    public function destroy(QrLocation $qrLocation)
    {
        if ($qrLocation->qrTokens()->count() > 0) {
            return redirect()
                ->route('admin.qr-locations.index')
                ->with('error', 'Lokasi tidak dapat dihapus karena sudah memiliki QR Token.');
        }

        $qrLocation->delete();

        return redirect()
            ->route('admin.qr-locations.index')
            ->with('success', 'Lokasi QR berhasil dihapus.');
    }
}