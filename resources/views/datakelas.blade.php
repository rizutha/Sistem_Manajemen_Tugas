@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 p-5">
        <div class="d-flex justify-content-between">
            <div class="container">
                <h2>Data Kelas</h2>

                <div class="form-group">
                    <label for="kelas-select">Pilih Kelas:</label>
                    <select id="kelas-select" class="form-control">
                        <option value="" selected disabled>Pilih kelas</option>
                        @foreach ($kelasDosen as $kelas)
                            <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                        @endforeach
                    </select>
                </div>

                @foreach ($kelasDosen as $kelas)
                    <div class="kelas-table" id="kelas-{{ $kelas->id }}" style="display: none;">
                        <h5 class="mt-5">{{ $kelas->kelas }}</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas->mahasiswas as $mahasiswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mahasiswa->nim }}</td>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        <td>{{ $mahasiswa->kelas->kelas }}</td>
                                        <td>
                                            <a href="{{ route('detailmhs', $mahasiswa->id) }}"
                                                class="btn btn-info">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.getElementById('kelas-select').addEventListener('change', function() {
            var selectedClassId = this.value;

            document.querySelectorAll('.kelas-table').forEach(function(table) {
                table.style.display = 'none';
            });

            if (selectedClassId) {
                document.getElementById('kelas-' + selectedClassId).style.display = 'block';
            }
        });
    </script>
@endsection
