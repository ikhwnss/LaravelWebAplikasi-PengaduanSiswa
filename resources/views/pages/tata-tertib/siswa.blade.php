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
                    @if (count($data) < 1)
                        <tr>
                            <th colspan="4" class="text-center">Tidak Ada Data</th>
                        </tr>
                    @endif
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->siswa->id }}</td>
                        <td>{{ $item->siswa->nama_depan ?? null }} {{$item->siswa->nama_belakang ?? null }}</td>
                        <td>
                            <strong>Nomor Induk Siswa :</strong><br>
                            {{$item->siswa->nis ?? '-'}} <br>
                            <strong>Nomor Telepon : </strong><br>
                            {{$item->siswa->nomor_telepon ?? '-'}} <br>
                            <strong>Email : </strong><br>
                            {{$item->siswa->email ?? '-'}} <br>
                            <strong>Alamat Rumah : </strong><br>
                            {{$item->siswa->alamat_rumah ?? '-'}} <br>
                        </td>
                        <td>
                            <form action="{{route('kelas.siswa.hapus',['id' => $kelas->id, 'id_siswa' => $item->siswa->id])}}" method="POST">
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
        <h4>Tambah Siswa</h4>
    </div>
    <form action="{{ route('kelas.siswa.tambah', ['id' => $kelas->id]) }}" method="post">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Pilih Siswa</label>
            <select class="form-control select2" name="siswa[]" multiple="" required>
                @foreach ($siswa as $item)
                    <option value="{{$item->id}}"> {{$item->nis ?? null }} - {{$item->nama_depan ?? null }} {{$item->nama_belakang ?? null}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="card-footer text-center">
        <a href="{{route('kelas.detail', ['id' => $kelas->id])}}" class="btn btn-warning">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
        <button class="btn btn-primary">
            <i class="fa fa-save"></i> Simpan
        </button>
    </div>
    </form>
</div>

@endsection
