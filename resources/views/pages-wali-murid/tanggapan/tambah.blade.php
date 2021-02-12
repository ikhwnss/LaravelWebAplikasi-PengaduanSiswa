@extends('layouts.app')
@section('content')
<div class="card">
    <form method="POST" action="{{route('wali-murid.tanggapan.store', ['id' => $pelanggaran->id])}}">
        @csrf
        @method('POST')
        <div class="card-header">
            <h4>{{$title ?? null}}</h4>
        </div>
        <div class="card-body">
            <div class="form-group mb-0">
                <label>Tanggapan</label>
                <textarea class="form-control @error('tanggapan') is-invalid @enderror" name="tanggapan">{{old('tanggapan') ?? null}}</textarea>
                @error('tanggapan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{route('wali-murid.rekap.index')}}" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>

@endsection
