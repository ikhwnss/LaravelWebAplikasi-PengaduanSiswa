@extends('layouts.app')
@section('content')
<div class="card">
    <form method="POST" action="{{route('tata_tertib.store')}}">
        @csrf
        @method('POST')
        <div class="card-header">
            <h4>{{$title ?? null}}</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required="" value="{{old('nama') ?? null}}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-0">
                <label>Detail</label>
                <textarea class="form-control @error('detail') is-invalid @enderror" name="detail">{{old('detail') ?? null}}</textarea>
                @error('detail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{route('tata_tertib.index')}}" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>

@endsection
