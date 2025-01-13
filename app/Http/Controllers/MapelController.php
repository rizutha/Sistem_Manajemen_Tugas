<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::with(['kelas', 'dosen'])
            ->join('kelass', 'mapels.id_kelas', '=', 'kelass.id')
            ->orderBy('kelass.kelas', 'asc')
            ->select('mapels.*')
            ->paginate(10);

        return view('mapel.index', ['judul' => 'Data Mata Kuliah'], compact('mapels'));
    }

    public function create()
    {
        $list_kelas = Kelas::orderBy('semester', 'asc')->get();
        $list_dosen = Dosen::all();
        return view('mapel.create', compact('list_kelas', 'list_dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required',
            'dosen_pengajar' => 'required',
            'nama_matkul' => 'required',
        ]);

        $kelas_id = $request->input('id_kelas');
        $kelas = Kelas::find($kelas_id);

        Mapel::create([
            'id_kelas' => $request->id_kelas,
            'prodi' => $kelas->prodi,
            'dosen_pengajar' => $request->dosen_pengajar,
            'nama_matkul' => $request->nama_matkul,
        ]);

        return redirect()->route('mapel.index')
            ->with('success', 'Mapel berhasil ditambahkan.');
    }

    public function edit(Mapel $mapel)
    {
        $list_kelas = Kelas::all();
        $list_dosen = Dosen::all();
        return view('mapel.edit', compact('mapel', 'list_kelas', 'list_dosen'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'id_kelas' => 'required',
            'dosen_pengajar' => 'required',
            'nama_matkul' => 'required',
        ]);

        $mapel->update($request->all());
        return redirect()->route('mapel.index')
            ->with('success', 'Mapel berhasil diperbarui.');
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        notify()->success('Data berhasil dihapus!');
        return redirect()->route('mapel.index')
            ->with('success', 'Mapel berhasil dihapus.');
    }

    // Contoh penggunaan Polymorphism dan Overloading
    public function showDetails($id)
    {
        $mapel = Mapel::findOrFail($id);
        $description = $mapel->getDescription();
        $details = $mapel->getDetails('nama_matkul', 'prodi');

        return response()->json([
            'description' => $description,
            'details' => $details,
        ]);
    }
}
