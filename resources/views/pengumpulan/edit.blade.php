@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <h4>Kumpulkan Tugas</h4>
        <form action="{{ route('pengumpulan.update', $pengumpulan->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="link_tugas">Link Tugas</label>
                <input type="url" name="link_tugas" class="form-control" id="link_tugas"
                    value="{{ $pengumpulan->link_tugas }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
