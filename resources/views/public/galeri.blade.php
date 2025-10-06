@extends('public.template')
@section('content')
<div class="container py-5 text-center">
    <h2 class="text-black bg-success py-3 rounded">Galeri</h2>
    <div class="row g-3 g-md-4">
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
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
