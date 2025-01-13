
@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <h1>Buat Tugas Baru</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_mapel">Mata Pelajaran</label>
                <select name="id_mapel" id="id_mapel" class="form-control" required>
                    <option value="">Pilih Mata Pelajaran</option>
                    @foreach ($mapels as $mapel)
                        <option value="{{ $mapel->id }}">{{ $mapel->nama_matkul }} - {{ $mapel->kelas->kelas }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="form-group">
                <label>Kelas</label>
                <input type="text" class="form-control @error('') is-invalid @enderror" name="" id="kelas" readonly>
                @error('')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div> --}}
            {{-- <div class="form-group">
                <label for="pertemuan">Pertemuan</label>
                <input type="text" name="pertemuan" id="pertemuan" class="form-control" required>
            </div> --}}
            <div class="form-group">
                <label for="tgl_buat">Tanggal Buat</label>
                <input type="date" name="tgl_buat" id="tgl_buat" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tgl_dl">Tanggal Deadline</label>
                <input type="date" name="tgl_dl" id="tgl_dl" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="file_tugas">File Tugas</label>
                <input type="file" name="file_tugas" id="file_tugas" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Simpan Data</button>
            <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    {{-- <script>
        document.getElementById('id_mapel').addEventListener('change', function() {
            var kelasId = this.value;
            if (kelasId) {
                fetch(`/get-kelas/${kelasId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('kelas').value = data.kelas;
                    });
            } else {
                document.getElementById('kelas').value = '';
            }
        });
    </script> --}}
@endsection
