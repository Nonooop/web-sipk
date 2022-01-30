@extends('main')

@section('judul')
SIPK-PEI/Edit User
@endsection

@section('konten')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Data User</h4>
            <form action="/updateUsr/{{$x->id}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" placeholder="Masukan Nama Lengkap"
                                    name="name" value="{{$x->name}}" required="required">
                            </div>
                            <div class="col-xl-6 col-xl-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Masukan Email"
                                    name="email" value="{{$x->email}}" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <label for="password">Kata Sandi</label>
                                    <input type="text" class="form-control" id="password"
                                        placeholder="Masukan Kata Sandi" name="password" value="{{$x->password}}" required="required">
                                </div>
                                <div class="col-xl-6 col-xl-6">
                                    <label for="role">Level Pengguna</label>
                                    <select class="form-control" name="role" value="{{$x->role}}" required="required">
                                        <option>{{$x->role}}</option>
                                        <option>Administrator</option>
                                        <option>Pengguna</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <input type="file" name="foto" class="form-control">
                            <input type="hidden" value="{{$x->foto}}" name="pathFoto"
                                class="form-control">
                            <img src="{{asset('/'.$x->foto)}}" width="75px" height="auto">
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" value="Simpan Data" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection