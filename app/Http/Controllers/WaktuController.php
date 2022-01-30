<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jam;
use App\Models\Hari;

class WaktuController extends Controller
{
    //JAM
    public function jam()
    {
        $dataJam = jam::paginate();
        return view('jam',['viewJam'=>$dataJam]);
    }
    public function tambahJam(Request $a){
        $a->validate([
            'jam' =>'required|unique:jam,jam'
        ]);

        $kode = DB::table('jam')->max('kd_jam');
    	$addNol = '';
    	$kode = str_replace("J", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "00";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "0";
    	}
    	$kodeBaru = "J".$addNol.$incrementKode;
        DB::table('jam')->insert([
            'kd_jam' =>$kodeBaru,
            'jam' =>$a->jam
        ]);
        return redirect('/viewJam')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function ubahJam(Request $a, $x){
        DB::table('jam')->where("kd_jam", $x)->update([
            'kd_jam' =>$a->kd_jam,
            'jam' =>$a->jam
        ]);
        return redirect('/viewJam')->with('toast_success', 'Data Berhasil Diperbarui!');
    }

    public function hapusJam($kd_jam){
        DB::table('jam')->where('kd_jam',$kd_jam)->delete();
        return redirect('/viewJam')->with('toast_info', 'Data Terhapus!');;
    }

    //HARI
    public function hari()
    {
        $dataHari = hari::paginate();
        return view('hari',['viewHari'=>$dataHari]);
    }
    public function tambahHari(Request $a){
        $a->validate([
            'nama_hari' =>'required|unique:hari,nama_hari'
        ]);

        $kode = DB::table('hari')->max('kd_hari');
    	$addNol = '';
    	$kode = str_replace("H", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "00";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "0";
    	}
    	$kodeBaru = "H".$addNol.$incrementKode;
        DB::table('hari')->insert([
            'kd_hari' =>$kodeBaru,
            'nama_hari' =>$a->nama_hari
        ]);
        return redirect('/viewHari')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function ubahHari(Request $a, $x){
        DB::table('hari')->where("kd_hari", $x)->update([
            'kd_hari' =>$a->kd_hari,
            'nama_hari' =>$a->nama_hari
        ]);
        return redirect('/viewHari')->with('toast_success', 'Data Berhasil Diperbarui!');
    }

    public function hapusHari($kd_jam){
        DB::table('hari')->where('kd_hari',$kd_jam)->delete();
        return redirect('/viewHari')->with('toast_info', 'Data Terhapus!');;
    }
}