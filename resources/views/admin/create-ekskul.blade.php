@extends('admin.template')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 450px;">

        <div class="card-header text-white text-center rounded-top-4"
             style="background: #17581b;">
            <h3 class="mb-0 fw-bold">
                <i class="fas fa-plus me-2"></i>Ekstrakurikuler
            </h3>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('ekskul.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" id="nama_ekskul" name="nama_ekskul" class="form-control" placeholder="Nama Ekskul" required>
                    <label for="nama_ekskul">Nama Ekskul</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" id="pembina" name="pembina" class="form-control" placeholder="pembina" required>
                    <label for="pembina">Pembina</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" id="jadwal_latihan" name="jadwal_latihan" class="form-control" placeholder="Jadwal Latihan" required>
                    <label for="jadwal_latihan">Jadwal Latihan</label>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" style="width: 400px"></textarea>
                </div>

                <div>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                    <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm mt-3" style="transition:0.3s;">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
