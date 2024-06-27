@extends('layouts.app')
@section('title', 'Kelas')

@section('content')
    <div class="rounded-4 card mb-5 px-5 py-4">
        <div class="d-flex justify-content-between">
            <div class="">
                <h4>Tambah Data Kelas</h4>
            </div>
        </div>
        <br>
        {{-- z --}}
        <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p><b>Kolom bertanda <span class="text-danger">*</span> tidak boleh
                    kosong</b></p>
            <div class="row">
                <div class="col px-4">
                    <div class="row py-2">
                        <label for="">Kelas <span class="text-danger">*</span></label>
                        <input type="text" name="kelas"
                            class="form-control @if ($errors->has('kelas')) is-invalid @endif"
                            placeholder="Masukkan Kelas" value="{{ old('kelas') }}">
                        @if ($errors->has('kelas'))
                            <small class="text-danger">
                                {{ $errors->first('kelas') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Prodi <span class="text-danger">*</span></label>
                        <select name="prodi" class="form-control @if ($errors->has('prodi')) is-invalid @endif"
                            required>
                            <option value="">Pilih Prodi</option>
                            <option value="Sistem Informasi" {{ old('prodi') == 'Sistem Informasi' ? 'selected' : '' }}>
                                Sistem Informasi</option>
                            <option value="Sistem Informasi Akuntansi"
                                {{ old('prodi') == 'Sistem Informasi Akuntansi' ? 'selected' : '' }}>Sistem Informasi
                                Akuntansi</option>
                            <option value="Teknologi Informasi"
                                {{ old('prodi') == 'Teknologi Informasi' ? 'selected' : '' }}>Teknologi Informasi</option>
                        </select>
                        @if ($errors->has('prodi'))
                            <small class="text-danger">
                                {{ $errors->first('prodi') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Semester <span class="text-danger">*</span></label>
                        <select name="semester" class="form-control @if ($errors->has('prodi')) is-invalid @endif"
                            required>
                            <option value="">Pilih Semester</option>
                            <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('semester') == '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('semester') == '4' ? 'selected' : '' }}>4</option>
                            <option value="5" {{ old('semester') == '5' ? 'selected' : '' }}>5</option>
                            <option value="6" {{ old('semester') == '6' ? 'selected' : '' }}>6</option>
                            <option value="7" {{ old('semester') == '7' ? 'selected' : '' }}>7</option>
                            <option value="8" {{ old('semester') == '8' ? 'selected' : '' }}>8</option>
                        </select>
                        @if ($errors->has('semester'))
                            <small class="text-danger">
                                {{ $errors->first('semester') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <label for="">Wali Kelas <span class="text-danger">*</span></label>
                        <select name="wali_kelas" class="form-control @if ($errors->has('wali_kelas')) is-invalid @endif">
                            <option value="">Pilih Wali Kelas</option>
                            @foreach ($list_dosen as $dosen)
                                <option value="{{ $dosen->id }}" @if (old('wali_kelas') == $dosen->id) selected @endif>
                                    {{ $dosen->nama }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('wali_kelas'))
                            <small class="text-danger">
                                {{ $errors->first('wali_kelas') }}
                            </small>
                        @endif
                    </div>
                    <div class="row py-2">
                        <div class="my-2">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan Data</button>
                            <a href="{{ route('kelas.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                                Kembali</a>
                        </div>
                </div>
        </form>
    </div>
@endsection
