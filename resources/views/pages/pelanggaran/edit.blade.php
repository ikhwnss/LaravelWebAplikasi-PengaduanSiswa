@extends('layouts.app')
@section('content')
<div class="card">
    <form method="POST" action="{{route('pelanggaran.update',['id' => $data->id])}}">
        @csrf
        @method('POST')
        <div class="card-header">
            <h4>{{$title ?? null}}</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Tata Tertib</label>
                <select name="id_tata_tertib" class="form-control @error('id_tata_tertib') is-invalid @enderror" required>
                    <option value="">Pilih</option>
                    @foreach ($collection as $key => $value)
                        <option value="{{$key}}" @if($data->id_tata_tertib == $key || $key == old('id_tata_tertib')) selected @endif>{{$value}}</option>
                    @endforeach
                </select>
                @error('id_tata_tertib')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Nama</label>
                <textarea class="form-control @error('nama') is-invalid @enderror" name="nama" required>{{ $data->nama ?? old('nama') ?? null}}</textarea>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-0">
                <label>Detail</label>
                <textarea class="form-control @error('detail') is-invalid @enderror" name="detail">{{$data->detail ?? old('detail') ?? null}}</textarea>
                @error('detail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control select2 @error('kategori') is-invalid @enderror" required>
                    <option value="">Pilih</option>
                    <option value="ringan" @if(old('kategori') == 'ringan' || $data->kategori == 'ringan') selected @endif>Ringan</option>
                    <option value="sedang" @if(old('kategori') == 'sedang' || $data->kategori == 'sedang') selected @endif>Sedang</option>
                    <option value="berat" @if(old('kategori') == 'berat' || $data->kategori == 'berat') selected @endif>Berat</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-0">
                <label>Poin</label>
                <input type="number" name="poin" required class="form-control @error('poin') is-invalid @enderror" value="{{$data->poin ?? old('poin') ?? null}}">
                @error('poin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-0">
                <label>Sanksi</label>
                <textarea class="form-control @error('sanksi') is-invalid @enderror" name="sanksi">{{$data->sanksi ?? old('sanksi') ?? null}}</textarea>
                @error('sanksi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{route('pelanggaran.index')}}" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>

@endsection
