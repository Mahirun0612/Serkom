@extends('admin.template')
@section('content')
<div class="container mt-4">
    <div class="py-3 fw-bold text-white d-flex justify-content-between" style="background-color: black;width:100%;border-radius:10px">
        <h3 class="ms-3">Profil Sma Art Ob</h3>
        <a href="{{ route('profil.edit',Crypt::encrypt($profil->id)) }}" class="btn btn-success mb-2 me-3">
            <i class="fa-solid fa-pencil me-1"></i> Edit Profil
        </a>
    </div>
    <hr>
    <!-- Konten Utama -->
    <div class="container my-5">
    <div class="row g-4">
        <!-- Gambar Sekolah -->
        <div class="col-md-4">
        <img src="{{ asset('storage/foto-sekolah/'.$profil->logo) }}" alt="Foto Sekolah" class="img-fluid rounded"
        style="width: 270px;">
        </div>

        <!-- Deskripsi -->
        <div class="col-md-4" style="position: relative; top: 40px;">
        <h2>Tentang Sekolah</h2>
        <p>{{ $profil->deskripsi }}</p>
        </div>

        <div class="col-md-4 text-center">
            <img src="{{ asset('storage/foto-sekolah/'.$profil->foto) }}" class="img-fluid mb-2" alt="Kepala_sekolah" width="200" height="250">
            <p class="fw-bold mb-0">{{ $profil->kepala_sekolah }}</p>
            <small class="text-muted">Kepala Sekolah</small>
        </div>
    </div>
    </div>

    <!-- Visi & Misi -->
    <section class="bg-light py-5">
    <div class="container">
        <div class="col-md-10 mb-4">
            <h3>Visi & Misi</h3>
            <p>{{ $profil->visi_misi }}</p>
        </div>
    </div>
    </section>

    <section class="py-5 bg-body-secondary">
    <div class="container table">
        <h3 class="mb-4 text-center">Kontak Sekolah</h3>
        <div class="row justify-content-center">
            <div class="col-md-7">
                <p><strong>Alamat:</strong> {{ $profil->alamat }}</p>
                <p><strong>Telepon:</strong> {{ $profil->kontak }}</p>
                <p><strong>Npsn:</strong> {{ $profil->npsn }}</p>
                <p><strong>Email:</strong> smpn1sukarame@yahoo.co.id</p>
            </div>
        </div>
    </div>
    </section>
</div>
@endsection
