@extends('layouts.frontend')

@section('content')
    <header>
        <nav class="navbar">
            <div class="container">
                <a class="logo" style="text-decoration: none; font-size: 20px; color: #161616;">
                    <img src="{{ asset('assets/atom.png') }}" alt="Logo" style="margin-right: 8px">
                    <strong>Sistem Manajemen Tugas</strong>
                </a>

                <ul class="nav-links d-flex justify-content-center flex-wrap gap-4 py-4"
                    style="list-style-type: none; margin: 0; padding: 0;">
                    <li><a href="#" class="nav-link"
                            style="text-decoration: none; color: #161616; font-size: 18px;">Beranda</a></li>
                    <li><a href="#" class="nav-link"
                            style="text-decoration: none; color: #161616; font-size: 18px;">Layanan</a></li>
                    <li><a href="#" class="nav-link"
                            style="text-decoration: none; color: #161616; font-size: 18px;">Tentang</a></li>
                    <li><a href="/login" class="btn-masuk align-items-center rounded-5 p-shadow px-4 py-2"
                            style="text-decoration: none; color: white;">Masuk</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="mt-section-secondary mb-section container">
            <div class="row position-relative gap-5">
                <div class="col mb-5">
                    <h1 class="fw-bold mb-4" style="font-size: 72px">Permudah Proses Pembelajaran</h1>
                    <p class="fs-4 mb-5">SMT sebagai solusi terbaik untuk manajemen tugas yang lebih efisien</p>
                    <a href="/login" class="btn-masuk align-items-center rounded-5 p-shadow px-4 py-3"
                        style="text-decoration: none; color: white; ">Mulai Sekarang</a>
                </div>
                <div class="col position-relative" width="500px">
                    <img src="{{ asset('assets/hero.png') }}" alt=""
                        class="position-absolute translate-middle fixed" alt=""
                        style=" top: 30%; left:50%; z-index: -1;">
                    <img src="{{ asset('assets/ellipse.png') }}" class="position-absolute fixed" alt=""
                        style=" left:40%; z-index: -2;">
                </div>
                <img src="{{ asset('assets/star1.png') }}" class="position-absolute fixed"
                    style="width: 70px; top: 70%; right: 50%" alt="">
                <img src="{{ asset('assets/ornament.png') }}" class="position-absolute fixed"
                    style="width: 200px; top: -73%; right: 55%" alt="">
            </div>
        </div>
        <div
            class="d-flex align-items-center cgradient-s rounded-5 p-shadow position-relative mt-section container pb-4 pt-5">
            <img src="{{ asset('assets/ornament.png') }}" class="position-absolute fixed"
                style="width: 200px; top: 38%; right: 97%; transform: rotate(90deg);" alt="">
            <img src="{{ asset('assets/ornament.png') }}" class="position-absolute fixed"
                style="width: 200px; top: 38%; left: 98%; transform: rotate(90deg);" alt="">
            <div class="row px-4">
                <h3 class="fw-bold text-white">Layanan <span class="rounded-4 c1 c3b px-2 py-1">Kami</span>
                </h3>
                <div class="d-flex justify-content-center flex-wrap gap-4 py-4">
                    <div class="col bg-light rounded-4 px-4 py-3">
                        <i class="bi bi-people-fill fs-1 c1"></i>
                        <h4 class="c1 fw-bold mb-2 mt-2">Manajemen Informasi Siswa dan Guru</h4>
                        <p class="fs-5">Mengelola informasi pribadi siswa dan guru dengan mudah dan cepat untuk dipahami
                        </p>
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
            <img src="{{ asset('assets/star.png') }}" class="position-absolute fixed"
                style="width: 32px; top: 9%; right: 4%" alt="">
        </div>
        <div class="mt-section mb-section container">
            <div class="row gap-5">
                <div class="col position-relative">
                    <img src="{{ asset('assets/ellipse.png') }}" class="position-absolute fixed" alt=""
                        style=" top: -95%; left: -50%; z-index: -1;">
                    <h1 class="fw-bold mb-4" style="font-size: 72px">Tentang <span
                            class="rounded-4 c1 c3b z-1 px-2 py-1">SMT</span></h1>
                    <p class="fs-4 mb-4">Solusi ringan dan mudah untuk mengelola data tugas, kelas, informasi data siswa,
                        dan
                        data
                        guru</p>
                    <div class="col row z-1 gap-3 ps-3">
                        <div class="row d-flex flex-wrap gap-3">
                            <div class="col d-flex cgradient-b align-items-center rounded-4 p-shadow c1 px-4 py-3">
                                <span class="material-icons fs-1 me-3 pb-2">
                                    touch_app
                                </span>
                                <h6 class="pt-1">Mudah Digunakan</h6>
                            </div>
                            <div class="col d-flex cgradient-b align-items-center rounded-4 p-shadow c1 px-4 py-3">
                                <i class="bi bi-lightning-fill fs-2 me-3"></i>
                                <h6 class="pt-1">Ringan Bagi Sistem</h6>
                            </div>
                        </div>
                        <div class="row gap-3">
                            <div class="col d-flex cgradient-b align-items-center rounded-4 p-shadow c1 px-4 py-3">
                                <i class="bi bi-hand-thumbs-up-fill fs-2 me-3"></i>
                                <h6 class="pt-1">Efisiensi Pekerjaan</h6>
                            </div>
                            <div class="col d-flex cgradient-b align-items-center rounded-4 p-shadow c1 px-4 py-3">
                                <i class="bi bi-list-ul fs-2 me-3"></i>
                                <h6 class="pt-1">Navigasi Praktis</h6>
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
    </main>

    <footer class="cgradient rounded-top-5 fixed pb-4 pt-5">
        <div class="text-light container text-center">
            <h4 class="fw-bold pt-1">SMT 2024 Copyright</h4>
        </div>
    </footer>
@endsection
