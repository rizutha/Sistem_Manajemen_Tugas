<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Managemen Tugas</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Optional: Add your own CSS styles here -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!-- content -->
    @yield('content')

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
