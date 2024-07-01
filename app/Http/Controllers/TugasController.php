<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    
    public function index()
    {
        $dosen = Auth::user()->dosen;
        $tugasPerKelas = Tugas::where('id_dosens', $dosen->id)->with(['kelas', 'mapel'])->get()->groupBy('id_kelas');
        return view('tugas.index', compact('tugasPerKelas'));
    }

    public function create()
    {
        $dosen = Auth::user()->dosen;
        $kelas = Kelas::where('wali_kelas', $dosen->id)->get();
        $mapels = Mapel::where('dosen_pengajar', $dosen->id)->get();
        return view('tugas.create', compact('kelas','mapels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_mapel' => 'required|exists:mapels,id',
            // 'pertemuan' => 'required',
            'tgl_buat' => 'required|date',
            'tgl_dl' => 'required|date',
            'file_tugas' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ]);

        $mapel = Mapel::findOrFail($request->id_mapel);
        $kelas = $mapel->kelas; // Pastikan mapel memiliki relasi dengan kelas

        if (!$kelas) {
            return redirect()->back()->with('error', 'Kelas tidak ditemukan untuk mapel tersebut.');
        }

        // Ambil nilai pertemuan terakhir
        $lastPertemuan = Tugas::where('id_kelas', $kelas->id)
                            ->where('id_mapel', $mapel->id)
                            ->orderBy('pertemuan', 'desc')
                            ->value('pertemuan');

        // Tentukan nilai pertemuan baru
        $newPertemuan = $lastPertemuan ? $lastPertemuan + 1 : 1;

        $tugas = new Tugas([
            'id_dosens' => Auth::user()->dosen->id,
            'id_kelas' => $kelas->id,
            'id_mapel' => $request->id_mapel,
            'matkul' => $mapel->nama_matkul,
            'pertemuan' => $newPertemuan,
            'tgl_buat' => $request->tgl_buat,
            'tgl_dl' => $request->tgl_dl,
        ]);

        if ($request->hasFile('file_tugas')) {
            $file = $request->file('file_tugas');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/tugas', $filename);
            $tugas->file_tugas = $filename;
        }

        $tugas->save();

        // Ambil mahasiswa dari kelas yang diambil dari mapel
        foreach ($kelas->mahasiswas as $mahasiswa) {
            Pengumpulan::create([
                'id_tugass' => $tugas->id,
                'id_mahasiswas' => $mahasiswa->id,
                'link_tugas' => null,
                'tgl_pengumpulan' => null,
                'nilai' => null,
                'komentar' => null,
            ]);
        }

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dibuat.');
    }

    public function edit($id)
    {
        $tugas = Tugas::findOrFail($id);
        $dosen = Auth::user()->dosen;
        $kelas = Kelas::where('wali_kelas', $dosen->id)->get();
        $mapels = Mapel::where('dosen_pengajar', $dosen->id)->get();
        return view('tugas.edit', compact('tugas', 'kelas', 'mapels', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mapel' => 'required',
            'pertemuan' => 'required',
            'tgl_buat' => 'required|date',
            'tgl_dl' => 'required|date',
            'file_tugas' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ]);

        $tugas = Tugas::findOrFail($id);

        $filename = $tugas->file_tugas;
        if ($request->hasFile('file_tugas')) {
            if ($filename) {
                Storage::delete('public/tugas/' . $filename);
            }
            $file = $request->file('file_tugas');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/tugas', $filename);
        }

        $tugas->update([
            'id_mapel' => $request->id_mapel,
            'matkul' => Mapel::find($request->id_mapel)->nama_matkul,
            'pertemuan' => $request->pertemuan,
            'tgl_buat' => $request->tgl_buat,
            'tgl_dl' => $request->tgl_dl,
            'file_tugas' => $filename,
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);
        if ($tugas->file_tugas) {
            Storage::delete('public/tugas/' . $tugas->file_tugas);
        }
        $tugas->delete();

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus.');
    }

    // Fungsi untuk melihat daftar tugas bagi mahasiswa yang login
    public function tugasMahasiswa()
    {
        // Mendapatkan mahasiswa yang sedang login
        $mahasiswa = Auth::user()->mahasiswa;

        // Mengambil tugas berdasarkan kelas yang diambil oleh mahasiswa
        $tugass = Tugas::where('id_kelas', $mahasiswa->id_kelas)->get();

        return view('mahasiswa.tugas.index', compact('tugass'));
    }

    // Fungsi untuk melihat form pengumpulan tugas
    public function showTugas(Tugas $tugas)
    {
        return view('mahasiswa.tugas.show', compact('tugas'));
    }

    // Fungsi untuk mengumpulkan tugas
    public function submitTugas(Request $request, Tugas $tugas)
    {
        $request->validate([
            'link_tugas' => 'required|url',
        ]);

        $mahasiswa = Auth::user()->mahasiswa;

        $tugas->mahasiswa()->attach($mahasiswa->id, [
            'link_tugas' => $request->link_tugas,
            'tgl_pengumpulan' => now(),
        ]);

        return redirect()->route('mahasiswa.tugas.index')
            ->with('success', 'Tugas berhasil dikumpulkan.');
    }
    public function datatugas($tugasId)
    {
        $pengumpulans = Pengumpulan::where('id_tugass', $tugasId)->get();
        $tugas = Tugas::findOrFail($tugasId);
        return view('pengumpulan.index', compact('pengumpulans', 'tugas'));
    }
    public function indexdosen($tugasId)
    {
        $dosen = Auth::user()->dosen;
        $pengumpulans = Pengumpulan::where('id_tugass', $tugasId)->with('mahasiswa')->get();
        $tugas = Tugas::findOrFail($tugasId);
        return view('tugas.pengumpulans', compact('pengumpulans', 'tugas'));
    }
    public function getKelas($id)
    {
        $kelas = Kelas::find($id);
        return response()->json($kelas);
    }

}
