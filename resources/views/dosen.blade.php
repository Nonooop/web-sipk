@extends('main')

@section('judul')
SIPK-PEI/Dosen
@endsection

@section('konten')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title">Data Dosen</p>
            <div>
                <!-- Moodal Add Data -->
                <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal"
                    data-target="#AddDosen"><i class="ti-plus btn-icon-append"></i>
                    Tambah Data</button><br><br>
                <div class="modal fade" id="AddDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/addDsn" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <label for="nidn">NIDN</label>
                                                <input type="text"
                                                    class="form-control @error('nidn') is-invalid @enderror" id="nidn"
                                                    placeholder="Masukan NIDN" name="nidn" value="{{old('nidn')}}" required="required">
                                                @error('nidn')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 col-xl-6">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text"
                                                    class="form-control @error('nama_dosen') is-invalid @enderror"
                                                    id="nama" placeholder="Masukan Nama Lengkap" name="nama_dosen" value="{{old('nama_dosen')}}" required="required">
                                                @error('nama_dosen')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat"
                                            placeholder="Masukan Alamat Lengkap" name="alamat_dosen" value="{{old('alamat_dosen')}}" required="required">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <label for="telp">No Telpon</label>
                                                <input type="text" class="form-control" id="hp"
                                                    placeholder="Masukan Nomor Telpon" name="noHp_dosen" value="{{old('noHp_dosen')}}" required="required">
                                            </div>
                                            <div class="col-xl-6 col-xl-6">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email"
                                                    placeholder="Masukan Email" name="email_dosen" value="{{old('email_dosen')}}" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" class="form-control" id="foto" placeholder="Masukan Foto"
                                            name="foto_dosen" value="{{old('foto_dosen')}}" required="required">
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
                                <th>NIDN</th>
                                <th>NAMA DOSEN</th>
                                <th>ALAMAT</th>
                                <th>NO HP</th>
                                <th>EMAIL</th>
                                <th>FOTO</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewDsn as $key => $x)
                            <tr>
                                <td>{{$viewDsn->firstItem() + $key}}</td>
                                <td>{{ $x -> nidn }}</td>
                                <td>{{ $x -> nama_dosen }}</td>
                                <td>{{ $x -> alamat_dosen }}</td>
                                <td>{{ $x -> noHp_dosen }}</td>
                                <td>{{ $x -> email_dosen }}</td>
                                <td><img src="{{$x->foto_dosen}}" width="100px" height="auto"></td>
                                <td style="text-align:center">
                                    <a href="/editDsn/{{$x->nidn }}"><button type="button"
                                            class="btn btn-inverse-info btn-fw"><i
                                                class="ti-pencil btn-icon-append"></i></button></a>
                                    &nbsp;
                                    <a href="/deleteDsn/{{$x->nidn }}" id="btn-delete"><button type="button"
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