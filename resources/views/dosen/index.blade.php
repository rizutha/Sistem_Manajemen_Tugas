@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <div class="d-flex justify-content-between">
            <h4>Data Dosen</h4>

            <div class="mb-3">
                <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>
            </div>
        </div>

        <table class="table-hover table">
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
@endsection
