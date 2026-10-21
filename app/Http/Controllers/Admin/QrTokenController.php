<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QrToken;
use App\Models\QrLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QrTokenController extends Controller
{
    public function index(Request $request)
    {
        $query = QrToken::with('qrLocation');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('token', 'like', '%' . $search . '%')
                  ->orWhereHas('qrLocation', function ($location) use ($search) {
                      $location->where('nama_lokasi', 'like', '%' . $search . '%');
                  });
            });
        }

        $tokens = $query
            ->latest()
            ->paginate(10);

        return view('admin.qr_tokens.index', compact('tokens'));
    }

    public function create()
    {
        $locations = QrLocation::where('status', 'Aktif')
            ->orderBy('nama_lokasi')
            ->get();

        return view('admin.qr_tokens.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'qr_location_id' => 'required|exists:qr_locations,id',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_berakhir' => 'required|after:waktu_mulai',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        QrToken::create([
            'qr_location_id' => $request->qr_location_id,
            'token' => Str::random(32),
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_berakhir' => $request->waktu_berakhir,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.qr-tokens.index')
            ->with('success', 'QR Token berhasil dibuat.');
    }

    public function edit(QrToken $qrToken)
    {
        $locations = QrLocation::where('status', 'Aktif')
            ->orderBy('nama_lokasi')
            ->get();

        return view('admin.qr_tokens.edit', compact('qrToken', 'locations'));
    }

    public function update(Request $request, QrToken $qrToken)
    {
        $request->validate([
            'qr_location_id' => 'required|exists:qr_locations,id',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_berakhir' => 'required|after:waktu_mulai',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $qrToken->update([
            'qr_location_id' => $request->qr_location_id,
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_berakhir' => $request->waktu_berakhir,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.qr-tokens.index')
            ->with('success', 'QR Token berhasil diperbarui.');
    }

    public function destroy(QrToken $qrToken)
    {
        $qrToken->delete();

        return redirect()
            ->route('admin.qr-tokens.index')
            ->with('success', 'QR Token berhasil dihapus.');
    }

    public function show(QrToken $qrToken)
{
    $qrToken->load('qrLocation');

    return view('admin.qr_tokens.show', compact('qrToken'));
}
}