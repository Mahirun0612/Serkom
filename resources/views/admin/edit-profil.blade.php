@extends('admin.template')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 450px;">

        <div class="card-header text-white text-center rounded-top-4"
             style="background: #17581b;">
            <h3 class="mb-0 fw-bold">
                <i class="fas fa-plus me-2"></i>Edit Profil
            </h3>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

        <div class="card-body p-4">
            <form action="{{ route('profil.update', Crypt::encrypt($profil->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" id="nama_sekolah" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah" value="{{ old('nama_sekolah', $profil->nama_sekolah) }}" required>
                    <label for="nama_sekolah">Nama Sekoah</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="kepala_sekolah" name="kepala_sekolah" class="form-control" placeholder="Kepala Sekolah" value="{{ old('kepala_sekolah', $profil->kepala_sekolah) }}" required>
                    <label for="kepala_sekolah">Kepala Sekoah</label>
                </div>
                <div class="mb-3">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="npsn" name="npsn" class="form-control" placeholder="Npsn" value="{{ old('npsn', $profil->npsn) }}" required>
                    <label for="npsn">Npsn</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" value="{{ old('alamat', $profil->alamat) }}" required>
                    <label for="alamat">Alamat</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="kontak" name="kontak" class="form-control" placeholder="Kontak" value="{{ old('kontak', $profil->kontak) }}" required>
                    <label for="kontak">Kontak</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="visi_misi" name="visi_misi" class="form-control" placeholder="visi_misi" value="{{ old('visi_misi', $profil->visi_misi) }}" required>
                    <label for="visi_misi">Visi & Misi</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="year" id="tahun_berdiri" name="tahun_berdiri" class="form-control" placeholder="Tahun Berdiri" value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}" required>
                    <label for="tahun_berdiri">Tahun Berdiri</label>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="mb-2" >Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" style="width: 400px" required>{{ $profil->deskripsi }}</textarea>
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
