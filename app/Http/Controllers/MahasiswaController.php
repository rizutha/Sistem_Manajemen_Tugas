<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('user', 'kelas')->paginate(10); // Ubah menjadi paginate()
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $users = User::where('role', 'mahasiswa')->whereDoesntHave('mahasiswa')->get(); // Hanya pengguna dengan role dosen yang belum ditambahkan ke data dosen

        // $users = User::where('role', 'mahasiswa')->get();
        $kelas = Kelas::all();
        return view('mahasiswa.create', compact('users', 'kelas'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date',
            'kontak' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Logika untuk menentukan NIM otomatis
        $nim = Mahasiswa::count() + 1;

        // Pemanggilan Nama dari Tabel User
        $user_id = $request->input('users_id'); // Ambil nilai users_id dari dropdown
        $user = User::find($user_id); // Cari data user berdasarkan ID yang dipilih

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = 'FTM' . date('Ymd') . rand() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/mahasiswa/' . $filename);
        }
        // Simpan data mahasiswa baru
        Mahasiswa::create([
            'users_id' => $user->id,
            'id_kelas' => $request->id_kelas,
            'nim' => $nim,
            'nama' => $user->name, // Gunakan nama dari user yang dipilih
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'kontak' => $request->kontak,
            'email' => $user->email, // Gunakan email dari user yang dipilih
            'foto' => $filename,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.detail', compact('mahasiswa'));
    }


    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $kelas = Kelas::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required',
            'tgl_lahir' => 'required|date',
            'kontak' => 'required',
            'id_kelas' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Foto tidak wajib
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($mahasiswa->foto) {
                Storage::delete('public/mahasiswa/' . $mahasiswa->foto);
            }

            // Simpan foto baru
            $foto = $request->file('foto');
            $filename = 'FTM' . date('Ymd') . rand() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/mahasiswa', $filename);

            // Perbarui nama file foto di database
            $mahasiswa->foto = $filename;
        }

        // Perbarui data lainnya
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        $mahasiswa->kontak = $request->kontak;
        $mahasiswa->id_kelas = $request->id_kelas;
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }



    public function dataMhs()
    {
        $query = Mahasiswa::orderBy('id', 'asc')->paginate(5);
        return view('datamhs', ['queries' => $query]);
    }
    public function detail($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('detailmhs', compact('mahasiswa'));
    }
    public function showProfil()
    {
        $auth = auth()->user()->id;
        $mahasiswa = Mahasiswa::where('users_id', $auth)->first();
        return view('profilmhs', compact('mahasiswa'));
    }
}
