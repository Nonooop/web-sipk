@extends('main')

@section('judul')
SIPK-PEI/Dashboard
@endsection

@section('konten')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card tale-bg">
        <div class="card-people mt-auto">
            <img src="{{asset('template/images/dashboard/peoplee.png')}}" alt="people">
        </div>
    </div>
</div>
<div class="col-md-6 grid-margin transparent">
    <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
                <div class="card-body">
                    <p class="mb-4">Jumlah Dosen</p>
                    <p class="fs-30 mb-2">{{$countDsn}}</p>
                    <p class="mb-4"><a href="/viewDsn" style="color: white">LIHAT DATA</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="mb-4">Jumlah Matakuliah</p>
                    <p class="fs-30 mb-2">{{$countMK}}</p>
                    <p class="mb-4"><a href="/viewMk" style="color: white">LIHAT DATA</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
                <div class="card-body">
                    <p class="mb-4">Jumlah Program Studi</p>
                    <p class="fs-30 mb-2">{{$countProdi}}</p>
                    <p class="mb-4"><a href="/viewProdi" style="color: white">LIHAT DATA</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
                <div class="card-body">
                    <p class="mb-4">Jumlah Ruangan</p>
                    <p class="fs-30 mb-2">{{$countRuang}}</p>
                    <p class="mb-4"><a href="/viewRuang" style="color: white">LIHAT DATA</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title">Data Jadwal Perkuliahan</p>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="display expandable-table" style="width:100%" id="jadwal">
                        <thead>
                            <tr style="text-align:center">
                                <th>NO</th>
                                <th>HARI</th>
                                <th>WAKTU</th>
                                <th>KODE MATAKULIAH</th>
                                <th>MATAKULIAH</th>
                                <th>SKS</th>
                                <th>SEMESTER</th>
                                <th>DOSEN</th>
                                <th>RUANGAN</th>
                                <th>PRODI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewJadwal as $key=>$x)
                            <tr>
                                <td>{{$viewJadwal->firstItem() + $key}}</td>
                                <td>{{$x  -> hari->nama_hari}}</td>
                                <td>{{ $x -> jam->jam}}</td>
                                <td>{{ $x -> matakuliah->kd_matakuliah}}</td>
                                <td>{{ $x -> matakuliah->nama_matakuliah}}</td>
                                <td>{{ $x -> matakuliah->sks}}</td>
                                <td>{{ $x -> matakuliah->semester}}</td>
                                <td>{{ $x -> dosen->nama_dosen}}</td>
                                <td>{{ $x -> ruangan->nama_ruangan}}</td>
                                <td>{{ $x -> prodi->keterangan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


