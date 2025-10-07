@extends('admin.template')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 450px;">

        {{-- Card Header --}}
        <div class="card-header text-white text-center rounded-top-4"
             style="background: #17581b;">
            <h3 class="mb-0 fw-bold">
                <i class="fas fa-plus me-2"></i>Guru
            </h3>
        </div>

        <div class="card-body p-4">
            {{-- form untuk membuat data guru --}}
            <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- input nama guru --}}
                <div class="form-floating mb-3">
                    <input type="text" id="nama_guru" name="nama_guru" class="form-control" placeholder="Nama_guru" required>
                    <label for="nama_guru">Nama Guru</label>
                </div>
                {{-- input nip guru --}}
                <div class="form-floating mb-3">
                    <input type="integer" id="nip" name="nip" class="form-control" placeholder="Nip" required maxlength="15">
                    <label for="nip">Nip</label>
                </div>

                {{-- input mapel --}}
                <div class="form-floating mb-3">
                    <input type="text" id="mapel" name="mapel" class="form-control" placeholder="mapel" required>
                    <label for="mapel">Mapel</label>
                </div>
                <div class="mb-3">
                    {{-- input foto guru --}}
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                    {{-- button submit --}}
                    <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm" style="transition:0.3s;">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
