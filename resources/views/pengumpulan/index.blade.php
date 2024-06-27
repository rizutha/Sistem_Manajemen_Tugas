@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <div class="d-flex justify-content-between">
            <div class="container">
                <h4>Daftar Tugas</h4>

                @if ($pengumpulans->isEmpty())
                    <p>Belum ada data Tugas.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tugas</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Dikumpulkan Pada</th>
                                <th scope="col">Link Tugas</th>
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
                                    <td>{{ $pengumpulan->tugas->tgl_dl }}</td>
                                    <td>{{ $pengumpulan->tgl_pengumpulan }}</td>
                                    <td>
                                        @if ($pengumpulan->link_tugas)
                                            <a href="{{ $pengumpulan->link_tugas }}"
                                                target="_blank">{{ $pengumpulan->link_tugas }}</a>
                                        @else
                                            <form action="{{ route('pengumpulan.update', $pengumpulan->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="url" name="link_tugas" placeholder="Link Tugas" required>
                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>{{ $pengumpulan->nilai }}</td>
                                    <td>{{ $pengumpulan->komentar }}</td>
                                    <td>
                                        @if ($pengumpulan->link_tugas)
                                            <a href="{{ route('pengumpulan.edit', $pengumpulan->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif 
            </div>
        </div>
    </div>
@endsection
