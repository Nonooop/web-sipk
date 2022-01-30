<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use App\Models\Hari;
use App\Models\Jam;
use App\Models\Matakuliah;
use App\Models\Dosen;
use App\Models\Ruangan;
use App\Models\Prodi;

class JadwalController extends Controller
{
    public function index()
    {
        /*$dataJadwal = Jadwal::all();
        return view('jadwal', compact('$dataJadwal'));
        */
        //$dataJadwal = Jadwal::all();
        
        $dataJadwal = Jadwal::paginate();
        return view('jadwal',['viewJadwal'=>$dataJadwal]);
        
    }

    public function tambahJadwal(Request $a){
        $dataJadwal = Jadwal::all();
        $dataHari = Hari::all();
        $dataJam = Jam::all();
        $dataMk = Matakuliah::all();
        $dataDosen = Dosen::all();
        $dataRuangan = Ruangan::all();
        $dataProdi = Prodi::all();
        return view('jadwal-input', compact('dataJadwal','dataHari','dataJam','dataMk','dataDosen','dataRuangan','dataProdi'));
    }

    public function inputJadwal(Request $a){
        $a->validate([
            'kd_hari' =>'required',
            'kd_jam' =>'required',
            'kd_matakuliah'=>'required|unique:matakuliah,kd_matakuliah',
            'nidn'=>'required',
            'kd_ruangan'=>'required',
            'kd_prodi'=>'required'
        ],[
            'kd_hari.required'=>'Hari tidak boleh kosong',
            'kd_jam.required'=>'Jam tidak boleh kosong',
            'kd_matakuliah.required'=>'Data yang dimasukan sudah ada',
            'nidn.required'=>'Dosen tidak boleh kosong',
            'kd_ruangan.required'=>'Ruangan tidak boleh kosong',
            'kd_prodi.required'=>'Prodi tidak boleh kosong'
        ]);

        $kode = DB::table('jadwal_kuliah')->max('kd_jadwal');
        $addNol = '';
        $kode = str_replace("JD", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
        
        if (strlen($kode) == 1) {
            $addNol = "000";
        } elseif (strlen($kode) == 2) {
            $addNol = "00";
        }elseif (strlen($kode) == 2) {
        $addNol = "0";
        }
        $kodeBaru = "JD".$addNol.$incrementKode;

        /*
        //CARA 1
        $jadwal = new Jadwal();
        $jadwal->kd_jadwal = $a->kd_jadwal=$kodeBaru;
        $jadwal->kd_hari = $a->kd_hari;
        $jadwal->kd_jam = $a->kd_jam;
        $jadwal->kd_matakuliah = $a->kd_matakuliah;
        $jadwal->nidn = $a->nidn;
        $jadwal->kd_ruangan = $a->kd_ruangan;
        $jadwal->kd_prodi = $a->kd_prodi;
        $jadwal->save();
        */
        Jadwal::create([
            'kd_jadwal' =>$kodeBaru,
            'kd_hari' => $a->kd_hari,
            'kd_jam' => $a->kd_jam,
            'kd_matakuliah' => $a->kd_matakuliah,
            'nidn' => $a->nidn,
            'kd_ruangan' => $a->kd_ruangan,
            'kd_prodi' => $a->kd_prodi,
        ]);
        return redirect('/viewJadwal')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function ubahJadwal(Jadwal $jadwal, $kd_jadwal){
        $jadwal = Jadwal::find($kd_jadwal);
        $dataHari = Hari::all();
        $dataJam = Jam::all();
        $dataMk = Matakuliah::all();
        $dataDosen = Dosen::all();
        $dataRuangan = Ruangan::all();
        $dataProdi = Prodi::all();
        return view('jadwal-edit',['x'=>$jadwal], compact('jadwal','dataHari','dataJam','dataMk','dataDosen','dataRuangan','dataProdi'));
    }

    public function updateJadwal(Request $a){
        $a->validate([
            'kd_hari' =>'required',
            'kd_jam' =>'required',
            'kd_matakuliah'=>'required',
            'nidn'=>'required',
            'kd_ruangan'=>'required',
            'kd_prodi'=>'required'
        ],[
            'kd_hari.required'=>'Hari tidak boleh kosong',
            'kd_jam.required'=>'Jam tidak boleh kosong',
            'kd_matakuliah.required'=>'Matakuliah tidak boleh kosong',
            'nidn.required'=>'Dosen tidak boleh kosong',
            'kd_ruangan.required'=>'Ruangan tidak boleh kosong',
            'kd_prodi.required'=>'Prodi tidak boleh kosong'
        ]);
        
        Jadwal::where('kd_jadwal', $a->kd_jadwal)->update([
            'kd_jadwal' =>$a->kd_jadwal,
            'kd_hari' => $a->kd_hari,
            'kd_jam' => $a->kd_jam,
            'kd_matakuliah' => $a->kd_matakuliah,
            'nidn' => $a->nidn,
            'kd_ruangan' => $a->kd_ruangan,
            'kd_prodi' => $a->kd_prodi,
        ]);
    return redirect('/viewJadwal')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function hapusJadwal($kd_jadwal){
        /*
        $dataJadwal = Jadwal::find($kd_jadwal);
        $dataJadwal->delete();
        return redirect('/viewJadwal')->with('toast_info', 'Data Terhapus!');*/

        DB::table('jadwal_kuliah')->where('kd_jadwal',$kd_jadwal)->delete();
        return redirect('/viewJadwal')->with('toast_info', 'Data Terhapus!');
    
        }
}