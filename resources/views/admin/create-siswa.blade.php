@extends('admin.template')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 450px;">

        <div class="card-header text-white text-center rounded-top-4"
             style="background: #17581b;">
            <h3 class="mb-0 fw-bold">
                <i class="fas fa-plus me-2"></i>Siswa
            </h3>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" id="nama_siswa" name="nama_siswa" class="form-control" placeholder="Nama_siswa" required>
                    <label for="nama_siswa">Nama Siswa</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" id="nisn" name="nisn" class="form-control" placeholder="Nisn" required>
                    <label for="nisn">Nisn</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="year" id="tahun_masuk" name="tahun_masuk" class="form-control" placeholder="Tahun_masuk" required>
                    <label for="tahun_masuk">Tahun Masuk</label>
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label fw-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                    <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm" style="transition:0.3s;">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
