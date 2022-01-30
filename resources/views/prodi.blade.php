@extends('main')

@section('judul')
SIPK-PEI/Program Studi
@endsection

@section('konten')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title">Data Program Studi</p>
            <div>
                <!-- Moodal Add Data -->
                <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal"
                    data-target="#AddProdi"><i class="ti-plus btn-icon-append"></i>
                    Tambah Data</button><br><br>
                <div class="modal fade" id="AddProdi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Program Studi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/addProdi" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama_prodi">Nama Program Studi</label>
                                        <input type="text"
                                            class="form-control @error('nama_prodi') is-invalid @enderror"
                                            id="namaprodi" placeholder="Masukan Nama Program Studi" name="nama_prodi"
                                            required="required" value="{{old('nama_prodi')}}">
                                        @error('nama_prodi')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan"
                                            placeholder="Masukan Keterangan" name="keterangan" required="required"
                                            value="{{old('keterangan')}}">
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
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="display expandable-table" style="width:100%" id="datatables">
                            <thead>
                                <tr style="text-align:center">
                                    <th>NO</th>
                                    <th>KODE PRODI</th>
                                    <th>NAMA PROGRAM STUDI</th>
                                    <th>KETERANGAN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewProdi as $key=>$x)
                                <tr>
                                    <td>{{$viewProdi->firstItem() + $key}}</td>
                                    <td>{{ $x -> kd_prodi }}</td>
                                    <td>{{ $x -> nama_prodi }}</td>
                                    <td>{{ $x -> keterangan }}</td>
                                    <td style="text-align:center">
                                        <button type="submit" class="btn btn-inverse-info btn-fw" data-toggle="modal"
                                            data-target="#{{$x->kd_prodi}}"><i
                                                class="ti-pencil btn-icon-append"></i></button>

                                        <div style="text-align:left" class="modal fade" id="{{$x->kd_prodi}}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data
                                                            Matakuliah</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/updateProdi/{{$x->kd_prodi}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="form-group" hidden="true">
                                                                <label for="kd_matakuliah">Kode Prodi</label>
                                                                <input type="text" class="form-control" id="idprodi"
                                                                    placeholder="Masukan Kode Matakuliah"
                                                                    name="kd_prodi" required="required"
                                                                    value="{{$x->kd_prodi}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_matakuliah">Nama Program Studi</label>
                                                                <input type="text" class="form-control" id="namaprodi"
                                                                    placeholder="Masukan Nama Matakuliah"
                                                                    name="nama_prodi" required="required"
                                                                    value="{{$x->nama_prodi}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="keterangan">Keterangan</label>
                                                                <input type="text" class="form-control" id="keterangan"
                                                                    placeholder="Masukan Keterangan" name="keterangan"
                                                                    required="required" value="{{$x->keterangan}}">
                                                            </div>
                                                            <div
                                                                class="modal-footer border-top-0 d-flex justify-content-center">
                                                                <button type="refresh" class="btn btn-secondary btn-fw"
                                                                    data-dismiss="modal">Tutup</button>
                                                                <button type="submit" value="Update Data"
                                                                    class="btn btn-primary btn-fw">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>&nbsp;
                                        <a href="/deleteProdi/{{$x->kd_prodi }}" id="btn-delete"><button type="button"
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
</div>
@endsection