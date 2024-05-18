@extends('layouts.app')

@section('content')
<div class="rounded-2 bg-light container mb-5 mt-5 p-5 shadow-lg">
<div class="d-flex justify-content-between">
<div class="container">
    <h1>Daftar Tugas</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tugas</th>
                <th scope="col">Link Tugas</th>
                <th scope="col">Tgl Pengumpulan</th>
                <th scope="col">Nilai</th>
                <th scope="col">Komentar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengumpulans as $index => $pengumpulan)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $pengumpulan->tugas->matkul }}</td>
                    <td>
                        @if ($pengumpulan->link_tugas)
                            <a href="{{ $pengumpulan->link_tugas }}" target="_blank">{{ $pengumpulan->link_tugas }}</a>
                        @else
                            <form action="{{ route('pengumpulan.update', $pengumpulan->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="url" name="link_tugas" placeholder="Link Tugas" required>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </form>
                        @endif
                    </td>
                    <td>{{ $pengumpulan->tgl_pengumpulan }}</td>
                    <td>{{ $pengumpulan->nilai }}</td>
                    <td>{{ $pengumpulan->komentar }}</td>
                    <td>
                        @if ($pengumpulan->link_tugas)
                            <a href="{{ route('pengumpulan.edit', $pengumpulan->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
