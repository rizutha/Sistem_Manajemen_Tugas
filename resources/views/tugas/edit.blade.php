@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <h1>Edit Tugas</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tugas.update', $tugas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="dosen_id" value="{{ $dosen->id }}">

            <div class="form-group">
                <label for="id_mapel">Mata Pelajaran</label>
                <select name="id_mapel" class="form-control" required>
                    <option value="">Pilih Mata Pelajaran</option>
                    @foreach ($mapels as $m)
                        <option value="{{ $m->id }}" {{ $tugas->id_mapel == $m->id ? 'selected' : '' }}>
                            {{ $m->nama_matkul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pertemuan">Pertemuan</label>
                <input type="text" name="pertemuan" class="form-control" value="{{ $tugas->pertemuan }}" required>
            </div>

            <div class="form-group">
                <label for="tgl_buat">Tanggal Buat</label>
                <input type="date" name="tgl_buat" class="form-control" value="{{ $tugas->tgl_buat }}" required>
            </div>

            <div class="form-group">
                <label for="tgl_dl">Tanggal Deadline</label>
                <input type="date" name="tgl_dl" class="form-control" value="{{ $tugas->tgl_dl }}" required>
            </div>

            <div class="form-group">
                <label for="file_tugas">File Tugas (Opsional)</label>
                @if ($tugas->file_tugas)
                    <div>
                        <a href="{{ Storage::url('tugas/' . $tugas->file_tugas) }}" target="_blank">Lihat File Tugas</a>
                    </div>
                @endif
                <input type="file" name="file_tugas" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Tugas</button>
            <a href="javascript:history.back()" class="btn btn-secondary ">Kembali</a>
        </form>
    </div>
@endsection
