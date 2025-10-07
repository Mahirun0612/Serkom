@extends('admin.template')
@section('content')
<!-- Kontainer utama untuk dashboard -->
<div class="container mt-4">

  <!-- Header Dashboard -->
  <div class="py-3 fw-bold text-white" style="background-color: black;width:100%;border-radius:10px">
    <!-- Judul dashboard -->
    <h3 class="ms-3">Dashboard</h3>
  </div>

  <!-- Garis horizontal pemisah -->
  <hr>
  <div class="d-md-flex gap-3">

    <!-- card untuk menampilkan jumlah siswa -->
    <div class="card bg bg-success" style="width: 300px">
      <div class="card-body d-flex align-items-center justify-content-between text-white">
        <!-- Ikon untuk siswa -->
        <i class="fa-solid fa-users" style="font-size: 50px"></i>
        <div class="item-count text-end">
          <h1>{{ $siswa->count() }}</h1> <!-- Menampilkan jumlah siswa -->
          <h6>Data Siswa</h6> <!-- Deskripsi kategori -->
        </div>
      </div>
    </div>

    <!-- card untuk menampilkan jumlah guru -->
    <div class="card bg bg-warning" style="width: 300px">
      <div class="card-body d-flex align-items-center justify-content-between text-white">
        <!-- Ikon untuk guru -->
        <i class="fa-solid fa-circle-user" style="font-size: 50px"></i>
        <div class="item-count text-end">
          <h1>{{ $guru->count() }}</h1> <!-- Menampilkan jumlah guru -->
          <h6>Data Guru</h6> <!-- Deskripsi kategori -->
        </div>
      </div>
    </div>

    <!-- card untuk menampilkan jumlah berita -->
    <div class="card bg bg-danger" style="width: 300px">
      <div class="card-body d-flex align-items-center justify-content-between text-white">
        <!-- Ikon untuk berita -->
        <i class="fa-solid fa-newspaper" style="font-size: 50px"></i>
        <div class="item-count text-end">
          <h1>{{ $berita->count() }}</h1> <!-- Menampilkan jumlah berita -->
          <h6>Berita</h6> <!-- Deskripsi kategori -->
        </div>
      </div>
    </div>

    <!-- card untuk menampilkan jumlah galeri -->
    <div class="card bg bg-secondary" style="width: 300px">
      <div class="card-body d-flex align-items-center justify-content-between text-white">
        <!-- Ikon untuk galeri -->
        <i class="fa-solid fa-images" style="font-size: 50px"></i>
        <div class="item-count text-end">
          <h1>{{ $galeri->count() }}</h1> <!-- Menampilkan jumlah galeri -->
          <h6>Galeri</h6> <!-- Deskripsi kategori -->
        </div>
      </div>
    </div>

    <!-- card untuk menampilkan jumlah ekstrakurikuler -->
    <div class="card bg bg-primary" style="width: 300px">
      <div class="card-body d-flex align-items-center justify-content-between text-white">
        <!-- Ikon untuk ekstrakurikuler -->
        <i class="fa-solid fa-sitemap" style="font-size: 50px"></i>
        <div class="item-count text-end">
          <h1>{{ $ekskul->count() }}</h1> <!-- Menampilkan jumlah ekstrakurikuler -->
          <h6>Ekskul</h6> <!-- Deskripsi kategori -->
        </div>
      </div>
    </div>
  </div>

  <!-- Garis horizontal pemisah di bawah card -->
  <hr>

</div>

@endsection
