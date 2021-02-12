@extends('layouts.app')
@section('content')
<div class="card">
    <form method="POST" action="{{route('pelanggaran_siswa.update',['id' => $data->id])}}"  enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card-header">
            <h4>{{$title ?? null}}</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Guru</label>
                <select name="id_guru" class="form-control select2 @error('id_guru') is-invalid @enderror" required>
                    <option value="">Pilih</option>
                    @foreach ($guru as $item)
                        <option value="{{$item->id}}" @if($item->id == $data->id_guru) selected @endif>{{$item->nip}} - {{$item->nama_depan}} {{$item->nama_belakang ?? null }}</option>
                    @endforeach
                </select>
                @error('id_guru')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Siswa</label>
                <select name="id_siswa" class="form-control select2 @error('id_siswa') is-invalid @enderror" required>
                    <option value="">Pilih</option>
                    @foreach ($siswa as $item)
                        <option value="{{$item->id}}" @if($item->id == $data->id_siswa) selected @endif>{{$item->nis}} - {{$item->nama_depan}} {{$item->nama_belakang ?? null }}</option>
                    @endforeach
                </select>
                @error('id_siswa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Pelanggaran</label>
                <select name="id_pelanggaran" class="form-control select2 @error('id_pelanggaran') is-invalid @enderror" required>
                    <option value="">Pilih</option>
                    @foreach ($pelanggaran as $key => $value)
                        <option value="{{$key}}" @if($key == $data->id_pelanggaran) selected @endif>{{$value}}</option>
                    @endforeach
                </select>
                @error('id_pelanggaran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-0 gallery gallery-fw" data-item-height="100%">
                <label>Foto Saat Ini</label>
                <img class="gallery-item" src="{{asset($data->foto ?? 'assets/img/avatar/avatar-1.png')}}" alt="{{$data->pelanggaran->nama ?? null}}">
            </div>

            <div class="form-group">
                <label>Foto</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="foto" id="foto" value="{{$data->foto ?? null}}">
                    <label class="custom-file-label" for="foto">Pilih Berkas</label>
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Pelanggaran</label>
                <input type="text" name="tanggal_pelanggaran" class="form-control datetimepicker @error('tanggal_pelanggaran') is-invalid @enderror" required="" value="{{$data->tanggal_pelanggaran ?? null}}">
                @error('tanggal_pelanggaran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tindak Lanjut</label>
                <select name="tindak_lanjut" class="form-control @error('tindak_lanjut') is-invalid @enderror" required>
                    <option value="0">Pilih</option>
                    <option value="0" @if($data->tindak_lanjut == 0) selected @endif>Belum</option>
                    <option value="1" @if($data->tindak_lanjut == 1) selected @endif>Sudah</option>
                </select>
                @error('tindak_lanjut')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Konseling</label>
                <input type="text" name="tanggal_konseling" class="form-control datetimepicker @error('tanggal_konseling') is-invalid @enderror" value="{{$data->tanggal_konseling ?? null}}">
                @error('tanggal_konseling')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-0">
                <label>Hasil Konseling</label>
                <textarea class="form-control @error('hasil_konseling') is-invalid @enderror" name="hasil_konseling">{{$data->hasil_konseling ?? null}}</textarea>
                @error('hasil_konseling')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{route('pelanggaran_siswa.index')}}" class="btn btn-warning">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button class="btn btn-primary">Perbaharui</button>
        </div>
    </form>
</div>

@endsection
