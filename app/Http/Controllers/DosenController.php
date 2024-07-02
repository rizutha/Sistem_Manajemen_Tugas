<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Mapel;
use App\Models\Pengumpulan;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::with('user')->paginate(10); // Menggunakan paginate
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        $users = User::where('role', 'dosen')->whereDoesntHave('dosen')->get(); // Hanya pengguna dengan role dosen yang belum ditambahkan ke data dosen
        return view('dosen.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'users_id' => 'required|exists:users,id',
            'codename' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'kontak' => 'required',
            'keilmuan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate NIP otomatis
        $nip = Dosen::count() + 1;

        // Ambil user yang dipilih
        $user = User::find($request->users_id);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = 'FTD' . date('Ymd') . rand() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/dosen', $filename);
        }

        // Simpan data dosen baru
        Dosen::create([
            'users_id' => $user->id,
            'nip' => $nip,
            'nama' => $user->name,
            'codename' => $request->codename,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'email' => $user->email,
            'keilmuan' => $request->keilmuan,
            'foto' => $filename,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.detail', compact('dosen'));
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        $users = User::where('role', 'dosen')->get(); // Mendapatkan semua pengguna dengan role dosen
        return view('dosen.edit', compact('dosen', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'users_id' => 'required|exists:users,id',
            'codename' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'kontak' => 'required',
            'keilmuan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Foto tidak wajib
        ]);

        $dosen = Dosen::findOrFail($id);

        // Ambil user yang dipilih
        $user = User::find($request->users_id);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($dosen->foto) {
                Storage::delete('public/dosen/' . $dosen->foto);
            }

            // Simpan foto baru
            $foto = $request->file('foto');
            $filename = 'FTD' . date('Ymd') . rand() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/dosen', $filename);

            // Perbarui nama file foto di database
            $dosen->foto = $filename;
        }

        // Perbarui data lainnya
        $dosen->update([
            'users_id' => $user->id,
            'nama' => $user->name,
            'codename' => $request->codename,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'email' => $user->email,
            'keilmuan' => $request->keilmuan,
            'foto' => $dosen->foto,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        // Hapus foto jika ada
        if ($dosen->foto) {
            Storage::delete('public/dosen/' . $dosen->foto);
        }
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }

    public function tugas($id)
    {
        $dosen = Dosen::findOrFail($id);
        $tugas = Tugas::where('dosen_id', $id)->get();
        return view('dosen.tugas', compact('dosen', 'tugas'));
    }

    public function pengumpulanTugas()
    {
        $user = Auth::user();
        $tugasDiajar = $user->dosen->tugas;

        $pengumpulan = Pengumpulan::whereIn('id_tugass', $tugasDiajar->pluck('id'))->get();

        return view('dosen.pengumpulan_tugas', compact('pengumpulan'));

        // $pengumpulan = Pengumpulan::where('tugas_id', $idTugas)->get();
        // return view('dosen.pengumpulan_tugas', compact('pengumpulanTugas'));
    }

    // Tambahkan metode lain sesuai kebutuhan
    public function showMahasiswa()
    {
        $dosenId = auth()->user()->dosen->id;

        // Ambil kelas yang diajar oleh dosen tersebut melalui mapel
        $kelasDosen = Kelas::whereHas('mapels', function ($query) use ($dosenId) {
            $query->where('dosen_pengajar', $dosenId);
        })->with('mahasiswas')->get();

        return view('datakelas', compact('kelasDosen'));
    }

    public function detail($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('detailmhs', compact('mahasiswa'));
    }

    public function showProfil()
    {
        $userId = auth()->user()->id;
        $dosen = Dosen::where('users_id', $userId)->first();

        return view('profildsn', compact('dosen'));
    }
}
