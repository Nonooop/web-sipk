<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Jadwal;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $countDsn = DB::table('dosen')->count();
        $countMK = DB::table('matakuliah')->count();
        $countProdi = DB::table('prodi')->count();
        $countRuang = DB::table('ruangan')->count();
        
        $dataJadwal = Jadwal::paginate();
        return view('dashboard',compact('countDsn','countMK','countProdi','countRuang'), ['viewJadwal'=>$dataJadwal]);
    }

    public function detailUser($id){
        $dataUsr = User::find($id);
        $dataUsr->makeHidden(['email_verified_at','remember_token']);
        return view ('user-detail',['x'=>$dataUsr]);

    }
    public function viewUser(){
        $dataUsr = DB::table('users')->paginate();
        return view('user',['viewUsr'=>$dataUsr]);
    }

    public function tambahUser(Request $a){
        $a->validate([
            'name'=>'required|unique:users,name',
            'email'=>'required|unique:users,email'
        ]);
        $file = $a->file('foto');
        //ambil nama file
        $nama_file = time()."-".$file->getClientOriginalName();
        //ambil ekstension file
        $ekstensi = $file->getClientOriginalExtension();
        //ambil ukuran file
        $ukuran =$file->getSize();
        //ambil path asli
        $pathAsli = $file->getRealPath();
        //upload ke folder
        $namaFolder = 'Foto';
        $file->move($namaFolder, $nama_file);
        //path setelah di pindah
        $pathPublic = $namaFolder."/".$nama_file;

        User::create([
            'name' =>$a->name,
            'email' =>$a->email,
            'password'=>Hash::make($a->password),
            'role'=>$a->role,
            'foto' =>$pathPublic
        ]);

        /*
        DB::table('users')->insert([
            'name' =>$a->name,
            'email' =>$a->email,
            'password'=>Hash::make($a->password),
            'role'=>$a->role,
            'foto' =>$pathPublic
        ]);
 */
        return redirect('/viewUsr')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function editUser($id){
        $dataUsr = user::find($id);
        return view ('user-edit',['x'=>$dataUsr]);
    }

    public function ubahUser(Request $a){
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
        return redirect('/viewUsr')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function hapusUser($id){
        $dataUsr = user::find($id);
        $dataUsr->delete();
        File::delete($dataUsr->foto);
        return redirect('/viewUsr')->with('toast_info', 'Data Terhapus!');
    }
}
