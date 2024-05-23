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
        $mapels = Mapel::with(['kelas', 'dosen'])->paginate(10);
        return view('mapel.index', compact('mapels'));
    }

    public function create()
    {
        $list_kelas = Kelas::all();
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

        $kelas_id = $request->input('id_kelas'); // Ambil nilai users_id dari dropdown
        $kelas = Kelas::find($kelas_id); // Cari data user berdasarkan ID yang dipilih

        Mapel::create([
            'id_kelas' => $request->id_kelas,
            'dosen_pengajar' => $request->dosen_pengajar,
            'nama_matkul' => $request->nama_matkul,
        ]);

        // Mapel::create($request->all());

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

        return redirect()->route('mapel.index')
            ->with('success', 'Mapel berhasil dihapus.');
    }
}
