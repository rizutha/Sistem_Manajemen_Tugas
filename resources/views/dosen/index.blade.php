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
                        <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th width="125px">NIP</th>
                        <th width="300px">Nama</th>
                        <th width="250px">Dosen Matkul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosens as $dosen => $row)
                    <tr>
                        <td>{{ $dosens->firstItem() + $dosen }}</td>
                        <td>{{ $row->nip }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->keilmuan }}</td>
                        <td>
                            <a href="{{ route('dosen.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('dosen.edit', $row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('dosen.destroy', $row->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $dosens->links() }}
        </div>
    </div>
</section>
@endsection
