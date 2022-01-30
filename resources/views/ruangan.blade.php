@extends('main')

@section('judul')
SIPK-PEI/Ruangan
@endsection

@section('konten')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title">Data Ruangan</p>
            <div>
                <!-- Moodal Add Data -->
                <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal"
                    data-target="#AddRuang"><i class="ti-plus btn-icon-append"></i>
                    Tambah Data</button><br><br>
                <div class="modal fade" id="AddRuang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Ruangan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/addRuang" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama_ruangan">Nama Ruangan</label>
                                        <input type="text"
                                            class="form-control @error('nama_ruangan') is-invalid @enderror"
                                            id="namaruang" placeholder="Masukan Nama Ruangan" name="nama_ruangan"
                                            value="{{old('nama_ruangan')}}" required="required">
                                        @error('nama_ruangan')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kapasitas">Kapasitas</label>
                                        <input type="text" class="form-control" id="kapasitas"
                                            placeholder="Masukan Jumlah Kapasitas" name="kapasitas" required="required"
                                            value="{{old('kapasitas')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="kapasitas">Keterangan</label>
                                        <input type="text" class="form-control" id="kapasitas"
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
                                    <th>KODE RUANGAN</th>
                                    <th>NAMA RUANGAN</th>
                                    <th>KAPASITAS</th>
                                    <th>KETERANGAN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewRuang as $key => $x)
                                <tr>
                                    <td>{{$viewRuang->firstItem() + $key}}</td>
                                    <td>{{ $x -> kd_ruangan}}</td>
                                    <td>{{ $x -> nama_ruangan }}</td>
                                    <td>{{ $x -> kapasitas }}</td>
                                    <td>{{ $x -> keterangan }}</td>
                                    <td style="text-align:center">
                                        <button type="submit" class="btn btn-inverse-info btn-fw" data-toggle="modal"
                                            data-target="#{{$x->kd_ruangan}}"><i
                                                class="ti-pencil btn-icon-append"></i></button>

                                        <div style="text-align:left" class="modal fade" id="{{$x->kd_ruangan}}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data
                                                            Ruangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/updateRuang/{{$x->kd_ruangan}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="form-group" hidden="true">
                                                                <label for="kd_ruangan">Kode Ruangan</label>
                                                                <input type="text" class="form-control" id="idruang"
                                                                    placeholder="Masukan Lode Ruangan" name="kd_ruangan"
                                                                    required="required" value="{{$x->kd_ruangan}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_ruangan">Nama Ruangan</label>
                                                                <input type="text" class="form-control" id="namaruang"
                                                                    placeholder="Masukan Nama Ruangan"
                                                                    name="nama_ruangan" required="required"
                                                                    value="{{$x->nama_ruangan}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kapasitas">Kapasitas</label>
                                                                <input type="text" class="form-control" id="kapasitas"
                                                                    placeholder="Masukan Jumlah Kapasitas"
                                                                    name="kapasitas" required="required"
                                                                    value="{{$x->kapasitas}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kapasitas">Keterangan</label>
                                                                <input type="text" class="form-control" id="kapasitas"
                                                                    placeholder="Masukan Keterangan" name="keterangan"
                                                                    required="required" value="{{$x->keterangan}}">
                                                            </div>
                                                            <div
                                                                class="modal-footer border-top-0 d-flex justify-content-center">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" value="Simpan Data"
                                                                    class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        <!--Modal Add Data Close-->&nbsp;
                                        <a href="/deleteRuang/{{$x->kd_ruangan }}" id="btn-delete"><button type="button"
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