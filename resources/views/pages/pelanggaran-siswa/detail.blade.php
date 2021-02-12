@extends('layouts.app')
@section('content')
<div class="card">
        <div class="card-header">
            <h4>{{$title ?? null}}</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Guru</label>
                <input type="text" class="form-control" disabled="" value="{{$data->guru->nama_depan}} {{$data->guru->nama_belakang ?? null}}">
            </div>
            <div class="form-group">
                <label>Siswa</label>
                <input type="text" class="form-control" disabled="" value="{{$data->siswa->nama_depan}} {{$data->siswa->nama_belakang ?? null}}">
            </div>
            <div class="form-group">
                <label>Pelanggaran</label>
                <input type="text" class="form-control" disabled="" value="{{$data->pelanggaran->nama ?? null}}">
            </div>
            <div class="form-group mb-0 gallery gallery-fw" data-item-height="100%">
                <label>Foto</label>
                <img class="gallery-item" src="{{asset($data->foto ?? 'assets/img/avatar/avatar-1.png')}}" alt="{{$data->pelanggaran->nama ?? null}}">
            </div>
            <div class="form-group">
                <label>Tanggal Pelanggaran</label>
                <input type="text" name="tanggal_pelanggaran" class="form-control" disabled="" value="{{$data->tanggal_pelanggaran ?? null}}">
            </div>
            <div class="form-group">
                <label>Tindak Lanjut</label>
                <select name="tindak_lanjut" class="form-control select2" disabled>
                    <option value="0">Pilih</option>
                    <option value="0" @if($data->tindak_lanjut == 0) selected @endif>Belum</option>
                    <option value="1" @if($data->tindak_lanjut == 1) selected @endif>Sudah</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Konseling</label>
                <input type="text" name="tanggal_konseling" class="form-control" disabled="" value="{{$data->tanggal_konseling ?? null}}">
            </div>
            <div class="form-group mb-0">
                <label>Hasil Konseling</label>
                <textarea class="form-control" disabled="">{{$data->hasil_konseling ?? null}}</textarea>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{route('pelanggaran_siswa.index')}}" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <a href="{{route('pelanggaran_siswa.edit',['id' => $data->id])}}" class="btn btn-primary">
                <i class="fa fa-edit"></i> Edit
            </a>
        </div>
    </form>
</div>

@endsection
