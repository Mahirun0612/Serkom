<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class BeritaController extends Controller
{
    //
    public function news()
    {
        $data['berita'] = Berita::all();
        return view('public.berita',$data);
    }
    public function berita()
    {
        $data['berita'] = Berita::all();
        return view('admin.berita', $data);
    }
    public function createBerita()
    {
        $data['user'] = User::all();
        return view('admin.create-berita', $data);
    }
    public function storeBerita(Request $request){
        $validate = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg',
            'user_id' => 'required'
        ]);

        $foto = $request->file('foto');
        $filename = time()."-".$request->name.".".$foto->getClientOriginalExtension();
        $foto->storeAs('foto-berita', $filename);

        $validate['foto'] = $filename;

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'foto' => $filename,
            'user_id' => $request->user_id
        ]);
        return redirect()->route('admin.berita')->with('message', 'Tambah Berita Berhasil');
    }
    public function deleteBerita(string $id){

        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $berita = Berita::destroy($id);
        return redirect()->back()->with('success', 'berhasil dihapus.');
    }
    public function editBerita(Request $request, string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $data['berita'] = Berita::find($id);
        $data['user'] = User::all();
        return view('admin.edit-berita', $data);
    }
    public function updateBerita(Request $request, string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }

        $validate = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg',
            'user_id' => 'required'
        ]);

        $berita = Berita::find($id);
        if($request->hasFile('foto')){

            if(Storage::exists('foto-berita/'.$berita->foto)){
                Storage::delete('foto-berita/'.$berita->foto);
            }

            $image = $request->file('foto');
            $filename = time()."-".$request->name.".".$image->getClientOriginalExtension();
            $image->storeAs('foto-berita/',$filename);

            $validate['foto'] = $filename;
        }

        $berita->update($validate);

        return redirect()->route('admin.berita');
    }
}
