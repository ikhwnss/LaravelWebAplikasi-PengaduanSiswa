@extends('layouts.app')
@section('content')
<div class="card">
    <form method="POST" action="{{route('tahun-pelajaran.store')}}">
        @csrf
        @method('POST')
        <div class="card-header">
            <h4>{{$title ?? null}}</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required="" value="{{ old('nama') ?? null }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Aktif</label>
                <div class="selectgroup w-100  @error('aktif') is-invalid @enderror">
                    <label class="selectgroup-item">
                        <input type="radio" name="aktif" value="1" class="selectgroup-input" disabled>
                        <span class="selectgroup-button">Aktif</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="aktif" value="0" class="selectgroup-input" checked="" disabled>
                        <span class="selectgroup-button">Nonaktif</span>
                    </label>
                </div>
                @error('aktif')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{route('tahun-pelajaran.index')}}" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>

@endsection
