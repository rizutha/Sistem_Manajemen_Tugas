@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <div class="">
            <h4>Detail Dosen</h4>
            <div class="row">
                @if ($dosen->foto)
                    <div class="col-3">
                        <div class="foto-preview-container mb-4 mt-3">
                            <img class="foto-preview" src="{{ asset('storage/dosen/' . $dosen->foto) }}" style="width: 100%">
                        </div>
                    </div>
                @endif
                <div class="col">
                    <div class="row">
                        <h4>{{ $dosen->nama }}</h4>
                        <p class="fw-bold">NIP: {{ $dosen->nip }}</p>
                    </div>
                    <p class="card-text">Tanggal Lahir: {{ $dosen->tgl_lahir }}</p>
                    <p class="card-text">Alamat: {{ $dosen->alamat }}</p>
                    <p class="card-text">Kontak: {{ $dosen->kontak }}</p>
                    <p class="card-text">Email: {{ $dosen->email }}</p>
                    <p class="card-text">Dosen Matkul: {{ $dosen->keilmuan }}</p>
                </div>
            </div>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary d-inline-block mt-3">Kembali</a>
        </div>
    @endsection
