<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
            'mapel' => 'required'
        ]);

        Guru::create([
            'nama_guru' => $validate['nama_guru'],
            'nip' => $validate['nip'],
            'mapel' => $validate['mapel'],
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

        $guru = Guru::find($id);

        $validate = $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required',
            'mapel' => 'required',
        ]);

        $guru->update($validate);

        return redirect()->route('admin.guru');
    }
}
