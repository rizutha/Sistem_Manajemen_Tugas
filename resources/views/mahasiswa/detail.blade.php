<!-- resources/views/mahasiswa/detail.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
        <div class="bg-light rounded-2 container p-5 shadow-lg">
            <h2>Detail Mahasiswa</h2>

            <div class="row">
                @if ($mahasiswa->foto)
                    <img src="{{ asset('storage/mahasiswa/' . $mahasiswa->foto) }}" style="width:250px"
                        class="rounded-3 col-auto" />
                @endif
                {{-- Informasi Dasar --}}
                <div class="col-auto">
                    <div class="row">
                        <h4>{{ $mahasiswa->nama }}</h4>
                        <p class="fw-bold">{{ $mahasiswa->nim }}</p>
                    </div>
                    <p class="card-text">Tanggal Lahir: {{ $mahasiswa->tgl_lahir }}</p>
                    <p class="card-text">Alamat: {{ $mahasiswa->alamat }}</p>
                    <p class="card-text">Kontak: {{ $mahasiswa->kontak }}</p>
                    <p class="card-text">Email: {{ $mahasiswa->user->email }}</p>
                    <p class="card-text">Program Studi: {{ $mahasiswa->kelas->prodi }}</p>
                    <p class="card-text">Kelas: {{ $mahasiswa->kelas->kelas }}</p>
                </div>
            </div>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    @endsection
