@extends('public.template')
@section('content')
<div class="container py-5 text-center">
    <!-- Judul halaman Siswa -->
    <h2 class="text-white mb-4 bg-success py-3">Siswa</h2>

    <!-- Card untuk menampilkan tabel -->
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <!-- Membuat tabel responsif dengan overflow -->
            <div class="table-responsive">
                <!-- Tabel yang menampilkan data siswa -->
                <table id="siswa" class="table table-hover mb-0">
                    <thead class="table-dark">
                        <!-- Judul kolom tabel -->
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Nisn</th>
                            <th>Jenis Kelamin</th>
                            <th>Tahun Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Looping data siswa -->
                        @foreach ($siswa as $item)
                        <tr>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->tahun_masuk }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>new DataTable('#siswa')</script>
@endsection
