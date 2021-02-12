@extends('layouts.app')
@section('content')
<form action="{{route('profil.update')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="card">
    <div class="card-header">
        <h5>{{$title ?? null}}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 col-4">
                <div class="row">
                    <div class="form-group col-md-12">
                        <img src="{{ asset($data->photo ?? "assets/img/avatar/avatar-1.png") }}" alt="{{$data->name}}" class="imagecheck-image">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" id="photo">
                            <label class="custom-file-label" for="photo">Pilih Berkas</label>
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-8">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{$data->name}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Nama Pengguna</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{old('username') ?? $data->username}}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Kata Sandi</label>
                        <input type="password" class="form-control pwstrength @error('password') is-invalid @enderror" name="password" data-indicator="pwindicator" value="{{old('password') ?? null}}" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Kata Sandi Konfirmasi</label>
                        <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation') ?? null}}" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <button class="btn btn-warning form-control">Perbaharui</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

@endsection

@section('js_page')
<script src="{{ asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
@endsection
