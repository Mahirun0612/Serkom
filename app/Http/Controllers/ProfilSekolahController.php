<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    //
    public function tentang()
    {
        return view('public.profil');
    }
    public function profil()
    {
        return view('admin.profil_sekolah');
    }
}
