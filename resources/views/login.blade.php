@extends('layouts.frontend')

@section('content')
    <header class="">
        <nav class="navbar">
            @notifyCss
            <x-notify::notify />
            @notifyJs
            <div class="container">
                <div class="d-flex">
                    <img src="{{ asset('assets/atom.png') }}" alt="Logo" style="margin-right: 8px">
                    <a href="#" class="logo" style="text-decoration: none; font-size: 20px; color: #161616;">
                        Sistem Manajemen Tugas
                    </a>
                </div>
                <ul class="nav-links d-flex justify-content-center flex-wrap gap-4 py-4"
                    style="list-style-type: none; margin: 0; padding: 0;">
                    <li><a href="/" class="nav-link"
                            style="text-decoration: none; color: #161616; font-size: 18px;">Beranda</a></li>
                    <li><a href="#" class="nav-link"
                            style="text-decoration: none; color: #161616; font-size: 18px;">Layanan</a></li>
                    <li><a href="#" class="nav-link"
                            style="text-decoration: none; color: #161616; font-size: 18px;">Tentang</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row justify-content-evenly mt-5">
            <div class="col">
                <h1 class="display-5 fw-bold ls-tight c1 my-5">
                    Sistem Manajemen Tugas <br />
                    <span class="rounded-4 c1 c3b px-3">Mahasiswa</span>
                </h1>
                <p style="color: hsl(217, 10%, 50.8%)">
                    Selamat Datang di Website untuk Memanajemen Tugas Mahasiswa!
                </p>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-5">
                <div class="rounded-4 shadow">
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
                                    <button type="submit" class="rounded-5 p-shadow mb-2 px-4 py-2 text-white"
                                        style="background: rgb(143, 134, 248);
                                            background: linear-gradient(180deg, rgba(143, 134, 248, 1) 0%, rgba(91, 79, 225, 1) 100%);">
                                        Login
                                    </button>
                                    <a href="/forgot-password" class="btn btn-ghost">Lupa Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
