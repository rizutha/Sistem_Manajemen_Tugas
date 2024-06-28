<!-- resources/views/mapel/create.blade.php -->
@extends('layouts.app')
@section('title', 'Mapel')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <div class="d-flex justify-content-between">
            <div class="">
                <h4>Tambah Data Mata Kuliah</h4>
            </div>
        </div>
        <br>
        <form action="{{ route('mapel.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_kelas">Kelas</label>
                <select name="id_kelas" class="form-control">
                    <option value="">Pilih Kelas</option>
                    @foreach ($list_kelas as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="form-group">
                <label for="prodi">Prodi</label>
                <input type="text" name="prodi" class="form-control" required>
            </div> --}}
            <div class="form-group">
                <label for="nama_matkul">Nama Matkul</label>
                <input type="text" name="nama_matkul" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dosen_pengajar">Dosen Pengajar</label>
                <select name="dosen_pengajar" class="form-control">
                    <option value="">Pilih Dosen Pengampu</option>
                    @foreach ($list_dosen as $dosen)
                        <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan Data</button>
            <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
