<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    //
    public function gallery()
    {
        $data['galeri'] = Galeri::all();
        return view('public.galeri', $data);
    }
    public function galeri()
    {
        $data['galeri'] = Galeri::all();
        return view('admin.galeri', $data);
    }
    public function createGaleri()
    {
        return view('admin.create-galeri');
    }
    public function storeGaleri(Request $request){
        $validate = $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg,mp4,mov,avi',
            'kategori' => 'required',
            'tanggal' => 'required'
        ]);

        $foto = $request->file('file');
        $filename = time()."-".$request->name.".".$foto->getClientOriginalExtension();
        $foto->storeAs('galeri', $filename);

        $validate['file'] = $filename;

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $filename,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal
        ]);
        return redirect()->route('admin.galeri')->with('message', 'berhasil menambah');
    }
    public function deleteGaleri(string $id){

        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $galeri = Galeri::destroy($id);
        return redirect()->back()->with('success', 'berhasil dihapus.');
    }
    public function editGaleri(Request $request, string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $data['galeri'] = Galeri::find($id);
        return view('admin.edit-galeri', $data);
    }
    public function updateGaleri(Request $request, string $id) {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $validate = $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg,mp4,mov,avi',
            'kategori' => 'required',
            'tanggal' => 'required'
        ]);

        $galeri = Galeri::find($id);

        if($request->hasFile('file')){

            if(Storage::exists('galeri/'.$galeri->file)){
                Storage::delete('galeri/'.$galeri->file);
            }

            $image = $request->file('file');
            $filename = time()."-".$request->name.".".$image->getClientOriginalExtension();
            $image->storeAs('galeri',$filename);

            $validate['file'] = $filename;
        }

        $galeri->update($validate);

        return redirect()->route('admin.galeri');
    }
}
