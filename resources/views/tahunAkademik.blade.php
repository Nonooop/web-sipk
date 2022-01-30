@extends('main')

@section('judul')
SIPK-PEI/Tahun Akademik
@endsection

@section('konten')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title">Data Tahun Akademik</p>
            <div>
                <!-- Moodal Add Data -->
                <button type="button" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#AddTA"><i
                        class="ti-plus btn-icon-append"></i>
                    Tambah Data</button><br><br>
                <div class="modal fade" id="AddTA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tahun Akademik</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/addTA" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="kd_TA">Kode Tahun Akademik</label>
                                        <input type="text" class="form-control" id="kdTA"
                                            placeholder="Masukan Kode Tahun Akademik" name="kd_TA" required="required"
                                            value="{{old('kd_TA')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun_akademik">Tahun Akademik</label>
                                        <input type="text" class="form-control" id="tahunakademik"
                                            placeholder="Masukan Tahun Akademik" name="tahun_akademik"
                                            required="required" value="{{old('tahun_akademik')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select class="form-control form-select" title="semester" name="semester"
                                            required="required" value="{{old('semester')}}">
                                            <option value="-">Pilih Semester</option>
                                            <option value="Ganjil">Ganjil</option>
                                            <option value="Genap">Genap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control form-select" title="status" name="status"
                                            required="required" value="{{old('status')}}">
                                            <option value="-">Pilih Status</option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="TdAktif">Tidak Aktif</option>
                                            <option value="Alumni">Alumni</option>
                                        </select>
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
                                    <th>KODE TAHUN</th>
                                    <th>TAHUN AKADEMIK</th>
                                    <th>SEMESTER</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewTA as $key => $x)
                                <tr>
                                    <td>{{$viewTA -> firstItem() + $key}}</td>
                                    <td>{{ $x -> kd_TA }}</td>
                                    <td>{{ $x -> tahun_akademik }}</td>
                                    <td>{{ $x -> semester }}</td>
                                    <td>{{ $x -> status }}</td>
                                    <td style="text-align:center">

                                        <button type="submit" class="btn btn-inverse-info btn-fw" data-toggle="modal"
                                            data-target="#{{$x->kd_TA}}"><i
                                                class="ti-pencil btn-icon-append"></i></button>

                                        <div style="text-align:left" class="modal fade" id="{{$x->kd_TA}}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <form action="/updateTA/{{$x->kd_TA}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="form-group" hidden="true">
                                                                <label for="kd_TA">Kode Tahun Akademik</label>
                                                                <input type="text" class="form-control" id="kdTA"
                                                                    placeholder="Masukan Kode Tahun Akademik" name="kd_TA"
                                                                    required="required" value="{{$x->kd_TA}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tahun_akademik">Tahun Akademik</label>
                                                                <input type="text" class="form-control"
                                                                    id="tahunakademik"
                                                                    placeholder="Masukan Tahun Akademik"
                                                                    name="tahun_akademik" required="required"
                                                                    value="{{$x->tahun_akademik}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="semester">Semester</label>
                                                                <input type="text" class="form-control" id="semester"
                                                                    placeholder="Masukan Semester" name="semester"
                                                                    required="required" value="{{$x->semester}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="status">Status</label>
                                                                <input type="text" class="form-control" id="status"
                                                                    placeholder="Masukan Semester" name="status"
                                                                    required="required" value="{{$x->status}}">
                                                            </div>
                                                            <div
                                                                class="modal-footer border-top-0 d-flex justify-content-center">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" value="Simpan Data"
                                                                    class="btn btn-primary" id="btn-update">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        <!--Modal Add Data Close-->
                                        &nbsp;
                                        <a href="/deleteTA/{{$x->kd_TA }}" id="btn-delete"><button type="button"
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