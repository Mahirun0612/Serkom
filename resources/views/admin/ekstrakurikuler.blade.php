@extends('admin.template')
@section('content')
<div class="container mt-4">
    <div class="py-3 fw-bold text-white d-flex justify-content-between" style="background-color: black;width:100%;border-radius:10px">
        <h3 class="ms-3">Ekstrakurikuler</h3>
        <a href="/create/ekstrakurikuler" class="btn btn-success mb-2 me-3">
            <i class="fa-solid fa-sitemap me-1"></i> Tambah Ekskul
        </a>
    </div>
    <hr>
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Ekskul</th>
                            <th>Pembina</th>
                            <th>Jadwal Latihan</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ekskul as $item)
                        <tr>
                            <td>{{ $item->nama_ekskul }}</td>
                            <td>{{ $item->pembina }}</td>
                            <td>{{ $item->jadwal_latihan }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td><img src="{{ asset('storage/foto-ekskul/'.$item->foto) }}" alt="File {{ $item->name }}"
                                class="rounded" width="50" height="50" style="object-fit: cover;">
                            </td>
                            <td>
                                <a href="{{route('ekskul.delete',Crypt::encrypt($item->id))}}" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this data')"><i class="fas fa-trash"></i> Delete</a>
                                <a href="{{ route('ekskul.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script> new DataTable('#example')</script>
@endsection
