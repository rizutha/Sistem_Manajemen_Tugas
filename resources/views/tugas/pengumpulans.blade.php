<!-- resources/views/tugas/pengumpulans.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-4 py-4">
        <div class="d-flex justify-content-between">
            <div class="container">
                <h1>Tugas : {{ $tugas->matkul }}</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
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
                                <td>
                                    <input type="number" name="nilai" id="nilai-{{ $pengumpulan->id }}" class="form-control"
                                        value="{{ $pengumpulan->nilai }}" form="form-{{ $pengumpulan->id }}">
                                </td>
                                <td>
                                    <textarea name="komentar" id="komentar-{{ $pengumpulan->id }}" class="form-control" form="form-{{ $pengumpulan->id }}">{{ $pengumpulan->komentar }}</textarea>
                                </td>
                                <td>
                                    <form id="form-{{ $pengumpulan->id }}"
                                        action="{{ route('pengumpulan.dosenUpdate', $pengumpulan->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endsection
