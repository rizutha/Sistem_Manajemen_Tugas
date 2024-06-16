@extends('layouts.frontend')

@section('content')
    <nav class="d-flex justify-content-center bg-dark align-items-center container sticky pb-2 pt-3 text-white">
        <p>Disini Navbar "Hapus aja line ini kalo mau bikin nav dari scratch"</p>
    </nav>

    <div
        class="d-flex align-items-center cgradient-s rounded-5 p-shadow position-relative mt-section container overflow-hidden pb-4 pt-5">
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
        <img src="{{ asset('assets/star.png') }}" class="position-absolute fixed" style="width: 32px; top: 9%; right: 4%"
            alt="">
    </div>

    <div class="mt-section mb-section container">
        <div class="row gap-5">
            <div class="col position-relative">
                <img src="{{ asset('assets/ellipse.png') }}" class="position-absolute fixed" alt=""
                    style=" top: -95%; left: -50%; z-index: -1;">
                <h1>Tentang <span class="rounded-4 c1 c3b z-1 px-2 py-1">SMT</span></h1>
                <p class="fs-4">Solusi ringan dan mudah untuk mengelola data tugas, kelas, informasi data siswa, dan data
                    guru</p>
                <div class="col row z-1 gap-3 ps-3">
                    <div class="row d-flex flex-wrap gap-3">
                        <div class="col d-flex cgradient align-items-center rounded-4 p-shadow px-4 py-2 text-white">
                            <i class="bi bi-people-fill fs-2 me-3"></i>
                            <h6>Mudah Digunakan</h6>
                        </div>
                        <div class="col d-flex cgradient align-items-center rounded-4 p-shadow px-4 py-2 text-white">
                            <i class="bi bi-people-fill fs-1 me-3"></i>
                            <h6>Mudah Digunakan</h6>
                        </div>
                    </div>
                    <div class="row gap-3">
                        <div class="col d-flex cgradient align-items-center rounded-4 p-shadow px-4 py-2 text-white">
                            <i class="bi bi-people-fill fs-2 me-3"></i>
                            <h6>Mudah Digunakan</h6>
                        </div>
                        <div class="col d-flex cgradient align-items-center rounded-4 p-shadow px-4 py-2 text-white">
                            <i class="bi bi-people-fill fs-1 me-3"></i>
                            <h6>Mudah Digunakan</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col position-relative" width="500px">
                <img src="{{ asset('assets/3dscreen.png') }}" class="position-absolute translate-middle fixed"
                    alt="" style="width: 120%; top: 50%; right: -90%">
            </div>
        </div>
    </div>

    <footer class="cgradient rounded-top-5 fixed py-5">
        <div class="text-light container text-center">
            <h4 class="fw-bold pt-2">SMT 2024 Copyright</h4>
        </div>
    </footer>
@endsection
