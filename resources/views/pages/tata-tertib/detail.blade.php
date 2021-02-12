@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>{{$title ?? null}}</h4>
        <a href="{{route('tata_tertib.edit', ['id' => $tata_tertib->id])}}" class="btn btn-sm btn-warning">
            <i class="fa fa-edit"></i>
        </a>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" disabled value="{{$tata_tertib->nama}}">
        </div>
        <div class="form-group mb-0">
            <label>Detail</label>
            <textarea class="form-control" name="detail" disabled>{{$tata_tertib->detail}}</textarea>
        </div>
    </div>
</div>

@endsection
