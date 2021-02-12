@extends('layouts.app')
@section('content')
<form method="POST" action="{{route('pengguna.generate.aksi')}}">
@csrf
@method('POST')
<div class="card">
    <div class="card-header">
        <h5>{{$title ?? null}}</h5>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Hak Akses</label>
            <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                <option value="">Pilih</option>
                @foreach ($collection as $key => $value)
                    <option value="{{$key}}" @if($key == old('role')) selected @endif>{{$value}}</option>
                @endforeach
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="card-footer text-right">
        <a href="{{route('pengguna.index')}}" class="btn btn-warning">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
        <button class="btn btn-primary">
            <i class="fa fa-save"></i> Generate
        </button>
    </div>
</div>
</form>
@endsection
