@extends('layouts.app')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="px-2">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">
                        {{$judul}}
                    </h3>
                    <div class="mb-3">
                        <a href="{{ route('mapel.create') }}" class="btn btn-primary">Tambah Matkul</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($mapels->isEmpty())
                <p>Tidak ada data mapel.</p>
            @else
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th width="125px">Kelas</th>
                        <th width="250px">Prodi</th>
                        <th width="250px">Nama Matkul</th>
                        <th width="250px">Nama Dosen Pengajar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapels as $mapel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mapel->kelas->kelas }}</td>
                            <td>{{ $mapel->kelas->prodi }}</td>
                            <td>{{ $mapel->nama_matkul }}</td>
                            <td>{{ $mapel->dosen->nama }}</td>
                            <td>
                                <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus mapel ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $mapels->links() }}
            @endif
        </div>
    </div>
</section>
@endsection

