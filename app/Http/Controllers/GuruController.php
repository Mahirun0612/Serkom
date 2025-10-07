<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    //
    public function index()
    {
        $data['guru'] = Guru::all();
        return view('admin.data-guru',$data);
    }
    public function createGuru()
    {
        return view('admin.create-guru');
    }
    public function storeGuru(Request $request){
        $validate = $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required',
            'mapel' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $foto = $request->file('foto');
        $filename = time()."-".$request->name.".".$foto->getClientOriginalExtension();
        $foto->storeAs('foto-guru', $filename);

        $validate['foto'] = $filename;

        Guru::create([
            'nama_guru' => $validate['nama_guru'],
            'nip' => $validate['nip'],
            'mapel' => $validate['mapel'],
            'foto' =>$filename,
        ]);
        return redirect()->route('admin.guru')->with('success', 'Tambah Guru Berhasil');
    }
    public function deleteGuru(string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $guru = Guru::destroy($id);
        return redirect()->back()->with('success', 'berhasil dihapus.');
    }
    public function editGuru(Request $request, string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch(DecryptException $e) {
            return redirect()->back();
        }

        $data['guru'] = Guru::find($id);
        return view('admin.edit-guru', $data);
    }
    public function updateGuru(Request $request, string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }

        $validate = $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required',
            'mapel' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $guru = Guru::find($id);
        if($request->hasFile('foto')){

            if(Storage::exists('foto-guru/'.$guru->foto)){
                Storage::delete('foto-guru/'.$guru->foto);
            }

            $image = $request->file('foto');
            $filename = time()."-".$request->name.".".$image->getClientOriginalExtension();
            $image->storeAs('foto-guru/',$filename);

            $validate['foto'] = $filename;
        }


        $guru->update($validate);

        return redirect()->route('admin.guru');
    }
}
