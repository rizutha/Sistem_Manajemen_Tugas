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
                        <a href="/akun/create" class="btn btn-primary">Tambah Pengguna</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th width="250px">Nama</th>
                        <th width="150px">Username</th>
                        <th width="250px">Email</th>
                        <th width="150px">Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($akun as $user => $row)
                    <tr>
                        <td>{{ $akun->firstItem() + $user }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->role }}</td>
                        <td>
                            <a href="{{ url('akun/detail', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ url('akun/edit', $row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ url('akun/destroy', $row->id) }}" method="POST" style="display:inline;">
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
            {{ $akun->links() }}
        </div>
    </div>
</section>
@endsection

