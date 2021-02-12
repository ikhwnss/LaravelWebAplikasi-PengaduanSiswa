@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Data {{$title ?? null}}</h5>
        <div class="card-header-action ml-auto">
            <a class="btn btn-icon btn-success" href="{{ route('tahun-pelajaran.tambah') ?? null}}"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-md" id="datatables">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">ID</th>
                        <th>Nama</th>
                        <th width="5%">Aktif</th>
                        <th width="5%">Jurusan</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($data) < 1)
                        <tr>
                            <th colspan="4" class="text-center">Tidak Ada Data</th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-center">
                                <a class="btn btn-icon btn-success" href="{{ route('tahun-pelajaran.tambah') ?? null}}"><i class="fas fa-plus"></i></a>
                            </th>
                        </tr>
                    @endif
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                @if ($item->aktif === 1)
                                <button class="btn btn-sm btn-icon btn-success">
                                    <i class="fa fa-check-circle"></i>
                                </button>
                                @else
                                <button class="btn btn-sm btn-icon btn-danger">
                                    <i class="fa fa-times-circle"></i>
                                </button>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('tahun-pelajaran.detail',['id' => $item->id])}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <div class="btn-group mb-3" role="group" aria-label="Aksi">
                                    <a href="{{route('tahun-pelajaran.edit',['id' => $item->id])}}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('tahun-pelajaran.delete',['id' => $item->id])}}" method="POST">
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
                        <th>Nama</th>
                        <th width="5%">Aktif</th>
                        <th width="5%">Jurusan</th>
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
