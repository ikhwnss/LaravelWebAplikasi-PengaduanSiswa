@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>{{$title ?? null}}</h4>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" disabled value="{{$data->nama?? null }}">
        </div>

        <div class="form-group">
            <label class="form-label">Aktif</label>
            <div class="selectgroup w-100">
                <label class="selectgroup-item">
                    <input type="radio" name="aktif" value="1" class="selectgroup-input" @if($data->aktif === 1) checked="" @endif disabled>
                    <span class="selectgroup-button">Aktif</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="aktif" value="0" class="selectgroup-input" @if($data->aktif === 0) checked="" @endif disabled>
                    <span class="selectgroup-button">Nonaktif</span>
                </label>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <form action="{{route('tahun-pelajaran.jurusan', ['id' => $data->id])}}" method="POST">
    @csrf
    <div class="card-header">
        <h4>Jurusan Yang Aktif Pada Tahun Pelajaran {{$data->nama}}</h4>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label class="custom-switch mt-2">
                <input type="checkbox" id="select_all" class="custom-switch-input" @if(count($data->jurusan) === count($jurusan)) checked @endif>
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description"> Pilih Semua</span>
            </label>
        </div>
        @foreach ($jurusan as $item)
            <div class="form-group">
                <label class="custom-switch mt-2">
                    @if (count($data->jurusan) > 0)
                        <input type="checkbox" name="id_jurusan[]" value="{{ $item->id ?? null }}" class="custom-switch-input" @foreach ($data->jurusan as $j) @if ($item->id === $j->id) checked @endif @endforeach>
                    @else
                        <input type="checkbox" name="id_jurusan[]" value="{{ $item->id ?? null }}" class="custom-switch-input" >
                    @endif
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">{{ $item->nama ?? null}} - {{ $item->detail }}</span>
                </label>
            </div>
        @endforeach
    </div>
    <div class="card-footer text-center">
        <a href="{{route('tahun-pelajaran.index')}}" class="btn btn-warning">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Simpan
        </button>
    </div>
    </form>
</div>

@endsection

@section('js_page')
    <script>
        $("#select_all").click(function(){
            $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
        });
    </script>
@endsection
