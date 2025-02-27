@extends('layouts.app')
@section('title', 'Dosen')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <div class="d-flex justify-content-between">
            <div class="">
                <h4>Tambah Data Dosen</h4>
            </div>
        </div>
        <br>
        {{-- z --}}
        <form action="{{ route('dosen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p><b>Kolom bertanda <span class="text-danger">*</span> tidak boleh
                    kosong</b></p>
            <div class="row mb-3">
                <div class="col px-4">
                    <div class="row py-2">
                        <label for="users_id">Nama <span class="text-danger">*</span></label>
                        <select name="users_id" class="form-control" required>
                            <option value="">Pilih Nama</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('nama'))
                            <small class="text-danger">
                                {{ $errors->first('nama') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Kode Nama <span class="text-danger">*</span></label>
                        <input type="text" name="codename"
                            class="form-control @if ($errors->has('codename')) is-invalid @endif"
                            placeholder="Masukkan Kode Nama" value="{{ old('codename') }}">
                        @if ($errors->has('codename'))
                            <small class="text-danger">
                                {{ $errors->first('codename') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tgl_lahir"
                            class="form-control @if ($errors->has('tgl_lahir')) is-invalid @endif"
                            placeholder="Masukkan Tanggal Lahir" value="{{ old('tgl_lahir') }}">
                        @if ($errors->has('tgl_lahir'))
                            <small class="text-danger">
                                {{ $errors->first('tgl_lahir') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Alamat <span class="text-danger">*</span></label>
                        <input type="text" name="alamat"
                            class="form-control @if ($errors->has('alamat')) is-invalid @endif"
                            placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                        @if ($errors->has('alamat'))
                            <small class="text-danger">
                                {{ $errors->first('alamat') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Kontak <span class="text-danger">*</span></label>
                        <input type="text" name="kontak"
                            class="form-control @if ($errors->has('kontak')) is-invalid @endif"
                            placeholder="Masukkan Kontak" value="{{ old('kontak') }}">
                        @if ($errors->has('kontak'))
                            <small class="text-danger">
                                {{ $errors->first('kontak') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Keilmuan <span class="text-danger">*</span></label>
                        <input type="text" name="keilmuan"
                            class="form-control @if ($errors->has('keilmuan')) is-invalid @endif"
                            placeholder="Masukan Keilmuan" value="{{ old('keilmuan') }}">
                        @if ($errors->has('keilmuan'))
                            <small class="text-danger">
                                {{ $errors->first('keilmuan') }}
                            </small>
                        @endif
                    </div>
                </div>
                <div class="col px-5">
                    {{-- div left --}}
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
                <a href="{{ route('dosen.index') }}" class="btn btn-outline-light"><i class="fa fa-arrow-left"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
@endsection
