<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Dosen;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $query = Kelas::orderBy('id', 'asc')->paginate(5);
        return view('kelas.index', ['queries' => $query]);
    }

    public function create()
    {
        $list_dosen = Dosen::all(); // Ambil semua data dosen dari database
        return view('kelas.create', compact('list_dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required',
            'prodi' => 'required',
            'semester' => 'required',
            'wali_kelas' => 'required|exists:dosens,id', // Pastikan wali kelas yang dipilih adalah ID yang valid dari tabel dosens
        ], [
            'kelas.required' => 'Kolom Kelas tidak boleh kosong',
            'prodi.required' => 'Kolom Prodi tidak boleh kosong',
            'semester.required' => 'Kolom Semester tidak boleh kosong',
            'wali_kelas.required' => 'Kolom Wali Kelas tidak boleh kosong',
            'wali_kelas.exists' => 'Wali kelas yang dipilih tidak valid',
        ]);

        // Simpan data kelas bersama dengan ID dosen sebagai wali kelas
        Kelas::create([
            'kelas' => $request->kelas,
            'prodi' => $request->prodi,
            'semester' => $request->semester,
            'wali_kelas' => $request->wali_kelas,
        ]);

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas sudah berhasil disimpan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $list_dosen = Dosen::all();
        return view('kelas.edit', compact('kelas', 'list_dosen')); // Memasukkan variabel $list_dosen ke dalam view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas' => 'required',
            'prodi' => 'required',
            'semester' => 'required',
            'wali_kelas' => 'required|exists:dosens,id', // Pastikan wali kelas yang dipilih adalah ID yang valid dari tabel dosens
        ], [
            'kelas.required' => 'Kolom Kelas tidak boleh kosong',
            'prodi.required' => 'Kolom Prodi tidak boleh kosong',
            'semester.required' => 'Kolom Semester tidak boleh kosong',
            'wali_kelas.required' => 'Kolom Wali Kelas tidak boleh kosong',
            'wali_kelas.exists' => 'Wali kelas yang dipilih tidak valid',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'kelas' => $request->kelas,
            'prodi' => $request->prodi,
            'semester' => $request->semester,
            'wali_kelas' => $request->wali_kelas,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Dosen berhasil dihapus');
    }
}
