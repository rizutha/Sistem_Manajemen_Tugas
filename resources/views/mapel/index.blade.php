<!-- resources/views/mapel/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
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
                        <th width="50px">No</th>
                        <th width="125px">Kelas</th>
                        <th width="250px">Prodi</th>
                        <th width="250px">Nama Matkul</th>
                        <th width="250px">Nama Dosen Pengajar</th>
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
                                <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus mapel ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
