@extends('layouts.app')

@section('content')
<div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
<div class="d-flex justify-content-between">
<div class="container">
    <h1>Daftar Tugas</h1>
    <a href="{{ route('tugas.create') }}" class="btn btn-primary mb-3">Buat Tugas Baru</a>
    {{-- <a href="{{ route('tugas.pengumpulans') }}" class="btn btn-primary mb-3">Buat Tugas Baru</a> --}}
 
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Pertemuan</th>
                <th>Tanggal Buat</th>
                <th>Tanggal Deadline</th>
                <th>File Tugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tugass as $tugas)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tugas->kelas->kelas }}</td>
                    <td>{{ $tugas->mapel->nama_matkul }}</td>
                    <td>{{ $tugas->pertemuan }}</td>
                    <td>{{ $tugas->tgl_buat }}</td>
                    <td>{{ $tugas->tgl_dl }}</td>
                    <td>
                        @if ($tugas->file_tugas)
                            <a href="{{ Storage::url('tugas/' . $tugas->file_tugas) }}" target="_blank">Lihat File</a>
                        @else
                            Tidak ada file
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('tugas.edit', $tugas->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tugas.destroy', $tugas->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                        <a href="{{ route('tugas.pengumpulans', $tugas->id) }}" class="btn btn-info btn-sm">Lihat Data Pengumpulan</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
