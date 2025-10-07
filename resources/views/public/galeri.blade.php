@extends('public.template')
@section('content')
<div class="container py-5 ">
    <h2 class="text-white bg-success py-3 rounded text-center">Galeri</h2>
    <div class="row g-3 g-md-4 justify-content-center mt-3">
        @foreach ($galeri as $item)
        <div class="col-12 col-mb-6 col-lg-3 d-flex gap-3">
            <div class="h-100">
                @if ($item->kategori == 'Foto')
                    <div class="shadow rounded overflow-hidden" style="height: 250px">
                        <img src="{{ asset('storage/galeri/'. $item->file) }}"
                        class="img-fluid w-100 h-100" alt="{{ $item->judul }}"
                        style="object-fit: cover;">
                    </div>
                @else
                    <div class="shadow rounded overflow-hidden" style="height: 250px">
                        <video class="w-100 h-100" controls style="object-fit: cover;">
                            <source src="{{ asset('storage/galeri/'. $item->file) }}" type="video/mp4">
                        </video>
                    </div>
                @endif
                <div class="card-body shadow-sm rounded">
                    <h2 class="card-title ms-2">{{ $item->judul }}</h2>
                    <p class="card-text text-muted ms-2">{{ Str::limit(strip_tags($item->keterangan), 100, '...') }}</p>
                    <small class="text-muted mb-2 ms-2" style="font-size: 12px">
                        <i class="far fa-calendar me-1"></i>
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
