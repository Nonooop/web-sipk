@extends('main')

@section('judul')
SIPK-PEI/Datail User
@endsection

@section('konten')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div>
                <div class="pull-left">
                    <h4 class="card-title">Detail Data User</h4>
                </div>
                <div class="pull-right">
                    <a href="/viewUsr"><button type="button" class="btn btn-warning btn-icon-text">
                            <i class="ti-reload btn-icon-prepend"></i>
                            Kembali
                        </button></a>
                </div>
            </div>
            <div class="col-12">
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%">NAMA LENGKAP</th>
                                        <td>{{$x->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>EMAIL</th>
                                        <td>{{$x->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>PASSWORD</th>
                                        <td>{{$x->password}}</td>
                                    </tr>
                                    <tr>
                                        <th>LEVEL PENGGUNA</th>
                                        <td>{{$x->role}}</td>
                                    </tr>
                                    <tr>
                                        <th>FOTO</th>
                                        <td><img src="{{asset('/'.$x->foto)}}" width="900px" height="auto"></td>
                                    </tr>
                                    <tr>
                                        <th>TANGGAL DIBUAT</th>
                                        <td>{{$x->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th>TANGGAL DIEDIT</th>
                                        <td>{{$x->updated_at}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection