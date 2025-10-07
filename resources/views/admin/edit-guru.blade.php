@extends('admin.template')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 450px;">

        <div class="card-header text-white text-center rounded-top-4"
             style="background: #17581b;">
            <h3 class="mb-0 fw-bold">
                <i class="fas fa-plus me-2"></i>Edit Guru
            </h3>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('guru.update', Crypt::encrypt($guru->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" id="nama_guru" name="nama_guru" class="form-control" placeholder="Nama_guru" value="{{ old('nama_guru', $guru->nama_guru) }}" required>
                    <label for="nama_guru">Nama Guru</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="integer" id="nip" name="nip" class="form-control" placeholder="Nip" value="{{ old('nip', $guru->nip) }}" required maxlength="15">
                    <label for="nip">Nip</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" id="mapel" name="mapel" class="form-control" placeholder="mapel" value="{{ old('mapel', $guru->mapel) }}" required>
                    <label for="mapel">Mapel</label>
                </div>
                <div class="mb-3">
                    <input type="file" name="foto" id="foto" class="form-control">
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
