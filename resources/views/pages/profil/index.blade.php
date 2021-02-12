@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{$title ?? null}}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4 col-4">
                <img src="{{ asset($data->photo ?? "assets/img/avatar/avatar-1.png") }}" alt="{{$data->name}}" class="imagecheck-image">
            </div>
            <div class="form-group col-md-8 col-8">
                <div class="row">
                    <div class="col-md-12">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{$data->name}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <label>Nama Pengguna</label>
                        <input type="text" class="form-control" value="{{$data->username}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for=""></label>
                        <a href="{{route('profil.edit')}}" class="btn btn-warning form-control">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="form-group col-md-12 col-12">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo">
                    <label class="custom-file-label" for="photo">Pilih Berkas</label>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
