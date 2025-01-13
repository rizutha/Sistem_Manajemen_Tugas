@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="px-2">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">
                            {{ $judul }}
                        </h3>
                        <div class="mb-3">
                            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table-striped table" id="table1">
                    <thead>
                        <tr>
                            <th width="50px">No</th>
                            <th class="">NIM</th>
                            <th class="w-25">Nama</th>
                            <th class="w-25">Alamat</th>
                            <th class="">Kelas</th>
                            <th class="">Prodi</th>
                            <th width="200px">Aksi</th>
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
                                    <a href="{{ route('mahasiswa.detail', $row->id) }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('mahasiswa.edit', $row->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
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
            </div>
        </div>
    </section>
@endsection
