@extends('layouts.app')

@section('content')
@if (Session::has('success'))
        <div class="alert  d-flex align-items-center ">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
        <div class="col text-center">
            <div class="row">
                <h3>👋 Hai !, {{ Auth::user()->name }}</h3>
            </div>
            <div class="row mb-4">
                <span>Apa yang ingin anda lakukan hari ini?</span>
            </div>
            @switch(auth()->user()->role)
                @case('admin')
                    <div class="row d-flex justify-content-center">
                        <a href="/mahasiswa" class="btn btn-primary btn-lg" style="width: 300px">Lihat Data Mahasiswa</a>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <a href="/dosen" class="btn btn-primary btn-lg mt-2" style="width: 300px">Lihat Data Dosen</a>
                    </div>
                @break

                @case('dosen')
                    <div class="row d-flex justify-content-center">
                        <a href="/datamhs" class="btn btn-primary btn-lg" style="width: 300px">Lihat Data Mahasiswa</a>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <a href="/tugas" class="btn btn-primary btn-lg mt-2" style="width: 300px">Lihat Tugas</a>
                    </div>
                @break

                @case('admin')
                    <div class="row d-flex justify-content-center">
                        <a href="/tugasmhs" class="btn btn-primary btn-lg mt-2" style="width: 300px">Lihat Tugas</a>
                    </div>
                @break

                @default
            @endswitch
        </div>
    </div>
@endsection
