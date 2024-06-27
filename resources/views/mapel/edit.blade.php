<!-- resources/views/mapel/edit.blade.php -->

@extends('layouts.app')
@section('title', 'Mapel')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <div class="d-flex justify-content-between">
            <div class="">
                <h4 class="text-dark m-0">Edit Data Mata Kuliah</h4>
            </div>
        </div>
        <br>
        <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_kelas">Kelas</label>
                <select name="id_kelas" class="form-control">
                    @foreach ($list_kelas as $kelas)
                        <option value="{{ $kelas->id }}" {{ $mapel->id_kelas == $kelas->id ? 'selected' : '' }}>
                            {{ $kelas->kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_matkul">Nama Matkul</label>
                <input type="text" name="nama_matkul" class="form-control" value="{{ $mapel->nama_matkul }}" required>
            </div>
            <div class="form-group">
                <label for="dosen_pengajar">Dosen Pengajar</label>
                <select name="dosen_pengajar" class="form-control">
                    @foreach ($list_dosen as $dosen)
                        <option value="{{ $dosen->id }}" {{ $mapel->dosen_pengajar == $dosen->id ? 'selected' : '' }}>
                            {{ $dosen->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
