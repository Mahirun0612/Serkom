@extends('public.template')
@section('content')
<div class="container py-5 text-center">
    <h2 class="text-black bg-success py-3">Ekstrakurikuler</h2>
    <hr>
    <div class="row mt-4 justify-content-center">
        @foreach ($ekskul as $item)
            <div class="col-12 col-mb-6 col-lg-3 d-flex gap-3">
                <div class="card h-100 shadow-sm border-1" style="width: 400px">
                    <img src="{{ asset('storage/foto-ekskul/'.$item->foto) }}" alt=""
                    style="height: 200px; object-fit:cover; border-radius: 5px;">
                    <div class="card-body">
                        <h2 class="card-title">{{ $item->nama_ekskul }}</h2>
                        <p class="card-text">{{ $item->deskripsi }}</p>
                        <p class="card-text text-muted">Pembina: {{ $item->pembina }}</p>
                        <p class="card-text text-muted">Latihan: {{ $item->jadwal_latihan }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
