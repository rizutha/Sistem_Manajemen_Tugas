@extends('layouts.app')

@section('content')
    <div class="rounded-4 card px-4 py-4">
        <h4>Data Kelas</h4>

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
                <h3 class="mt-5">{{ $kelas->kelas }}</h3>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th width="25px">No</th>
                                <th width="100px">NIM</th>
                                <th width="250px">Nama Mahasiswa</th>
                                <th width="100px">Kelas</th>
                                <th width="100px">Aksi</th>
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
                                            <a href="{{ route('detailmhs', $mahasiswa->id) }}" class="btn btn-info">Detail</a>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{-- {{ $dosens->links() }} --}}
            @endforeach
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

