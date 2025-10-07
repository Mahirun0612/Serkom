@extends('admin.template')
@section('content')
<div class="container mt-4">
    <div class="py-3 fw-bold text-white d-flex justify-content-between" style="background-color: black;width:100%;border-radius:10px">
        <h3 class="ms-3">Data Guru</h3>
        <a href="/create/guru" class="btn btn-success mb-2 me-3">
            <i class="fa-solid fa-user-plus me-1"></i> Tambah Guru
        </a>
    </div>
    <hr>

    <div class="card shadow-lg border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Guru</th>
                            <th>Nip</th>
                            <th>Mapel</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guru as $item)
                        <tr>
                            <td>{{ $item->nama_guru }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->mapel }}</td>
                            <td><img src="{{ asset('storage/foto-guru/'.$item->foto) }}" alt="Foto {{ $item->name }}"
                             class="rounded" width="50" height="50" style="object-fit: cover;"></td>
                            <td>
                                <a href="{{route('guru.delete',Crypt::encrypt($item->id))}}" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this data')"><i class="fas fa-trash"></i> Delete</a>
                                <a href="{{ route('guru.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-pencil"></i>Edit</a>
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
