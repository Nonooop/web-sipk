<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\TahunAkademik;

class TahunAkademikController extends Controller
{
    public function index()
    {
        $dataTA = TahunAkademik::paginate();
        return view('tahunAkademik',['viewTA'=>$dataTA]);
    }

    public function tambahTA(Request $a){
        DB::table('tahun_akademik')->insert([
            'kd_TA' =>$a->kd_TA,
            'tahun_akademik' =>$a->tahun_akademik,
            'semester' =>$a->semester,
            'status' =>$a->status
        ]);
        return redirect('/viewTA')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function ubahTA(Request $a, $x){
        DB::table('tahun_akademik')->where("kd_TA", $x)->update([
            'kd_TA' =>$a->kd_TA,
            'tahun_akademik' =>$a->tahun_akademik,
            'semester' =>$a->semester,
            'status' =>$a->status
        ]);
        return redirect('/viewTA')->with('toast_success', 'Data Berhasil Diperbarui!');
    }

    public function hapusTA($kd_TA){
        DB::table('tahun_akademik')->where('kd_TA',$kd_TA)->delete();
        return redirect('/viewTA')->with('toast_info', 'Data Terhapus!');;
    }
}
