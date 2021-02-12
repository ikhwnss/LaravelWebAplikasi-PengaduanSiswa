@extends('layouts.app')
@section('content')
<div class="card">
        <div class="card-header">
            <h4>{{$title ?? null}}</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Tata Tertib</label>
                <select name="id_tata_tertib" class="form-control" disabled>
                    <option value="{{$data->tataTertib->id}}">{{$data->tataTertib->nama}}</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <textarea class="form-control" name="nama" disabled>{{ $data->nama  ?? null}}</textarea>
            </div>
            <div class="form-group mb-0">
                <label>Detail</label>
                <textarea class="form-control" name="detail" disabled>{{$data->detail ??  null}}</textarea>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control select2" disabled>
                    <option value="">Pilih</option>
                    <option value="ringan" @if($data->kategori == 'ringan') selected @endif>Ringan</option>
                    <option value="sedang" @if($data->kategori == 'sedang') selected @endif>Sedang</option>
                    <option value="berat" @if($data->kategori == 'berat') selected @endif>Berat</option>
                </select>
            </div>
            <div class="form-group mb-0">
                <label>Poin</label>
                <input type="number" name="poin" disabled class="form-control" value="{{$data->poin ?? null}}">
            </div>
            <div class="form-group mb-0">
                <label>Sanksi</label>
                <textarea class="form-control" name="sanksi" disabled>{{$data->sanksi ??  null}}</textarea>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{route('pelanggaran.index')}}" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <a href="{{route('pelanggaran.edit', ['id' => $data->id])}}" class="btn btn-warning">
                <i class="fa fa-edit"></i> Ubah
            </a>
        </div>
    </form>
</div>

@endsection
