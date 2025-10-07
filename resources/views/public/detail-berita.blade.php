@extends('public.template')
@section('content')
<div class="container py-5">
    <h2 class="text-black bg-success py-3  text-center">Berita</h2>
    <hr>
    <div class="row mt-4 justify-content-center">
    <!-- Gambar Ekskul -->
        <div class="col-md-6 text-center">
            {{-- Menampilkan gambar berita --}}
            <img src="{{ asset('storage/foto-berita/' . $berita->foto) }}" class="img-fluid rounded" style="max-height: 400px;" alt="{{ $berita->judul }}">
        </div>
        @csrf

        <div class="col-md-6">
            {{-- Judul berita --}}
            <h2>{{ $berita->judul }}</h2>
            {{-- Tanggal berita --}}
            <small class="text-muted mb-2" style="font-size: 18px">
                <i class="far fa-calendar me-1"></i>
                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
            </small>
            <div class="mt-4">
                {{-- Deskripsi berita --}}
                <h5>Deskripsi</h5>
                <p>{{ $berita->isi }}</p>
            </div>
            {{-- Tombol kembali ke daftar berita --}}
            <a href="{{ route('public.berita') }}" class="btn btn-secondary">← Kembali ke Daftar Berita</a>
        </div>
    </div>
</div>
@endsection
