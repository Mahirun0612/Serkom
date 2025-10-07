<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')  Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>
    <script src ="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>
    <link herf="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link herf="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link herf="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap5.css" rel="stylesheet">


    <style>
        body{
            background-color: #ffffff;
        }
        .sidebar{
            height: 100vh;
            background-color: #17581b;
            position: fixed;
        }
        .sidebar a{
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover{
            background-color: rgb(208, 203, 203)
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-flex flex-column sidebar d-none d-md-block">
                <div class="py-4 text-center">
                    <h3 class="text-white">SMPN 1 Sukarame</h3>
                    <hr class="text-white">
                </div>
                    <div class="navbar-nav me-auto">
                        <div class="nav-item d-flex align-items-center">
                            <a class="nav-link d-flex align-items-center" href="{{ route('operator.dashboard') }}">
                                <i class="fa-solid fa-house me-3" style="font-size: 16px;"></i>
                                Dashboard
                            </a>
                        </div>
                        <div class="nav-item d-flex align-items-center">
                            <a class="nav-link d-flex align-items-center" href="{{ route('operator.berita') }}">
                                <i class="fa-solid fa-newspaper me-2" style="font-size: 16px;"></i>
                                Berita
                            </a>
                        </div>
                        <div class="nav-item d-flex align-items-center">
                            <a class="nav-link d-flex align-items-center" href="{{ route('operator.galeri') }}">
                                <i class="fa-solid fa-images me-2" style="font-size: 16px;"></i>
                                Galeri
                            </a>
                        </div>
                        <div class="nav-item d-flex align-items-center">
                            <a class="nav-link d-flex align-items-center" href="{{ route('operator.ekstrakurikuler') }}">
                                <i class="fas fa-sitemap me-2" style="font-size: 16px;"></i>
                                Ekstrakurikuler
                            </a>
                        </div>
                        <div class="nav-item d-flex align-items-center">
                            <a class="nav-link d-flex align-items-center" href="{{ route('operator.profil') }}">
                                <i class="fa-solid fa-school me-2" style="font-size: 16px;"></i>
                                Profil Sekolah
                            </a>
                        </div>
                        <div class="nav-item d-flex align-items-center mt-auto">
                            <a class="nav-link d-flex align-items-center" href="{{ route('operator.logout') }}">
                                <i class="me-3 fa-solid fa-right-from-bracket text-white" style="font-size: 16px;"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            <main class="col-md-10 ms-sm-auto px-4 py-4">
            <h2 class="mb-4">@yield('title')</h2>
            @yield('content')
            </main>
        </div>
    </div>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
