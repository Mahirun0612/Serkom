<?php

namespace App\Http\Controllers;

use App\Models\Profil_sekolah;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{
    //
    public function tentang()
    {
        $data['profil'] = Profil_sekolah::first();
        return view('public.profil', $data);
    }
    public function profil()
    {
        $data['profil'] = Profil_sekolah::first();
        return view('admin.profil_sekolah', $data);
    }
    public function editProfil(string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch(DecryptException $e) {
            return redirect()->back();
        }

        $data['profil'] = Profil_sekolah::find($id);
        return view('admin.edit-profil', $data);
    }
    public function updateProfil(Request $request, string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }
        $validate = $request->validate([
            'nama_sekolah' => 'required',
            'kepala_sekolah' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg,webp',
            'logo' => 'required|image|mimes:png,jpg,jpeg,webp',
            'npsn' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'visi_misi' => 'required',
            'tahun_berdiri' => 'required',
            'deskripsi' => 'required',
        ]);

        $profil = Profil_sekolah::find($id);
        if($request->hasFile('foto')){

            if(Storage::exists('foto-sekolah/'.$profil->foto)){
                Storage::delete('foto-sekolah/'.$profil->foto);
            }

            $image = $request->file('foto');
            $filename = time()."-".$request->name.".".$image->getClientOriginalExtension();
            $image->storeAs('foto-sekolah/',$filename);

            $validate['foto'] = $filename;
        }
        if($request->hasFile('logo')){

            if(Storage::exists('foto-sekolah/'.$profil->logo)){
                Storage::delete('foto-sekolah/'.$profil->logo);
            }

            $image = $request->file('logo');
            $filename = time()."-".$request->name.".".$image->getClientOriginalExtension();
            $image->storeAs('foto-sekolah/',$filename);

            $validate['logo'] = $filename;
        }

        $profil->update($validate);

        return redirect()->route('admin.profil');
    }
}
