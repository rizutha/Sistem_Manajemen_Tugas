<?php

namespace App\Http\Controllers;

use App\Models\Pengumpulan;
use App\Models\Mahasiswa;
use App\Models\Tugas;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumpulanController extends Controller
{

    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $pengumpulans = Pengumpulan::where('id_mahasiswas', $mahasiswa->id)->with('tugas')->get();
        return view('pengumpulan.index', compact('pengumpulans'));
    }

    public function edit($id)
    {
        $pengumpulan = Pengumpulan::find($id);
        return view('pengumpulan.edit', compact('pengumpulan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'link_tugas' => 'required|url',
        ]);

        $pengumpulan = Pengumpulan::findOrFail($id);

        // Pastikan hanya mahasiswa yang bersangkutan yang bisa mengupdate
        if ($pengumpulan->id_mahasiswas != Auth::user()->mahasiswa->id) {
            return redirect()->back()->with('error', 'Anda tidak berhak mengubah pengumpulan ini.');
        }

        $pengumpulan->update([
            'link_tugas' => $request->link_tugas,
            'tgl_pengumpulan' => now(),
        ]);

        return redirect()->route('pengumpulan.index')->with('success', 'Tugas berhasil dikumpulkan.');
    }
    public function editnilai($id)
    {
        $pengumpulan = Pengumpulan::findOrFail($id);
        return view('pengumpulan.edit', compact('pengumpulan'));
    }

    public function dosenUpdate(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nilai' => 'required|numeric',
            'komentar' => 'nullable|string'
        ]);

        // Temukan pengumpulan berdasarkan ID
        $pengumpulan = Pengumpulan::findOrFail($id);

        // Update nilai dan komentar
        $pengumpulan->nilai = $request->input('nilai');
        $pengumpulan->komentar = $request->input('komentar');
        $pengumpulan->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Nilai dan komentar berhasil diperbarui');
    }
    public function indexdosen($tugasId)
    {
        $dosen = Auth::user()->dosen;
        $pengumpulans = Pengumpulan::where('id_tugass', $tugasId)->get();
        $tugas = Tugas::findOrFail($tugasId);
        return view('tugas.pengumpulans', compact('pengumpulans', 'tugas'));
    }

}