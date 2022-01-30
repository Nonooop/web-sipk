@extends('main')

@section('judul')
SIPK-PEI/Pengaturan
@endsection

@section('konten')
<div class="container-fluid">
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body profile-card">
                    <center class="mt-4">
                        @if (auth()->user()->foto != null)
                            <img src="{{url('/'.auth()->user()->foto)}}" class="rounded-circle" width="150" />
                            @else
                            <img src="{{asset('template/images/avatar.png')}}" class="rounded-circle" width="150" />
                            @endif
                        <h4 class="card-title mt-2">{{auth()->user()->name}}</h4>
                        <h6 class="card-subtitle">{{auth()->user()->role}}</h6>
                    </center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="/updateUser/{{'auth'}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" required="required"
                                    value="{{auth()->user()->name}}">
                                </div>
                                <div class="col-xl-6 col-xl-6">
                                    <label for="nidn">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" name="email" required="required"
                                    value="{{auth()->user()->email}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="nidn">Password</label>
                            <input type="password" value="password" class="form-control ps-0 form-control-line" name="password" required="required"
                            value="{{auth()->user()->password}}"/>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <label for="nidn">Role</label>
                                    <input type="text" class="form-control" placeholder="Role" name="role" required="required"
                                    value="{{auth()->user()->role}}">
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <label for="exampleInputFile">Foto Profil</label>
                                    <input type="file" name="foto" class="form-control">
                                    <input type="hidden" value="{{auth()->user()->foto}}" name="pathFoto"
                                        class="form-control">
                                    <img src="{{asset('/'.auth()->user()->foto)}}" width="75px" height="auto">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit" class="btn btn-primary mx-auto mx-md-0 text-white">
                                    Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
