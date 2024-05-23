<!-- resources/views/tugas/pengumpulans.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 p-5">
        <div class="d-flex justify-content-between">
            <div class="container">
                <h1>Pengumpulan Tugas: {{ $tugas->matkul }}</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Mahasiswa</th>
                            <th>Link Tugas</th>
                            <th>Tgl Pengumpulan</th>
                            <th>Nilai</th>
                            <th>Komentar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengumpulans as $index => $pengumpulan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pengumpulan->mahasiswa->nama }}</td>
                                <td><a href="{{ $pengumpulan->link_tugas }}"
                                        target="_blank">{{ $pengumpulan->link_tugas }}</a></td>
                                <td>{{ $pengumpulan->tgl_pengumpulan }}</td>
                                <td>{{ $pengumpulan->nilai }}</td>
                                <td>{{ $pengumpulan->komentar }}</td>
                                <td>
                                    <form action="{{ route('pengumpulan.dosenUpdate', $pengumpulan->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="nilai-{{ $pengumpulan->id }}">Nilai</label>
                                            <input type="number" name="nilai" id="nilai-{{ $pengumpulan->id }}"
                                                class="form-control" value="{{ $pengumpulan->nilai }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="komentar-{{ $pengumpulan->id }}">Komentar</label>
                                            <textarea name="komentar" id="komentar-{{ $pengumpulan->id }}" class="form-control">{{ $pengumpulan->komentar }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endsection
