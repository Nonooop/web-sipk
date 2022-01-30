@extends('main')

@section('judul')
SIPK-PEI/Matakuliah
@endsection

@section('konten')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title">Data Matakuliah</p>
            <div>
                <!-- Moodal Add Data -->
                <button type="submit" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#AddMK"><i
                        class="ti-plus btn-icon-append"></i>
                    Tambah Data</button><br><br>
                <div class="modal fade" id="AddMK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Matakuliah</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/addMk" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <label for="kd_matakuliah">Kode Matakuliah</label>
                                                <input type="text"
                                                    class="form-control @error('kd_matakuliah') is-invalid @enderror"
                                                    id="idmk" placeholder="Masukan Kode Matakuliah" name="kd_matakuliah"
                                                    value="{{old('kd_matakuliah')}}" required="required">
                                                @error('kd_matakuliah')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 col-xl-6">
                                                <label for="nama_matakuliah">Nama Matakuliah</label>
                                                <input type="text"
                                                    class="form-control @error('nama_matakuliah') is-invalid @enderror"
                                                    id="namamk" placeholder="Masukan Nama Matakuliah"
                                                    name="nama_matakuliah" value="{{old('nama_matakuliah')}}"
                                                    required="required">
                                                @error('nama_matakuliah')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <label for="sks">SKS</label>
                                                <input type="text" class="form-control " id="sks"
                                                    placeholder="Masukan Jumlah SKS" name="sks" required="required"
                                                    value="{{old('sks')}}">
                                            </div>
                                            <div class="col-xl-6 col-xl-6">
                                                <label for="exampleSelectGender">Semester</label>
                                                <select class="form-control" id="exampleSelectGender" name="semester"
                                                    required="required" value="{{old('semester')}}">
                                                    <option>- Pilih Semester -</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                                            <button type="refresh" class="btn btn-secondary"
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
                                    <th>KODE MATAKULIAH</th>
                                    <th>NAMA MATAKULIAH</th>
                                    <th>SKS</th>
                                    <th>SEMESTER</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewMk as $key => $x)
                                <tr>
                                    <td>{{$viewMk->firstItem() + $key}}</td>
                                    <td>{{ $x -> kd_matakuliah}}</td>
                                    <td>{{ $x -> nama_matakuliah }}</td>
                                    <td>{{ $x -> sks }}</td>
                                    <td>{{ $x -> semester }}</td>
                                    <td style="text-align:center">
                                        <button type="submit" class="btn btn-inverse-info btn-fw" data-toggle="modal"
                                            data-target="#{{$x->kd_matakuliah}}"><i
                                                class="ti-pencil btn-icon-append"></i></button>

                                        <div style="text-align:left" class="modal fade" id="{{$x->kd_matakuliah}}"
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
                                                    <form action="/updateMk/{{$x->kd_matakuliah}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="form-group" hidden="true">
                                                                <label for="kd_matakuliah">Kode Matakuliah</label>
                                                                <input type="text" class="form-control" id="idmk"
                                                                    placeholder="Masukan Id Matakuliah"
                                                                    name="kd_matakuliah" value="{{$x->kd_matakuliah}}"
                                                                    required="required">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_matakuliah">Nama Matakuliah</label>
                                                                <input type="text" class="form-control" id="namamk"
                                                                    placeholder="Masukan Nama Matakuliah"
                                                                    name="nama_matakuliah"
                                                                    value="{{$x->nama_matakuliah}}" required="required">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sks">SKS</label>
                                                                <input type="text" class="form-control" id="sks"
                                                                    placeholder="Masukan Jumlah SKS" name="sks"
                                                                    required="required" value="{{$x->sks}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">Semester</label>
                                                                <select class="form-control" id="exampleSelectGender"
                                                                    name="semester" required="required"
                                                                    value="{{$x->semester}}">
                                                                    <option>{{$x->semester}}</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                </select>
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
                                        </div>
                                        <!--Modal Add Data Close-->
                                        &nbsp
                                        <a href="/deleteMk/{{$x->kd_matakuliah}}" id="btn-delete"><button type="button"
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