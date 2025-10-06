<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    //
    public function index()
    {
        $data['siswa'] = Siswa::all();
        $data['guru'] = Guru::all();
        $data['berita'] = Berita::all();
        $data['galeri'] = Galeri::all();
        $data['ekskul'] = Ekstrakurikuler::all();
        return view('admin.dashboard', $data);
    }
    public function user()
    {
        $data['user'] = User::all();
        return view('admin.user', $data);
    }
    public function createUser()
    {
        return view('admin.create-user');
    }
    public function storeUser(Request $request){
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        $validate['password'] = bcrypt($validate['password']);

        User::create([
            'username' => $validate['username'],
            'password' => $validate['password'],
            'role' => $validate['role'],
        ]);
        return redirect()->route('admin.user')->with('success', 'Tambah User Berhasil');
    }
    public function deleteUser(string $id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }

        $user = User::destroy($id);
        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
    public function editUser(Request $request, string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }

        $data['user'] = User::find($id);
        return view('admin.edit-user', $data);
    }
    public function updateUser(Request $request, string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }

        $user = User::find($id);

        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $validate['password'] = bcrypt($validate['password']);
        $user->update($validate);

        return redirect()->route('admin.user');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function auth(Request $request){
        $validation = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($validation)){
            if(Auth::user()->role === 'Admin'){
                return redirect()->route('admin.dashboard');
            }
        }

        return redirect()->back()->with('messages','Login Gagal');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
