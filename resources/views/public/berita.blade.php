@extends('public.template')
@section('content')
<div class="container py-5 text-center">
    <h2 class="text-black bg-success py-3">Berita</h2>
    <hr>
    <div class="row mt-4 justify-content-center">
        @foreach ($berita as $item)
        <div class="col-12 col-mb-6 col-lg-3 d-flex gap-3">
            <div class="card h-100 shadow-sm border-2"
            style="width: 400px">
                <img src="{{ asset('storage/foto-berita/'.$item->foto) }}" alt=""
                style="height: 200px; object-fit: cover; border-radius: 5px;">
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
