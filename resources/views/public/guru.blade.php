@extends('public.template')
@section('content')
<div class="container py-5 text-center">
    <h2 class="text-white mb-4 bg-success py-3">Guru</h2>

    <div class="row g-4 mt-3 justify-content-center">
      <!-- Card 1 -->
        @foreach ($guru as $item)
        <div class="col-12 col-mb-6 col-lg-3 d-flex gap-3">
            <div class="card h-100 shadow-sm border-2"
            style="width: 400px">
                <img src="{{ asset('storage/foto-guru/'.$item->foto) }}" class="card-img-top" alt=""
                style="height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h2 class="card-title ">{{ $item->nama_guru }}</h2>
                    <p class="card-text text-muted">Mapel : {{ $item->mapel }}</p>
                    <small class="text-muted mb-2" style="font-size: 12px">
                       Nip : {{ $item->nip }}
                    </small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
