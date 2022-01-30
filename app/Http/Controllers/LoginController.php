<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(){
        return view ('login');
        /* $dataUsr = DB::table('users')->paginate();
        return view('login',['viewUsr'=>$dataUsr]); */
    }

    public function login(Request $a){
        $cek = $a->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if (Auth::attempt($cek)){
            $a->session()->regenerate();
            
            return redirect()->intended('/dashboard')->with('success', 'Login Berhasil');
        } 

        return redirect('/login')->with('warning', 'Data yang dimasukan salah!');
    }

    public function register(Request $a){
        $a->validate([
            'name'=>'required|unique:users,name',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'role'=>'required'
        ]);
        User::create([
            'name' =>$a->name,
            'email' =>$a->email,
            'password'=>Hash::make($a->password),
            'role'=>$a->role
        ]);
        return redirect('/login')->with('success', 'Data Berhasil Dibuat');
    }

    public function logout(Request $a){
        Auth::logout();
        $a->session()->invalidate();
        $a->session()->regenerateToken();
        return redirect('/login');
    }

    public function setting(Request $a){
        $file = $a->file('foto');
        //ambil nama file
        
        if(file_exists($file)){
            $nama_file = time()."-".$file->getClientOriginalName();
        //ambil ekstension file
        $ekstensi = $file->getClientOriginalExtension();
        //ambil ukuran file
        $ukuran =$file->getSize();
        //ambil path asli
        $pathAsli = $file->getRealPath();
        //upload ke folder
        $namaFolder = 'foto';
        $file->move($namaFolder, $nama_file);
        //path setelah di pindah
        $pathPublic = $namaFolder."/".$nama_file;
        }
        else{
            $pathPublic = $a->pathFoto;
        }
        User::where('id', $a->id)->update([
            'name' =>$a->name,
            'email' =>$a->email,
            'password'=>$a->password,
            'role'=>$a->role,
            'foto' =>$pathPublic
        ]);
        return redirect('/Setting');

        /*
        Mahasiswa::where("nim", "$nim")->update($cekValidasi);
        return redirect('/lihat')->with('berhasil', 'Data berhasil disimpan!');
        */
    }
}