@extends('main')

@section('judul')
SIPK-PEI/Ubah Jadwal
@endsection

@section('konten')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Data Jadwal Perkuliahan</h4>
            <form action="/updateJadwal/{{$x->kd_jadwal}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-6 col-xl-6">
                                <label for="kd_hari">Hari Perkuliahan</label>
                                <select class="form-control @error('kd_hari') is-invalid @enderror" name="kd_hari">
                                    <option value="">- Pilih Hari -</option>
                                    @foreach ($dataHari as $x)
                                    <option value="{{$x->kd_hari}}" {{old('kd_hari', $jadwal->kd_hari) == $x->kd_hari? 'selected':null}}>{{$x->nama_hari}}</option>
                                    @endforeach
                                </select>
                                @error('kd_hari')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <label for="kd_jam">Waktu Perkuliahan</label>
                                <select class="form-control @error('kd_jam') is-invalid @enderror" name="kd_jam">
                                    <option value="">- Pilih Waktu -</option>
                                    @foreach ($dataJam as $x)
                                    <option value="{{$x->kd_jam}}" {{old('kd_jam', $jadwal->kd_jam) == $x->kd_jam? 'selected':null}}>{{$x->jam}}</option>
                                    @endforeach
                                </select>
                                @error('kd_jam')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-6 col-xl-6">
                                <label for="kd_matakuliah">Matakuliah</label>
                                <select class="form-control @error('kd_matakuliah') is-invalid @enderror" name="kd_matakuliah">
                                    <option value="">- Pilih Matakuliah -</option>
                                    @foreach ($dataMk as $x)
                                    <option value="{{$x->kd_matakuliah}}" {{old('kd_matakuliah',$jadwal->kd_matakuliah) == $x->kd_matakuliah? 'selected':null}}>{{$x->kd_matakuliah}} - {{$x->nama_matakuliah}}</option>
                                    @endforeach
                                </select>
                                @error('kd_matakuliah')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <label for="nidn">Dosen</label>
                                <select class="form-control @error('nidn') is-invalid @enderror" name="nidn">
                                    <option value="">- Pilih Dosen -</option>
                                    @foreach ($dataDosen as $x)
                                    <option value="{{$x->nidn}}" {{old('$x->nidn', $jadwal->nidn) == $x->nidn? 'selected':null}}>{{$x->nama_dosen}}</option>
                                    @endforeach
                                </select>
                                @error('nidn')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <label for="kd_ruangan">Ruangan</label>
                                <select class="form-control @error('kd_ruangan') is-invalid @enderror" name="kd_ruangan">
                                    <option value="">- Pilih Ruangan -</option>
                                    @foreach ($dataRuangan as $x)
                                    <option value="{{$x->kd_ruangan}}" {{old('kd_ruangan',$jadwal->kd_ruangan) == $x->kd_ruangan? 'selected':null}}>{{$x->nama_ruangan}}</option>
                                    @endforeach
                                </select>
                                @error('kd_ruangan')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-xl-6">
                                <label for="kd_prodi">Program Studi</label>
                                <select class="form-control @error('kd_prodi') is-invalid @enderror" name="kd_prodi">
                                    <option value="">- Pilih Program Studi -</option>
                                    @foreach ($dataProdi as $x)
                                    <option value="{{$x->kd_prodi}}" {{old('kd_prodi',$jadwal->kd_prodi) == $x->kd_prodi? 'selected':null}}>{{$x->nama_prodi}}</option>
                                    @endforeach
                                </select>
                                @error('kd_prodi')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" value="Update Data" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection