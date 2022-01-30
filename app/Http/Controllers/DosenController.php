<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
    {
        $dataDsn = DB::table('dosen')->paginate();
        return view('dosen',['viewDsn'=>$dataDsn]);
    }

    public function tambahDosen(Request $a){
        $a->validate([
            'nidn' =>'required|unique:dosen,nidn',
            'nama_dosen' =>'required|unique:dosen,nama_dosen'
        ],[
            'nidn.required|unique'=>'NIDN sudah terdaftar',
            'nama_dosen.required|unique'=>'Nama dosen sudah terdaftar'
        ],);
        
        $file = $a->file('foto_dosen');
        //ambil nama file
        $nama_file = time()."-".$file->getClientOriginalName();
        //ambil ekstension file
        $ekstensi = $file->getClientOriginalExtension();
        //ambil ukuran file
        $ukuran =$file->getSize();
        //ambil path asli
        $pathAsli = $file->getRealPath();
        //upload ke folder
        $namaFolder = 'Foto Dosen';
        $file->move($namaFolder, $nama_file);
        //path setelah di pindah
        $pathPublic = $namaFolder."/".$nama_file;

        DB::table('dosen')->insert([
            'nidn' =>$a->nidn,
            'nama_dosen' =>$a->nama_dosen,
            'alamat_dosen'=>$a->alamat_dosen,
            'noHp_dosen'=>$a->noHp_dosen,
            'email_dosen' => $a->email_dosen,
            'foto_dosen' =>$pathPublic
        ]);
        return redirect('/viewDsn')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function editDosen($nidn){
        $dataDsn = dosen::find($nidn);
        return view ('dosen-edit',['x'=>$dataDsn]);
    }

    public function ubahDosen(Request $x){
        $file = $x->file('foto_dosen');
        //ambil nama file

        if(file_exists($file)){
            $nama_file = time()."-".$file->getClientOriginalName();
        //upload ke folder
        $namaFolder = 'Foto Dosen';
        $file->move($namaFolder, $nama_file);
        //path setelah di pindah
        $pathPublic = $namaFolder."/".$nama_file;
        }
        else{
            $pathPublic = $x->pathFoto;
        }

        DB::table('dosen')->where("nidn", $x->nidn)->update([
            'nidn' =>$x->nidn,
            'nama_dosen' =>$x->nama_dosen,
            'alamat_dosen'=>$x->alamat_dosen,
            'noHp_dosen'=>$x->noHp_dosen,
            'email_dosen' => $x->email_dosen,
            'foto_dosen' =>$pathPublic
        ]);
        return redirect('/viewDsn')->with('toast_success', 'Data Berhasil Diperbarui!');
    }
    public function hapusDosen($nidn){
        $dataDsn = dosen::find($nidn);
        $dataDsn->delete();
        File::delete($dataDsn->foto_dosen);
        return redirect('/viewDsn')->with('toast_info', 'Data Terhapus!');
    }
}
