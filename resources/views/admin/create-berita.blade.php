@extends('admin.template')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 450px;">

        {{-- Card Header --}}
        <div class="card-header text-white text-center rounded-top-4"
             style="background: #17581b;">
            <h3 class="mb-0 fw-bold">
                <i class="fas fa-plus me-2"></i>Berita
            </h3>
        </div>

        <div class="card-body p-4">
            {{-- Form untuk membuat berita --}}
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Input Judul --}}
                <div class="form-floating mb-3">
                    <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul" required>
                    <label for="judul">Judul</label>
                </div>

                {{-- Input Isi Berita --}}
                <div class="mb-3">
                    <label for="isi" class="mb-2">Isi Berita</label>
                    <textarea name="isi" id="isi" rows="5" style="width: 400px"></textarea>
                </div>

                {{-- Input Tanggal --}}
                <div class="form-floating mb-3">
                    <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" required>
                    <label for="tanggal">Tanggal</label>
                </div>

                {{-- Input Foto --}}
                <div>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>

                {{-- Pilihan User --}}
                <div class="mb-3">
                    <label for="user_id" class="form-label fw-semibold">User</label>
                    <select name="user_id" id="user_id" class="form-select">
                        @foreach ($user as $item)
                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Tombol Submit --}}
                <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm" style="transition:0.3s;">
                    Tambah
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
