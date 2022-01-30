@extends('main')

@section('judul')
SIPK-PEI/Pengguna
@endsection

@section('konten')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title">Data Pengguna</p>
            <div>
                <!-- Moodal Add Data -->
                <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal"
                    data-target="#AddUser"><i class="ti-plus btn-icon-append"></i>
                    Tambah Data</button><br><br>
                <div class="modal fade" id="AddUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/addUsr" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text"
                                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                    id="exampleInputUsername1" placeholder="Nama Lengkap" name="name"
                                                    value="{{old('name')}}" required="required">
                                                @error('name')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 col-xl-6">
                                                <label for="email">Email</label>
                                                <input type="email"
                                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                    id="exampleInputEmail1" placeholder="Email" name="email"
                                                    value="{{old('email')}}" required="required">
                                                @error('email')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6">
                                                    <label for="password">Kata Sandi</label>
                                                    <input type="text" class="form-control" id="password"
                                                        placeholder="Masukan Kata Sandi" name="password">
                                                </div>
                                                <div class="col-xl-6 col-xl-6">
                                                    <label for="role">Level Pengguna</label>
                                                    <select class="form-control" name="role" required="required">
                                                        <option></option>
                                                        <option>Administrator</option>
                                                        <option>Pengguna</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" class="form-control" id="foto" placeholder="Masukan Foto"
                                                name="foto">
                                        </div>
                                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" value="Simpan Data"
                                                class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
            </div>
            <!--Modal Add Data Close-->

            <div class="col-12">
                <div class="table-responsive">
                    <table class="display expandable-table" style="width:100%" id="datatables">
                        <thead>
                            <tr style="text-align:center">
                                <th>NO</th>
                                <th>NAMA LENGKAP</th>
                                <th>EMAIL</th>
                                <!-- <th>PASSWORD</th> -->
                                <th>LEVEL PENGGUNA</th>
                                <th>FOTO</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewUsr as $key => $x)
                            <tr>
                                <td>{{$viewUsr->firstItem() + $key}}</td>
                                <td>{{ $x -> name }}</td>
                                <td>{{ $x -> email }}</td>
                                <!-- <td>{{ $x -> password }}</td> -->
                                <td>{{ $x->role }}</td>
                                <td><img src="{{$x->foto}}" width="100px" height="auto"></td>
                                <td style="text-align:center">
                                    <a href="/detailUsr/{{$x->id}}"><button type="button"
                                            class="btn btn-inverse-success btn-fw"><i
                                                class="ti-eye btn-icon-append"></i></button></a>
                                    &nbsp;
                                    <a href="/editUsr/{{$x->id}}"><button type="button"
                                            class="btn btn-inverse-info btn-fw"><i
                                                class="ti-pencil btn-icon-append"></i></button></a>
                                    &nbsp;
                                    <a href="/deleteUsr/{{$x->id }}" id="btn-delete"><button type="button"
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