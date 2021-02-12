@extends('layouts.app')
@section('content')
<div class="card">
    <form method="POST" action="{{route('tahun-pelajaran.pilih.aksi')}}">
        @csrf
        @method('POST')
        <div class="card-header">
            <h4>{{$title ?? null}}</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <select name="id_tahun_pelajaran" class="form-control @error('id_tahun_pelajaran') is-invalid @enderror" required>
                    @foreach ($data as $item)
                        <option value="{{$item->id}}" @if( $item->aktif === 1) selected @endif>{{$item->nama}}</option>
                    @endforeach
                </select>
                @error('id_tahun_pelajaran')
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
