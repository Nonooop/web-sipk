@extends('main')

@section('judul')
SIPK-PEI/Jam
@endsection

@section('konten')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title">Data Jam</p>
            <div>
                <!-- Moodal Add Data -->
                <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal"
                    data-target="#AddJam"><i class="ti-plus btn-icon-append"></i>
                    Tambah Data</button><br><br>
                <div class="modal fade" id="AddJam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jam</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/addJam" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="jam">Waktu Pekuliahan</label>
                                        <input type="text" class="form-control @error('jam') is-invalid @enderror" id="jam"
                                            placeholder="Masukan Waktu Perkuliahan" name="jam"
                                            required="required" value="{{old('jam')}}">
                                            @error('jam')
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
                                    <th>Kode Jam</th>
                                    <th>Waktu Perkuliahan</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewJam as $key=>$x)
                                <tr>
                                    <td>{{$viewJam->firstItem() + $key}}</td>
                                    <td>{{ $x -> kd_jam }}</td>
                                    <td>{{ $x -> jam }}</td>
                                    <td style="text-align:center">
                                        <button type="submit" class="btn btn-inverse-info btn-fw" data-toggle="modal"
                                            data-target="#{{$x->kd_jam}}"><i
                                                class="ti-pencil btn-icon-append"></i></button>

                                        <div style="text-align:left" class="modal fade" id="{{$x->kd_jam}}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data
                                                            Jam</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/updateJam/{{$x->kd_jam}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="form-group" hidden="true">
                                                                <label for="kd_jam">Kode Jam</label>
                                                                <input type="text" class="form-control" id="kdjam"
                                                                    placeholder="Masukan Kode Jam" name="kd_jam"
                                                                    required="required" value="{{$x->kd_jam}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jam">Waktu Perkuliahan</label>
                                                                <input type="text" class="form-control" id="jam"
                                                                    placeholder="Masukan Waktu Perkuliahan"
                                                                    name="jam" required="required"
                                                                    value="{{$x->jam}}">
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
                                        <a href="/deleteJam/{{$x->kd_jam }}" id="btn-delete"><button type="button"
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