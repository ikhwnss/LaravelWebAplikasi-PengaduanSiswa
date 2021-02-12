@extends('layouts.app')
@section('content')
<div class="card">
    <form method="POST" action="{{route('kelas.update', ['id' => $data->id])}}">
        @csrf
        @method('POST')
        <div class="card-header">
            <h4>{{$title ?? null}}</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Jurusan</label>
                <select name="id_jurusan" class="form-control @error('id_jurusan') is-invalid @enderror" required>
                    <option value="">Pilih</option>
                    @foreach ($collection as $key => $value)
                        <option value="{{$key}}" @if($key === $data->id_jurusan || $key == old('id_jurusan')) selected @endif>{{$value}}</option>
                    @endforeach
                </select>
                @error('id_jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required="" value="{{ old('nama') ?? $data->nama ?? null }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-0">
                <label>Detail</label>
                <textarea class="form-control @error('detail') is-invalid @enderror" name="detail">{{ old('detail') ?? $data->detail ?? null }}</textarea>
                @error('derail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{route('kelas.index')}}" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i> Perbaharui
            </button>
        </div>
    </form>
</div>

@endsection
