@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{$title ?? null}}</h5>
        <div class="card-header-action ml-auto">
            <a class="btn btn-icon btn-success" href="{{ route('pengguna.generate') ?? null}}"><i class="fas fa-user-plus"></i></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped  table-md" id="datatables">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Nama Pengguna</th>
                        <th width="10%">Hak Akses</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count() < 1)
                        <tr class="text-center">
                            <td colspan="5">Tidak Ada Pengguna Aktif</td>
                        </tr>
                    @else
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name ?? null}}</td>
                            <td>{{$item->username}}</td>
                            <td>
                                {{$item->role}}
                            </td>
                            <td>
                                <div class="buttons">
                                    <div class="btn-group mb-3" role="group" aria-label="Aksi">
                                        <a href="{{route('pengguna.reset',['id' => $item->id])}}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-sync-alt" title="Atur Ulang Kata Sandi"></i>
                                        </a>
                                        <form action="{{route('pengguna.delete',['id' => $item->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?');">
                                                <i class="fa fa-trash-alt" title="Hapus"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif

                </tbody>
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
