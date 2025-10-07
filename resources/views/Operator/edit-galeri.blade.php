@extends('operator.template')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 450px;">

        <div class="card-header text-white text-center rounded-top-4"
             style="background: #17581b;">
            <h3 class="mb-0 fw-bold">
                <i class="fas fa-plus me-2"></i>Edit Galeri
            </h3>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('galeri.update', Crypt::encrypt($galeri->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul" value="{{ old('judul', $galeri->judul) }}" required>
                    <label for="judul">Judul</label>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="mb-2" >Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="5" style="width: 400px">{{ $galeri->keterangan }}</textarea>
                </div>

                <div>
                    <input type="file" name="file" id="file" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="Foto">Foto</option>
                        <option value="Video">Video</option>
                    </select>
                </div>

                    <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm" style="transition:0.3s;">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
