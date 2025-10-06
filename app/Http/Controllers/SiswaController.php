<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    public function dataSiswa()
    {
        $data['siswa'] = Siswa::all();
        return view('admin.data-siswa',$data);
    }
    public function createSiswa()
    {
        return view('admin.create-siswa');
    }

    public function storeSiswa(Request $request){
        $validate = $request->validate([
            'nama_siswa' => 'required',
            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_masuk' => 'required'
        ]);

        Siswa::create([
            'nama_siswa' => $validate ['nama_siswa'],
            'nisn' => $validate ['nisn'],
            'jenis_kelamin' => $validate ['jenis_kelamin'],
            'tahun_masuk' => $validate ['tahun_masuk']
        ]);
        return redirect()->route('admin.data-siswa')->with('success', 'Tambah Siswa Berhasil');
    }
    public function deleteSiswa(string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch(DecryptException $e) {
            return redirect()->back();
        }

        $siswa = Siswa::destroy($id);
        return redirect()->back()->with('success', 'berhasil dihapus');
    }
    public function editSiswa(Request $request, string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch(DecryptException $e) {
            return redirect()->back();
        }

        $data['siswa'] = Siswa::find($id);
        return view('admin.edit-siswa', $data);
    }
    public function updateSiswa(Request $request, string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }

        $siswa = Siswa::find($id);

        $validate = $request->validate([
            'nama_siswa' => 'required',
            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_masuk' => 'required',
        ]);

        $siswa->update($validate);

        return redirect()->route('admin.siswa');
    }
}
