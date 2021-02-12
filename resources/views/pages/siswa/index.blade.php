@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Data {{$title ?? null}}</h5>
        <div class="card-header-action ml-auto">
            <a class="btn btn-icon btn-success" href="{{ route('siswa.tambah') ?? null}}"><i class="fas fa-plus"></i></a>
            <a class="btn btn-icon btn-primary" href="{{ route('siswa.upload') ?? null}}"><i class="fas fa-upload"></i></a>
            <a class="btn btn-icon btn-primary" href="{{ route('siswa.download') ?? null}}"><i class="fas fa-download"></i></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-md" id="datatables">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">ID</th>
                        <th width="20%">Nama</th>
                        <th>Detail</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($data) < 1)
                        <tr>
                            <th colspan="4" class="text-center">Tidak Ada Data</th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-center">
                                <a class="btn btn-icon btn-success" href="{{ route('siswa.tambah') ?? null}}"><i class="fas fa-plus"></i></a>
                            </th>
                        </tr>
                    @endif
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_depan ?? null }} {{$item->nama_belakang ?? null }}</td>
                        <td>
                            <strong>Wali Murid:</strong><br>
                            @foreach ($item->waliMurid as $w)
                                {{$w->nama_depan ?? ''}} {{$w->nama_belakang}} <br>
                            @endforeach
                            <br>
                            <strong>Nomor Induk Siswa :</strong><br>
                            {{$item->nis ?? '-'}} <br>
                            <strong>Nomor Telepon : </strong><br>
                            {{$item->nomor_telepon ?? '-'}} <br>
                            <strong>Email : </strong><br>
                            {{$item->email ?? '-'}} <br>
                            <strong>Alamat Rumah : </strong><br>
                            {{$item->alamat_rumah ?? '-'}} <br>
                        </td>
                        <td>
                            <div class="btn-group mb-3" role="group" aria-label="Aksi">
                                @if(count($item->waliMurid))
                                    <a href="{{route('siswa.wali_murid', ['id' => $item->id])}}" class="btn btn-sm btn-primary">Kelola Wali Murid</a><br>
                                @else
                                    Belum Ada Wali Murid <a href="{{route('siswa.wali_murid', ['id' => $item->id])}}" class="btn btn-sm btn-primary">Tambah Wali Murid</a> <br>
                                @endif
                                <a href="{{route('siswa.edit',['id' => $item->id])}}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{route('siswa.delete',['id' => $item->id])}}" method="POST">
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
                        <th width="10%">ID</th>
                        <th width="20%">Nama</th>
                        <th>Detail</th>
                        <th width="10%">Aksi</th>
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
