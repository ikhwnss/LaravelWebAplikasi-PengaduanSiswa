@extends('layouts.app')
@section('content')
<div class="card">
    <form method="POST" action="{{route('guru.store')}}">
        @csrf
        @method('POST')
        <div class="card-header">
            <h4>{{$title ?? null}}</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama Depan</label>
                <input type="text" name="nama_depan" class="form-control @error('nama_depan') is-invalid @enderror" required="" value="{{ old('nama_depan') ?? null}}">
                @error('nama_depan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Nama Belakang</label>
                <input type="text" name="nama_belakang" class="form-control @error('nama_belakang') is-invalid @enderror" value="{{ old('nama_belakang') ?? null }}" >
                @error('nama_belakang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Kode Guru</label>
                <input type="text" name="kode_guru" class="form-control @error('kode_guru') is-invalid @enderror" required="" value="{{old('kode_guru') ?? null}}">
                @error('kode_guru')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" value="{{ old('nomor_telepon') ?? null }}">
                @error('nomor_telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Alamat Rumah</label>
                <textarea name="alamat_rumah" id="alamat_rumah" cols="30" rows="10" class="form-control @error('alamat_rumah') is-invalid @enderror">{{ old('alamat_rumah') ?? null}}</textarea>
                @error('alamat_rumah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? null }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{route('guru.index')}}" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>

@endsection
