<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\Profil_sekolah;
use App\Models\Siswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'username' => 'User',
            'password' => bcrypt('123456'),
            'role' => 'Admin',
        ]);

        Siswa::create([
            'nisn' => '1234567890',
            'nama_siswa' => 'Test Siswa',
            'jenis_kelamin' => 'Laki-Laki',
            'tahun_masuk' => '2020',
        ]);

        Guru::create([
            'nama_guru' => 'Test Guru',
            'nip' => '123456789012345',
            'mapel' => 'Matematika',
            'foto' => null,
        ]);
        Profil_sekolah::create([
            'nama_sekolah' => 'SMPN 1 Sukarame',
            'kepala_sekolah' => 'Ise Koswara',
            'foto' => 'kepsek.jpg',
            'logo' => 'smpn-1-sukarame1.webp',
            'npsn' => '	20210798',
            'alamat' => 'Jl. Lapang Bola No. 117, SUKARAME, Kec. Sukarame, Kab. Tasikmalaya, Jawa Barat',
            'kontak' => '0265545483',
            'visi_misi' => 'SMPN 1 Sukarame berkomitmen mencetak generasi yang beriman, berakhlak mulia, cerdas, berprestasi, berwawasan global, serta peduli lingkungan dengan menanamkan nilai agama dan karakter, meningkatkan mutu pembelajaran, mengembangkan potensi peserta didik, menumbuhkan semangat kebangsaan dan cinta budaya, menguasai ilmu pengetahuan, teknologi, bahasa, serta membiasakan sikap peduli terhadap lingkungan melalui kerja sama sekolah, orang tua, dan masyarakat.',
            'tahun_berdiri' => '1984',
            'deskripsi' => 'SMP Negeri 1 Sukarame merupakan salah satu sekolah menengah pertama yang berkomitmen memberikan layanan pendidikan berkualitas bagi generasi muda. Sekolah ini menjadi tempat pembinaan peserta didik agar tumbuh menjadi insan yang beriman, berakhlak mulia, cerdas, berprestasi, serta memiliki kepedulian sosial dan lingkungan.',
        ]);
    }
}
