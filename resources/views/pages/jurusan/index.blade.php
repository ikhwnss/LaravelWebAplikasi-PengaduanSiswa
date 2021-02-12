@extends('layouts.app')
@section('content')
<div class="card">
        <div class="card-header">
            <h5>Data {{$title ?? null}}</h5>
            <div class="card-header-action ml-auto">
                <a class="btn btn-icon btn-success" href="{{ route('jurusan.tambah') ?? null}}"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="datatables">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">ID</th>
                            <th width="25%">Nama</th>
                            <th>Detail</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) < 1)
                            <tr>
                                <th colspan="5" class="text-center">Tidak Ada Data</th>
                            </tr>
                            <tr>
                                <th colspan="5" class="text-center">
                                    <a class="btn btn-icon btn-success" href="{{ route('jurusan.tambah') ?? null}}"><i class="fas fa-plus"></i></a>
                                </th>
                            </tr>
                        @endif
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->detail}}</td>
                                <td>
                                    <div class="btn-group mb-3" role="group" aria-label="Aksi">
                                        <a href="{{route('jurusan.edit',['id' => $item->id])}}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('jurusan.delete',['id' => $item->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?');">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">ID</th>
                            <th width="25%">Nama</th>
                            <th>Deskripsi</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js_page')
    <script>
        $("#datatables").DataTable();
    </script>
@endsection
