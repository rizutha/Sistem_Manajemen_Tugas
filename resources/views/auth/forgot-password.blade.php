<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Managemen Tugas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Optional: Add your own CSS styles here -->
    <style>
        body {
            background-color: hsl(0, 0%, 96%);
        }
    </style>
</head>

<body>
    <!-- Jumbotron -->
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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="d-flex flex-column">
                                <div class="form-group mb-4">
                                    <label class="form-label">Email Address</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Masukkan Alamat Email">

                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-flex flex-column">
                                    <button type="submit" class="btn bg-primary mb-2 text-white">Kirim Link Reset
                                        Password</button>
                                    <a href="/login" class="btn btn-outline-secondary">Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- Optional: Add your own JavaScript scripts here -->

    {{-- SCRIPT VERIFIKASI --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Validasi sederhana
            var email = document.getElementById('form3Example3').value.trim();
            var password = document.getElementById('form3Example4').value.trim();

            if (email === '' && password === '') {
                // Tampilkan SweetAlert untuk pesan kesalahan
                Swal.fire({
                    title: 'Error!',
                    text: 'Silahkan Masukan Email & Password.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            } else if (email === '') {
                // Validasi alamat email
                Swal.fire({
                    title: 'Error!',
                    text: 'Silahkan Masukan Email',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            } else if (password === '') {
                // Validasi alamat email
                Swal.fire({
                    title: 'Error!',
                    text: 'Silahkan Masukan Password',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Jika validasi lolos, submit formulir
            event.target.submit();
        });
    </script>


</body>

</html>
