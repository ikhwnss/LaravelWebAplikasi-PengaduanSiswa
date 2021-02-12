@extends('layouts.app')
@section('content')
<div class="card">
    <form method="POST" action="">
        @csrf
        @method('POST')
        <div class="card-header">
            <h4>{{$title ?? null}}</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required="">
            </div>
            <div class="form-group mb-0">
                <label>Detail</label>
                <textarea class="form-control" name="detail" required=""></textarea>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

@endsection
