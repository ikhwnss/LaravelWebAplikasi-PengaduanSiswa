@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>{{$title ?? null}}</h4>
    </div>
    <div class="card-body">
        <div class="form-group mb-0">
            <label>Tanggapan</label>
            <textarea class="form-control" name="tanggapan" disabled>{{$data->tanggapan->tanggapan ?? null}}</textarea>
        </div>
    </div>
    <div class="card-footer text-right">
        <a href="{{route('pelanggaran_siswa.index')}}" class="btn btn-warning">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

@endsection
