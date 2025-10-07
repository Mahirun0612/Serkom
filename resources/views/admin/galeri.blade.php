@extends('admin.template')
@section('content')
<div class="container mt-4">
    <div class="py-3 fw-bold text-white d-flex justify-content-between" style="background-color: black;width:100%;border-radius:10px">
        <h3 class="ms-3">Galeri</h3>
        <a href="/create/galeri" class="btn btn-success mb-2 me-3">
            <i class="fa-solid fa-image me-1"></i> Tambah
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
                            <th>Keterangan</th>
                            <th>File</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galeri as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                @if ($item->kategori == 'Foto')
                                    <img src="{{ asset('storage/galeri/'.$item->file) }}" width="120" class="img-thumbnail">
                                @elseif ($item->kategori == 'Video')
                                    <video width="150" controls>
                                        <source src="{{ asset('storage/galeri/'.$item->file) }}" type="video/mp4">
                                    </video>
                                @endif
                            </td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                <a href="{{route('galeri.delete',Crypt::encrypt($item->id))}}" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this data')"><i class="fas fa-trash"></i> Delete</a>
                                <a href="{{ route('galeri.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-outline-primary me-2">
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
