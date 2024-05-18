<!-- resources/views/mapel/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
        <div class="d-flex justify-content-between">
            <h2>Data Mata Kuliah</h2>

            <div class="mb-3">
                <a href="{{ route('mapel.create') }}" class="btn btn-primary">Tambah Matkul</a>
            </div>
        </div>

        @if ($mapels->isEmpty())
            <p>Tidak ada data mapel.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Prodi</th>
                        <th>Nama Matkul</th>
                        <th>Nama Dosen Pengajar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapels as $mapel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mapel->kelas->kelas }}</td>
                            <td>{{ $mapel->kelas->prodi }}</td>
                            <td>{{ $mapel->nama_matkul }}</td>
                            <td>{{ $mapel->dosen->nama }}</td>
                            <td>
                                <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus mapel ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
