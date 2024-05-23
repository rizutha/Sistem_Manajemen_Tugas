@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 p-5">
        <div class="d-flex justify-content-between">
            <h2>Data Mahasiswa</h2>
            <div class="mb-3">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
            </div>
        </div>

        @if ($mahasiswas->isEmpty())
            <p>Tidak ada data mahasiswa.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kelas</th>
                        <th>Prodi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $mahasiswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa->alamat }}</td>
                            <td>{{ $mahasiswa->kelas->kelas }}</td>
                            <td>{{ $mahasiswa->kelas->prodi }}</td>
                            <td>
                                <a href="{{ route('mahasiswa.detail', $mahasiswa->id) }}"
                                    class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $mahasiswas->links() }}
        @endif
    </div>
@endsection
