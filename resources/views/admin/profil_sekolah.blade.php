@extends('admin.template')
@section('content')
<div class="container mt-4">
    <div class="py-3 fw-bold text-white d-flex justify-content-between" style="background-color: black;width:100%;border-radius:10px">
        <h3 class="ms-3">Profil Sekolah</h3>
    </div>
    <hr>
    <!-- Konten Utama -->
    <div class="container my-5">
    <div class="row g-4">
        <!-- Gambar Sekolah -->
        <div class="col-md-6">
        <img src="https://via.placeholder.com/600x400" alt="Foto Sekolah" class="img-fluid rounded">
        </div>

        <!-- Deskripsi -->
        <div class="col-md-6">
        <h2>Tentang Sekolah</h2>
        <p>SMA Negeri 1 Contoh berdiri sejak tahun 1985 dan telah menjadi salah satu sekolah unggulan di kota ini. Dengan fasilitas lengkap dan tenaga pengajar profesional, kami berkomitmen untuk memberikan pendidikan terbaik bagi siswa-siswi kami.</p>
        </div>
    </div>
    </div>

    <!-- Visi & Misi -->
    <section class="bg-light py-5">
    <div class="container">
        <div class="row">
        <div class="col-md-6 mb-4">
            <h3>Visi</h3>
            <p>Menjadi sekolah unggulan dalam prestasi akademik dan non-akademik serta membentuk generasi yang berkarakter dan berdaya saing global.</p>
        </div>
        <div class="col-md-6">
            <h3>Misi</h3>
            <ul>
            <li>Meningkatkan kualitas pembelajaran.</li>
            <li>Menanamkan nilai-nilai moral dan etika.</li>
            <li>Mendorong prestasi siswa dalam berbagai bidang.</li>
            <li>Mengembangkan potensi siswa sesuai minat dan bakat.</li>
            </ul>
        </div>
        </div>
    </div>
    </section>

    <section class="py-5 bg-body-secondary">
    <div class="container">
        <h3 class="mb-4">Kontak Sekolah</h3>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Alamat:</strong> Jl. Pendidikan No. 123, Kota Contoh</p>
                <p><strong>Telepon:</strong> (021) 12345678</p>
                <p><strong>Email:</strong> info@sman1contoh.sch.id</p>
            </div>
        </div>
    </div>
    </section>
</div>
@endsection
