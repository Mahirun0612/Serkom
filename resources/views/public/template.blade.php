<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.min.css') }}">
    <style>
        body{
            font-family: 'open sans', sans-serif;
            padding-top: 76px; /* Untuk mengkompensasi navbar fixed */
        }
        .navbar{
            transition: all .4s ease-in-out;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-background{
            background-color: #ffffff;
        }
        .navbar .nav-link{
            color: #222;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .navbar .nav-link:hover{
            color: #007bff;
        }
        .navbar .navbar-brand{
            color: #222;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* Style untuk toggle button */
        .navbar-toggler {
            border: 1px solid #ddd;
            padding: 4px 8px;
        }

        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
        }

        /* Style untuk navbar-toggler-icon */
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.7%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            width: 1.2em;
            height: 1.2em;
        }
    </style>
</head>
<body>
    <nav id="mainNav" class="navbar navbar-expand-lg fixed-top navbar-background">
        <div class="container">
            <img src="{{ asset('storage/foto-sekolah/smpn-1-sukarame1-removebg-preview.png') }}" alt="logo" width="50" class="me-2">
            <a href="{{ route('beranda') }}" class="navbar-brand fw-bold">SMPN 1 SUKARAME</a>

            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible Content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.profil') }}">Profil Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.ekskul') }}">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.gallery') }}">Galeri</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="mt-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light pt-4">
        <div class="container">
            <div class="row">
                <!-- Kolom 1: Tentang -->
                <div class="col-md-4 mb-3">
                    <h5>About Us</h5>
                    <p>
                        Website sekolah sebagai media informasi dan komunikasi
                        antara sekolah, siswa, orang tua, dan masyarakat luas.
                    </p>
                </div>

                <!-- Kolom 2: Link -->
                <div class="col-md-4 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('beranda') }}" class="text-light text-decoration-none">Beranda</a></li>
                        <li><a href="{{ route('public.profil') }}" class="text-light text-decoration-none">Profil</a></li>
                        <li><a href="{{ route('public.berita') }}" class="text-light text-decoration-none">Berita</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Kontak -->
                <div class="col-md-4 mb-3">
                    <h5>Contact</h5>
                    <p>
                        📍 Jl. Lapang Bola No. 117, SUKARAME, Kec. Sukarame, Kab. Tasikmalaya, Jawa Barat<br>
                        📞 0265545483<br>
                        ✉️ smpn1sukarame@yahoo.co.id
                    </p>
                </div>
            </div>

            <!-- Copyright -->
            <div class="text-center py-3 border-top border-secondary mt-3">
                <small>© 2025 SMPN 1 SUKARAME. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- JavaScript Bootstrap -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Optional: Script untuk navbar scroll effect -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('mainNav');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('navbar-background');
                } else {
                    navbar.classList.remove('navbar-background');
                }
            });
        });
    </script>

</body>
</html>
