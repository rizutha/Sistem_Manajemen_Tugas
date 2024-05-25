@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <div class="d-flex justify-content-between">
            <h4>Data Mahasiswa</h4>
            <div class="mb-2">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-2">Tambah Mahasiswa</a>
            </div>
        </div>

        @if ($mahasiswas->isEmpty())
            <p>Tidak ada data mahasiswa.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th width="125px">NIM</th>
                        <th width="250px">Nama</th>
                        <th width="100px">Alamat</th>
                        <th width="125px">Kelas</th>
                        <th width="250px">Prodi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $mahasiswa => $row)
                        <tr>
                            <td>{{ $mahasiswas->firstItem() + $mahasiswa }}</td>
                            <td>{{ $row->nim }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->kelas->kelas }}</td>
                            <td>{{ $row->kelas->prodi }}</td>
                            <td>
                                <a href="{{ route('mahasiswa.detail', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('mahasiswa.edit', $row->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('mahasiswa.destroy', $row->id) }}" method="POST"
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
