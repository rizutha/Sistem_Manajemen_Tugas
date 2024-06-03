<!-- resources/views/change_password.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <h2>Ubah Password</h2>
        <form action="{{ route('update.password') }}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="current_password">Password Saat Ini:</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
                @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password">Password Baru:</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
                @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Konfirmasi Password Baru:</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Ubah Password</button>
        </form>
    </div>
@endsection
