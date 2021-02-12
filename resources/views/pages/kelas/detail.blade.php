@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>{{$title ?? null}}</h4>
        <a href="{{route('kelas.edit', ['id' => $kelas->id])}}" class="btn btn-sm btn-warning">
            <i class="fa fa-edit"></i>
        </a>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" disabled value="{{$kelas->nama}}">
        </div>
        <div class="form-group mb-0">
            <label>Detail</label>
            <textarea class="form-control" name="detail" disabled>{{$kelas->detail}}</textarea>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Daftar Siswa Kelas {{$kelas->nama ?? null }} Pada Tahun Pelajaran {{ $tahun_pelajaran->nama ?? null}}</h4>
        <a href="{{route('kelas.siswa', ['id' => $kelas->id])}}" class="btn btn-sm btn-warning">
            <i class="fa fa-edit"></i>
        </a>
    </div>
    <div class="card-body">
        @if (count($data) > 0)
            <ol>
                @foreach ($data as $item)
                    <li>{{$item->nama_depan ?? null}} {{$item->nama_belakang ?? null}}</li>
                @endforeach
            </ol>
        @else
            Belum ada data
        @endif
    </div>
</div>

@endsection
