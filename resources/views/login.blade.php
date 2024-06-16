@extends('layouts.frontend')

@section('content')
    <nav class="d-flex justify-content-center container mt-4">
        <div class="sticky-nav animate__animated animate__fadeInDownBig mb-5">
            <ul class="d-flex justify-content-center align-items-center rounded-4 px-4 py-3 shadow">
                <li><a href="#beranda" class="link-nav-text fw-lg px-3 pt-1">Beranda</a></li>
                <li><a href="#layanan" class="link-nav-text fw-lg px-3 pt-1">Layanan</a></li>
                <li><a href="#tentang" class="link-nav-text fw-lg px-3 pt-1">Tentang</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row gx-lg-5 justify-content-evenly mt-5">
            <div class="col-lg-6 mb-5">
                <h1 class="display-5 fw-bold ls-tight my-5">
                    Sistem Manajemen Tugas <br />
                    <span class="text-primary">Mahasiswa</span>
                </h1>
                <p style="color: hsl(217, 10%, 50.8%)">
                    Selamat Datang di Website untuk Memanajemen Tugas Mahasiswa!
                </p>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-5">
                <div class="rounded-4 shadow">
                    @notifyCss
                    <x-notify::notify />
                    @notifyJs
                    <div class="card-body px-md-5 py-5">
                        <form id="loginForm" action="/login" method="post">
                            @csrf
                            <h2 class="mb-4"><strong>Silahkan Login terlebih dahulu</strong></h2>

                            <div class="">
                                <!-- Email input -->
                                <div class="form-outline mb-2 mt-4">
                                    <label class="form-label" for="form3Example3">Email address</label>
                                    <input type="email" name="email" id="form3Example3" class="form-control" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4">Password</label>
                                    <input type="password" name="password" id="form3Example4" class="form-control" />
                                </div>

                                <!-- Submit button -->
                                <div class="d-flex flex-column">
                                    <button type="submit" class="btn bg-primary mb-2 text-white">
                                        Login
                                    </button>
                                    <a href="/forgot-password" class="btn btn-outline-secondary">Lupa Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
