<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $data['berita'] = Berita::latest()->take(4)->get();
        $data['ekskul'] = Ekstrakurikuler::all();
        $data['siswa'] = Siswa::all();
        $data['guru'] = Guru::all();
        return view('public.home', $data);
    }
    public function siswa(){
        $data['siswa'] = Siswa::all();
        return view('public.siswa', $data);
    }
    public function guru(){
        $data['guru'] = Guru::all();
        return view('public.guru', $data);
    }
}
