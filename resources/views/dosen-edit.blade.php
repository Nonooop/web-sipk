@extends('main')

@section('judul')
SIPK-PEI/Edit Dosen
@endsection

@section('konten')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Data Dosen</h4>
            <form action="/updateDsn/{{$x->nidn}}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <label for="nidn">NIDN</label>
                                <input type="text" class="form-control" id="nidn"
                                    placeholder="Masukan NIDN" name="nidn"
                                    value="{{$x->nidn}}" required="required">
                            </div>
                            <div class="col-xl-6 col-xl-6">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama"
                                    placeholder="Masukan Nama Lengkap"
                                    name="nama_dosen" value="{{$x->nama_dosen}}" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat"
                            placeholder="Masukan Alamat Lengkap" name="alamat_dosen"
                            value="{{$x->alamat_dosen}}" required="required">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <label for="telp">No Telpon</label>
                                <input type="text" class="form-control" id="hp"
                                    placeholder="Masukan Nomor Telpon"
                                    name="noHp_dosen" value="{{$x->noHp_dosen}}" required="required">
                            </div>
                            <div class="col-xl-6 col-xl-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email"
                                    placeholder="Masukan Email" name="email_dosen"
                                    value="{{$x->email_dosen}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Foto</label>
                        <input type="file" name="foto_dosen" class="form-control">
                        <input type="hidden" value="{{$x->foto_dosen}}" name="pathFoto"
                            class="form-control">
                        <img src="{{asset('/'.$x->foto_dosen)}}" width="75px" height="auto">
                    </div>
                    <div
                        class="modal-footer border-top-0 d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Tutup</button>
                        <button type="submit" value="Update Data"
                            class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection