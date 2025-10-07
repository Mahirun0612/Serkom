<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    //
    public function ekskul()
    {
        $data['ekskul'] = Ekstrakurikuler::all();
        return view('public.ekstrakurikuler',$data);
    }
    public function ekstrakurikuler()
    {
        $data['ekskul'] = Ekstrakurikuler::all();
        return view('admin.ekstrakurikuler', $data);
    }
    public function createEkskul()
    {
        return view('admin.create-ekskul');
    }
    public function storeEkskul(Request $request){
        $validate = $request->validate([
            'nama_ekskul' => 'required',
            'pembina' => 'required',
            'jadwal_latihan' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $foto = $request->file('foto');
        $filename = time()."-".$request->name.".".$foto->getClientOriginalExtension();
        $foto->storeAs('foto-ekskul', $filename);

        $validate['foto'] = $filename;

        Ekstrakurikuler::create([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'foto' => $filename
        ]);
        return redirect()->route('admin.ekstrakurikuler')->with('message', 'berhasil menambah ekskul');
    }
    public function deleteEkskul(string $id){

        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $ekskul = Ekstrakurikuler::destroy($id);
        return redirect()->back()->with('success', 'berhasil dihapus.');
    }
    public function editEkskul(string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch(DecryptException $e) {
            return redirect()->back();
        }

        $data['ekskul'] = Ekstrakurikuler::find($id);
        return view('admin.edit-ekskul', $data);
    }
    public function updateEkskul(Request $request, string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }

        $validate = $request->validate([
            'nama_ekskul' => 'required',
            'pembina' => 'required',
            'jadwal_latihan' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $ekskul = Ekstrakurikuler::find($id);
        if($request->hasFile('foto')){

            if(Storage::exists('foto-ekskul/'.$ekskul->foto)){
                Storage::delete('foto-ekskul/'.$ekskul->foto);
            }

            $image = $request->file('foto');
            $filename = time()."-".$request->name.".".$image->getClientOriginalExtension();
            $image->storeAs('foto-ekskul/',$filename);

            $validate['foto'] = $filename;
        }

        $ekskul->update($validate);

        return redirect()->route('admin.ekstrakurikuler');
    }
    public function detail(string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        $data['ekskul'] = Ekstrakurikuler::find($id);
        return view('public.detail-ekskul', $data);
    }
}
