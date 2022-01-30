@extends('main')

@section('judul')
SIPK-PEI/Hari
@endsection

@section('konten')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title">Data Hari</p>
            <div>
                <!-- Moodal Add Data -->
                <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal"
                    data-target="#AddHari"><i class="ti-plus btn-icon-append"></i>
                    Tambah Data</button><br><br>
                <div class="modal fade" id="AddHari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Hari</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/addHari" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="Nama_hari">Nama Hari</label>
                                        <input type="text" class="form-control @error('nama_hari') is-invalid @enderror" id="nama_hari"
                                            placeholder="Masukan Hari" name="nama_hari"
                                            required="required" value="{{old('nama_hari')}}">
                                            @error('nama_hari')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" value="Simpan Data" class="btn btn-primary">Simpan</button>
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
                                    <th>Kode Hari</th>
                                    <th>NAMA HARI</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewHari as $key=>$x)
                                <tr>
                                    <td>{{$viewHari->firstItem() + $key}}</td>
                                    <td>{{ $x -> kd_hari }}</td>
                                    <td>{{ $x -> nama_hari }}</td>
                                    <td style="text-align:center">
                                        <button type="submit" class="btn btn-inverse-info btn-fw" data-toggle="modal"
                                            data-target="#{{$x->kd_hari}}"><i
                                                class="ti-pencil btn-icon-append"></i></button>

                                        <div style="text-align:left" class="modal fade" id="{{$x->kd_hari}}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data
                                                            Hari</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/updateHari/{{$x->kd_hari}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="form-group" hidden="true">
                                                                <label for="kd_hari">Kode Hari</label>
                                                                <input type="text" class="form-control" id="kdhari"
                                                                    placeholder="Masukan Kode Hari" name="kd_hari"
                                                                    required="required" value="{{$x->kd_hari}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_hari">Nama Hari</label>
                                                                <input type="text" class="form-control" id="namaHari"
                                                                    placeholder="Masukan Hari"
                                                                    name="nama_hari" required="required"
                                                                    value="{{$x->nama_hari}}">
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
                                        <a href="/deleteHari/{{$x->kd_hari }}" id="btn-delete"><button type="button"
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