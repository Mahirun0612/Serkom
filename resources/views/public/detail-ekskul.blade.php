@extends('public.template')
@section('content')
<div class="container my-5">
    <h2 class="text-white bg-success py-3 text-center">Ekstrakurikuler</h2>
    <hr>
    <div class="row">
        <!-- Gambar Ekskul -->
        <div class="col-md-6">
            <img src="{{ asset('storage/foto-ekskul/' . $ekskul->foto) }}"
                 class="img-fluid rounded shadow-sm"
                 alt="{{ $ekskul->nama_ekskul }}">
        </div>

        <!-- Informasi Ekskul -->
        <div class="col-md-6">
            <h1 class="mb-3">{{ $ekskul->nama_ekskul }}</h1>

            <p class="lead">
                {{ $ekskul->deskripsi }}
            </p>

            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item"><strong>Jadwal Latihan:</strong> {{ $ekskul->jadwal_latihan ?? 'Tidak tersedia' }}</li>
                <li class="list-group-item"><strong>Pembina:</strong> {{ $ekskul->pembina ?? 'Tidak tersedia' }}</li>
            </ul>

            <a href="{{ route('public.ekskul') }}" class="btn btn-secondary">← Kembali ke Daftar Ekskul</a>
        </div>
    </div>
</div>
@endsection
