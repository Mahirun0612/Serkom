@extends('public.template')

@section('content')

<style>
    /* background Section */
    .background-header {
        background: url('{{ asset('storage/foto-guru/IMG-20230614-WA0076.jpg') }}') center/cover no-repeat;
        min-height: 100vh;
        display: flex;
        align-items: center;
        color: #fff;
        position: relative;
    }
    .background-header::before {
        content:"";
        position:absolute;
        top:0;left:0;width:100%;height:100%;
        background:rgba(0,0,0,.5);
    }
    .background-header-inner {
        position: relative;
        z-index: 2;
    }
    .about-images {
        display: grid;
        gap: 10px;
        height: 450px; /* batas tinggi */
    }
    .about-text {
        max-height: 450px;
        overflow-y: auto;
        padding-right: 10px;
    }
</style>

<div id="home" class="container-fluid background-header">
    <div class="container background-header-inner">
        <div class="row">
            <div class="col-10 col-lg-5 text-center text-lg-start">
                <h1 class="display-4 display-lg-1 mb-3 mb-lg-4">Selamat Datang di SMPN 1 Sukarame</h1>
            </div>
        </div>
    </div>
</div>

<div id="about" class="container-fluid py-5">
  <div class="container py-4 py-md-5">
    <div class="row g-4 g-md-5 align-items-center">
      <div class="col-12 d-flex justify-content-center col-md-6 mb-3 mb-md-0">
        <div class="about-images">
          <img src="{{ asset('storage/foto-sekolah/smpn-1-sukarame1.webp') }}" class="img-fluid" alt="">
        </div>
      </div>
      <div class="col-12 d-flex align-items-center flex-column col-md-6 about-text" style="position: relative; top: -50px;">
        <h1 class="fs-6 fs-md-5 text-uppercase text-black"><b>Tentang SMPN 1 Sukarame</b></h1>
        <p>
          SMP N 1 Sukarame adalah sebuah lembaga sekolah Sekolah Menengah Pertama negeri yang berlokasi di Jl. Lapang Bola No. 117, Kab. Tasikmalaya.
          SMP negeri ini memulai kegiatan pendidikan belajar mengajarnya pada tahun 1984.Sekarang SMP N 1 Sukarame memakai panduan kurikulum belajar
          SMP 2013. SMP N 1 Sukarame dibawah kepemimpinan seorang kepala sekolah yang bernama Ise Koswaradan operator sekolah Devy Darwis.
        </p>
      </div>
    </div>
  </div>
</div>

<div class="py-3 text-white">
    <div class="container">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-3 col-md-3 mb-3 text-center rounded shadow-sm bg-success me-2">
                <h3 class="fw-bold">Murid</h3>
                <h2>{{ $siswa->count() }}</h2>
            </div>
            <div class="col-3 col-md-3 mb-3 text-center rounded shadow-sm bg-success me-2">
                <h3 class="fw-bold">Guru</h3>
                <h2>{{ $guru->count() }}</h2>
            </div>
            <div class="col-3 col-md-3 mb-3 text-center rounded shadow-sm bg-success">
                <h3 class="fw-bold">Ekstrakurikuler</h3>
                <h2>{{ $ekskul->count() }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 text-center">
    <h2 class="text-teal mb-4 bg-secondary py-3">Berita</h2>

    <div class="row g-4 mt-3 justify-content-center">
      <!-- Card 1 -->
        @foreach ($berita as $item)
        <div class="col-12 col-mb-6 col-lg-3 d-flex gap-3">
            <div class="card h-100 shadow-sm border-2"
            style="width: 400px">
                <img src="{{ asset('storage/foto-berita/'.$item->foto) }}" class="card-img-top" alt=""
                style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h2 class="card-title ">{{ $item->judul }}</h2>
                    <p class="card-text text-muted">{{ $item->isi }}</p>
                    <small class="text-muted mb-2" style="font-size: 12px">
                        <i class="far fa-calendar me-1"></i>
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </small>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <button class="text-center text-white" style="border-radius: 10px; background-color: blue; width: 75%;" >Baca Selengkapnya</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
