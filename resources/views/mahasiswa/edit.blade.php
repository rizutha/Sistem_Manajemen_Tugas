@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <div class="container">
            <h4>Edit Mahasiswa</h4>

            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <p><b>Kolom bertanda <span class="text-danger">*</span> tidak boleh kosong</b></p>
                <div class="row">
                    <div class="col px-4">
                        <div class="row py-2">
                            <label for="nama">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                placeholder="Masukkan Nama" value="{{ $mahasiswa->nama }}">
                            @error('nama')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="row py-2">
                            <label for="tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="date" name="tgl_lahir"
                                class="form-control @error('tgl_lahir') is-invalid @enderror"
                                placeholder="Masukkan Tanggal Lahir" value="{{ $mahasiswa->tgl_lahir }}">
                            @error('tgl_lahir')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="row py-2">
                            <label for="alamat">Alamat <span class="text-danger">*</span></label>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                placeholder="Masukkan Alamat" value="{{ $mahasiswa->alamat }}">
                            @error('alamat')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="row py-2">
                            <label for="kontak">Kontak <span class="text-danger">*</span></label>
                            <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror"
                                placeholder="Masukkan Kontak" value="{{ $mahasiswa->kontak }}">
                            @error('kontak')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="row py-2">
                            <label for="id_kelas">Kelas <span class="text-danger">*</span></label>
                            <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror">
                                @foreach ($kelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                                @endforeach
                            </select>
                            @error('id_kelas')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                    </div>
                    <div class="col px-5">
                        <div class="row py-2">
                            <label for="foto">Foto <span class="text-danger">*</span></label>
                            <input type="file" name="foto"
                                class="form-control-file @error('foto') is-invalid @enderror" placeholder="Pilih Foto"
                                value="{{ $mahasiswa->foto }}">
                            <small>Tipe Foto: JPG/JPEG/PNG. Max: 10 MB.</small>
                            @error('foto')
                                <br>
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="my-2">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan
                            Data</button>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    @endsection
