<!-- resources/views/mahasiswa/create.blade.php -->

@extends('layouts.app')
@section('title', 'Mahasiswa')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <div class="d-flex justify-content-between">
            <div class="">
                <h4>Tambah Data Mahasiswa</h4>
            </div>
        </div>
        <br>
        <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label for="users_id">Nama</label>
                        <select name="users_id" class="form-control" required>
                            <option value="">Pilih Nama</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_kelas">Kelas</label>
                        <select name="id_kelas" class="form-control" required>
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelas as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kontak">Kontak</label>
                        <input type="text" name="kontak" class="form-control" required>
                    </div>
                </div>
                <div class="col px-5">
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="foto-preview-container mb-4 mt-3">
                            <img class="foto-preview" src="{{ asset('assets/default.png') }}">
                        </div>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                            onchange="previewFoto()">
                        @error('foto')
                            <div class="invalid-feedback alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-light"><i class="fa fa-arrow-left"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
@endsection
