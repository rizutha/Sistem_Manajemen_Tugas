@extends('layouts.app')

<head>
    <div class="z-3 position-absolute">
        @notifyCss
        <x-notify::notify />
        @notifyJs
    </div>
</head>


@section('content')
    <div class="rounded-4 card mb-5 p-5">
        <div class="col text-center">
            <div class="row">
                <h3>👋 Hai, {{ Auth::user()->name }}!</h3>
            </div>
            <div class="row mb-4">
                <span>Apa yang ingin anda lakukan hari ini?</span>
            </div>
            @switch(auth()->user()->role)
                @case('admin')
                    <div class="row d-flex justify-content-center">
                        <a href="/akun" class="btn btn-primary btn-lg mb-2" style="width: 300px">Lihat Data Akun</a>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <a href="/mahasiswa" class="btn btn-primary btn-lg" style="width: 300px">Lihat Data Mahasiswa</a>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <a href="/dosen" class="btn btn-primary btn-lg mt-2" style="width: 300px">Lihat Data Dosen</a>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <a href="/kelas" class="btn btn-primary btn-lg mt-2" style="width: 300px">Lihat Data Kelas</a>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <a href="/mapel" class="btn btn-primary btn-lg mt-2" style="width: 300px">Lihat Data Mata Kuliah</a>
                    </div>
                @break

                @case('dosen')
                    <div class="row d-flex justify-content-center">
                        <a href="/datakelas" class="btn btn-primary btn-lg" style="width: 300px">Data Kelas</a>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <a href="/tugaskelas" class="btn btn-primary btn-lg mt-2" style="width: 300px">Buat Tugas</a>
                    </div>
                @break

                @case('mahasiswa')
                    <div class="row d-flex justify-content-center">
                        <a href="/datatugas" class="btn btn-primary btn-lg mt-2" style="width: 300px">Lihat Tugas</a>
                    </div>
                @break

                @default
            @endswitch
        </div>
    </div>
@endsection
