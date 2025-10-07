@extends('operator.template')
@section('content')

<div class="container mt-4">
    <div class="py-3 fw-bold text-white d-flex justify-content-between" style="background-color: black;width:100%;border-radius:10px">
        <h3 class="ms-3">Berita</h3>
        <a href="/create/berita" class="btn btn-success mb-2 me-3">
            <i class="fa-solid fa-newspaper me-1"></i> Tambah
        </a>
    </div>
    <hr>

    <div class="card shadow-lg border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->isi }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td><img src="{{ asset('storage/foto-berita/'.$item->foto) }}" alt="Foto {{ $item->name }}"
                             class="rounded" width="50" height="50" style="object-fit: cover;"></td>
                            <td>
                                <a href="{{route('berita.delete',Crypt::encrypt($item->id))}}" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this data')"><i class="fas fa-trash"></i> Delete</a>
                                <a href="{{ route('berita.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="bi bi-pencil-square"></i> Edit</a>
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
