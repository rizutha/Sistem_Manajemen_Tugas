@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 p-5">
        <h1>Edit Pengumpulan Tugas</h1>
        <form action="{{ route('pengumpulan.dosenUpdate', $pengumpulan->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="number" name="nilai" id="nilai" class="form-control" value="{{ $pengumpulan->nilai }}">
            </div>

            <div class="form-group">
                <label for="komentar">Komentar</label>
                <textarea name="komentar" id="komentar" class="form-control">{{ $pengumpulan->komentar }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
