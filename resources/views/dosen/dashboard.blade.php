@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 p-5">
        <div class="d-flex justify-content-between">
            <div class="container">
                <h1>Dashboard Dosen</h1>
                @foreach ($kelasDosen as $kelas)
                    <h2>Kelas: {{ $kelas->kelas }}</h2> <!-- Menampilkan nama kelas -->
                    @if (isset($daftarMahasiswa[$kelas->id]) && $daftarMahasiswa[$kelas->id]->isNotEmpty())
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Mahasiswa</th>
                                    <th>NIM</th>
                                    <th>Kelas</th> <!-- Kolom Kelas -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftarMahasiswa[$kelas->id] as $mahasiswa)
                                    <tr>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        <td>{{ $mahasiswa->nim }}</td>
                                        <td>{{ $kelas->kelas }}</td> <!-- Menampilkan nama kelas -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Tidak ada mahasiswa di kelas ini.</p>
                    @endif
                @endforeach
            </div>
        @endsection
