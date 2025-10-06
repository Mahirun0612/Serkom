@extends('admin.template')
@section('content')
<div class="container mt-4">
    <div class="py-3 fw-bold text-white" style="background-color: black;width:100%;border-radius:10px">
        <h3 class="ms-3">Dashboard</h3>
    </div>
    <hr>
    <div class="d-md-flex gap-3">
        <div class="card bg bg-success" style="width: 300px">
            <div class="card-body d-flex align-items-center justify-content-between text-white">
                <i class="fa-solid fa-users" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h1>{{ $siswa->count() }}</h1>
                    <h6>Data Siswa</h6>
                </div>
            </div>
        </div>

        <div class="card bg bg-warning" style="width: 300px">
            <div class="card-body d-flex align-items-center justify-content-between text-white">
                <i class="fa-solid fa-circle-user" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h1>{{ $guru->count() }}</h1>
                    <h6>Data Guru</h6>
                </div>
            </div>
        </div>

        <div class="card bg bg-danger" style="width: 300px">
            <div class="card-body d-flex align-items-center justify-content-between text-white">
                <i class="fa-solid fa-newspaper" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h1>{{ $berita->count() }}</h1>
                    <h6>Berita</h6>
                </div>
            </div>
        </div>

        <div class="card bg bg-secondary" style="width: 300px">
            <div class="card-body d-flex align-items-center justify-content-between text-white">
                <i class="fa-solid fa-images" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h1>{{ $galeri->count() }}</h1>
                    <h6>Galeri</h6>
                </div>
            </div>
        </div>

        <div class="card bg bg-primary" style="width: 300px">
            <div class="card-body d-flex align-items-center justify-content-between text-white">
                <i class="fa-solid fa-sitemap" style="font-size: 50px"></i>
                <div class="item-count text-end">
                    <h1>{{ $ekskul->count() }}</h1>
                    <h6>Ekskul</h6>
                </div>
            </div>
        </div>
    </div>
    <hr>


</div>
@endsection
