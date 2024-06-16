@extends('layouts.frontend')

@section('content')
    <nav class="d-flex justify-content-center bg-dark align-items-center container sticky pb-2 pt-3 text-white">
        <p>Disini Navbar "Hapus aja line ini kalo mau bikin nav dari scratch"</p>
    </nav>

    <div class="d-flex align-items-center cgradient rounded-5 p-shadow container mt-5 overflow-hidden pb-4 pt-5">
        <div class="row px-4">
            <h3 class="fw-bold text-white">Layanan <span class="rounded-4 c1 c3b px-2 py-1">Kami</span>
            </h3>
            <div class="d-flex justify-content-center flex-wrap gap-4 py-4">
                <div class="col bg-light rounded-4 px-4 py-3">
                    <i class="bi bi-people-fill fs-1 c1"></i>
                    <h4 class="c1 fw-bold mb-2 mt-2">Manajemen Informasi Siswa dan Guru</h4>
                    <p class="fs-5">Mengelola informasi pribadi siswa dan guru dengan mudah dan cepat untuk dipahami</p>
                </div>
                <div class="col bg-light rounded-4 px-4 py-3">
                    <i class="bi bi-door-open-fill fs-1 c1"></i>
                    <h4 class="c1 fw-bold mb-2 mt-2">Manajemen Informasi Siswa dan Guru</h4>
                    <p class="fs-5">Kelola data kelas lebih mudah dengan integrasi antar data dalam sistem
                        dilakukan</p>
                </div>
                <div class="col bg-light rounded-4 px-4 py-3">
                    <i class="bi bi-clipboard2-check-fill fs-1 c1"></i>
                    <h4 class="c1 fw-bold mb-2 mt-2">Manajemen Informasi Siswa dan Guru</h4>
                    <p class="fs-5">Mempermudah siswa dalam mengumpulkan tugas dengan alur yang mudah dipahami</p>
                </div>
            </div>

        </div>
        <img src="{{ asset('assets/star.png') }}" class="position-absolute fixed" style="width: 32px; top: 25%; right: 7%"
            alt="">
    </div>

    <div class="">

    </div>
@endsection
