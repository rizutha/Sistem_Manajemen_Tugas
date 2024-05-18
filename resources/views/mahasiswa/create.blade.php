<!-- resources/views/mahasiswa/create.blade.php -->

@extends('layouts.app')
@section('title', 'Mahasiswa')

@section('content')
    <div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
        <div class="d-flex justify-content-between">
            <div class="">
                <h2 class="text-dark m-0">Tambah Data Mahasiswa</h2>
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
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" class="form-control-file" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Mahasiswa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
