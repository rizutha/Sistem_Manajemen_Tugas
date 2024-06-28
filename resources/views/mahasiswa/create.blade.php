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
            <div class="form-group">
                <label for="">Foto <span class="text-danger">*</span></label>
                        <input type="file" name="foto"
                            class="form-control @if ($errors->has('foto')) is-invalid @endif"
                            placeholder="Pilih Foto" value="{{ old('foto') }}">
                        <small>Tipe Foto: JPG/JPEG/PNG. Max: 10 MB.</small>
                        @if ($errors->has('foto'))
                            <br>
                            <small class="text-danger">
                                {{ $errors->first('foto') }}
                            </small>
                        @endif
                {{-- <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control-file" required> --}}
            </div>
            <button type="submit" class="btn btn-success">Simpan Data</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i>
                Kembali</a>
        </form>
    </div>
@endsection
