@extends('main')

@section('judul')
SIPK-PEI/Jadwal Kuliah
@endsection

@section('konten')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title">Data Jadwal Perkuliahan</p>
            <div>
                <!-- Moodal Add Data -->
                <a href="/viewInputJadwal"><button type="button" class="btn btn-outline-primary btn-fw"
                        data-toggle="modal" data-target="#AddDosen"><i class="ti-plus btn-icon-append"></i>
                        Tambah Data</button></a>
            </div><br>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="display expandable-table" style="width:100%" id="datatables">
                        <thead>
                            <tr style="text-align:center">
                                <th>NO</th>
                                <!-- <th>KODE JADWAL</th> -->
                                <th>HARI</th>
                                <th>WAKTU</th>
                                <th>KODE MATAKULIAH</th>
                                <th>MATAKULIAH</th>
                                <th>SKS</th>
                                <th>SEMESTER</th>
                                <th>DOSEN</th>
                                <th>RUANGAN</th>
                                <th>PRODI</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewJadwal as $key=>$x)
                            <tr>
                                <td>{{$viewJadwal->firstItem() + $key}}</td>
                                <!-- <td>{{ $x -> kd_jadwal }}</td> -->
                                <td>{{$x  -> hari->nama_hari}}</td>
                                <td>{{ $x -> jam->jam}}</td>
                                <td>{{ $x -> matakuliah->kd_matakuliah}}</td>
                                <td>{{ $x -> matakuliah->nama_matakuliah}}</td>
                                <td>{{ $x -> matakuliah->sks}}</td>
                                <td>{{ $x -> matakuliah->semester}}</td>
                                <td>{{ $x -> dosen->nama_dosen}}</td>
                                <td>{{ $x -> ruangan->nama_ruangan}}</td>
                                <td>{{ $x -> prodi->keterangan}}</td>
                                <td style="text-align:center">
                                    <a href="/{{$x->kd_jadwal}}/ubahJadwal"><button type="button" class="btn btn-inverse-info btn-fw"><i
                                                class="ti-pencil btn-icon-append"></i></button></a>
                                    <br><br>
                                    <a href="/deleteJadwal/{{$x->kd_jadwal}}" id="btn-delete"><button type="button"
                                        class="btn btn-inverse-danger btn-fw"><i
                                            class="ti-trash btn-icon-append"></i></button></a>
                                </td>
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