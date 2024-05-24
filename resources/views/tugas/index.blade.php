@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <div class="d-flex justify-content-between">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <h2>Daftar Tugas</h2>
                    <a href="{{ route('tugas.create') }}" class="btn btn-primary mb-3">Buat Tugas Baru</a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="kelas-select">Pilih Kelas:</label>
                    <select id="kelas-select" class="form-control">
                        <option value="" selected disabled>Pilih kelas</option>
                        @foreach ($tugasPerKelas as $kelasId => $tugass)
                            <option value="{{ $kelasId }}">{{ $tugass[0]->kelas->kelas }}</option>
                        @endforeach
                    </select>
                </div>

                @foreach ($tugasPerKelas as $kelasId => $tugass)
                    <div class="kelas-table" id="kelas-{{ $kelasId }}" style="display: none;">
                        <h5 class="mt-5">{{ $tugass[0]->kelas->kelas }}</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="5px">No</th>
                                    <th width="125px">Mata Pelajaran</th>
                                    <th width="1px">Pertemuan</th>
                                    <th width="90px">Dibuat Pada</th>
                                    <th width="90px">Deadline</th>
                                    <th width="50px">File Tugas</th>
                                    <th width="200px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tugass as $tugas)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tugas->mapel->nama_matkul }}</td>
                                        <td>{{ $tugas->pertemuan }}</td>
                                        <td>{{ $tugas->tgl_buat }}</td>
                                        <td>{{ $tugas->tgl_dl }}</td>
                                        <td>
                                            @if ($tugas->file_tugas)
                                                <a href="{{ Storage::url('tugas/' . $tugas->file_tugas) }}"
                                                    target="_blank">Lihat
                                                    File</a>
                                            @else
                                                Tidak ada file
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('tugas.edit', $tugas->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            <a href="{{ route('tugas.pengumpulans', $tugas->id) }}"
                                                class="btn btn-primary btn-sm">Lihat Data Pengumpulan</a>
                                            <form action="{{ route('tugas.destroy', $tugas->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                            </form>
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
