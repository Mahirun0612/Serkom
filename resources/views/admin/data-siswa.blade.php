@extends('admin.template')
@section('content')
<div class="container mt-4">
   <div class="py-3 fw-bold text-white d-flex justify-content-between" style="background-color: black;width:100%;border-radius:10px">
        <h3 class="ms-3">Data Siswa</h3>
        <a href="/create/siswa" class="btn btn-success mb-2 me-3">
            <i class="fa-solid fa-user-plus me-1"></i> Tambah Siswa
        </a>
    </div>
    <hr>

    <div class="card shadow-lg border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Nisn</th>
                            <th>Jenis Kelamin</th>
                            <th>Tahun Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $item)
                        <tr>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->tahun_masuk }}</td>
                            <td>
                                <a href="{{route('siswa.delete',Crypt::encrypt($item->id))}}" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this data')"><i class="fas fa-trash"></i> Delete</a>
                                <a href="{{ route('siswa.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
new DataTable('#example', {
    responsive: true
})
</script>
@endsection
