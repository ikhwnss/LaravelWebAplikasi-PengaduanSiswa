@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>{{$title ?? null}}</h4>
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
                        <th width="5%">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @if (count($siswa->waliMurid) < 1)
                        <tr>
                            <th colspan="5" class="text-center">Tidak Ada Data</th>
                        </tr>
                    @endif
                    @foreach ($siswa->waliMurid as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_depan ?? null }} {{$item->nama_belakang ?? null }}</td>
                        <td>
                            <strong>Nomor Telepon : </strong><br>
                            {{$item->nomor_telepon ?? '-'}} <br>
                            <strong>Email : </strong><br>
                            {{$item->email ?? '-'}} <br>
                            <strong>Alamat Rumah : </strong><br>
                            {{$item->alamat_rumah ?? '-'}} <br>
                        </td>
                        <td>
                            <form action="{{route('siswa.wali_murid.hapus',['id' => $siswa->id, 'id_wali_murid' => $item->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </form>
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
                        <th width="5%">Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Tambah Wali Murid</h4>
    </div>
    <form action="{{ route('siswa.wali_murid.tambah', ['id' => $siswa->id]) }}" method="post">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Pilih Wali Murid</label>
            <select class="form-control select2" name="wali_murid[]" multiple="" required>
                @foreach ($wali_murid as $item)
                    <option value="{{$item->id}}"> {{$item->nama_depan ?? null }} {{$item->nama_belakang ?? null}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="card-footer text-center">
        <a href="{{route('siswa.index')}}" class="btn btn-warning">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
        <button class="btn btn-primary">
            <i class="fa fa-save"></i> Simpan
        </button>
    </div>
    </form>
</div>

@endsection
