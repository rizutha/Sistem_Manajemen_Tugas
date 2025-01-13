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
                            <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Kelas</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table-striped table" id="table1">
                    <thead>
                        <tr>
                            <th width="">No</th>
                            <th width="">Kelas</th>
                            <th width="w-25">Prodi</th>
                            <th width="w-25">Semester</th>
                            <th class="w-25">Wali Kelas</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($queries as $kelas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kelas->kelas }}</td>
                                <td>{{ $kelas->prodi }}</td>
                                <td>{{ $kelas->semester }}</td>
                                <td>{{ $kelas->waliKelas->nama }}</td>
                                <!-- Mengakses nama dosen dengan menggunakan relasi -->
                                <td>
                                    {{-- <a href="{{ route('dosen.show', $dosen->id) }}" class="btn btn-info btn-sm">Detail</a> --}}
                                    <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $queries->links() }}
            </div>
        </div>
    </section>
@endsection
