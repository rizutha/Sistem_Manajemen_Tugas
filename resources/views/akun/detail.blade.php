<!-- resources/views/user/detail.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <h4>Detail Pengguna</h4>

        <div class="row">
            {{-- Informasi Dasar --}}
            <div class="col-auto">
                <div class="row">
                    <h4>{{ $akun->name }}</h4>
                    <p class="fw-bold">{{ $akun->username }}</p>
                </div>
                <p class="card-text">Email: {{ $akun->email }}</p>
                <p class="card-text">Role: {{ $akun->role }}</p>
            </div>
        </div>

        <a href="{{ url('akun') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
