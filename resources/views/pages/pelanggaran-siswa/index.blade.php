@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{$title ?? null}}</h5>
        <div class="card-header-action ml-auto">
            <a class="btn btn-icon btn-success" href="{{ route('pelanggaran_siswa.tambah') ?? null}}"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="datatables">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Waktu</th>
                        <th width="20%">Siswa</th>
                        <th>Pelanggaran</th>
                        <th width="5%">Poin</th>
                        <th width="5%">Tindak Lanjut</th>
                        <th width="5%">Tanggapan Wali</th>
                        <th width="10%">Aksi</th>
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
                            <td>{{$item->tanggal_pelanggaran}}</td>
                            <td>{{$item->siswa->nama_depan}} {{$item->siswa->nama_belakang ?? null}}</td>
                            <td>
                                {{$item->pelanggaran->nama}}
                            </td>
                            <td>{{$item->pelanggaran->poin}}</td>
                            <td>
                                @if ($item->tindak_lanjut == 0)
                                    <button class="btn btn-sm btn-warning">
                                        Belum
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-success">
                                        Sudah
                                    </button>
                                @endif
                            </td>
                            <td>
                                @if ($item->tanggapan !== null)
                                    <button class="btn btn-sm btn-success">
                                        Sudah
                                    </button>
                                    <a href="{{route('pelanggaran_siswa.tanggapan',['id' => $item->id])}}" class="btn btn-sm btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @else
                                    <button class="btn btn-sm btn-warning">
                                        Belum
                                    </button>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group mb-3" role="group" aria-label="Aksi">
                                    {{-- @if ($item->tindak_lanjut == 0)
                                        <a href="{{route('pelanggaran_siswa.detail',['id' => $item->id])}}" class="btn btn-sm btn-success" title="Tindak Lanjuti">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    @else
                                        <a href="{{route('pelanggaran_siswa.detail',['id' => $item->id])}}" class="btn btn-sm btn-warning" title="Tindak Lanjuti">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    @endif --}}
                                    <a href="{{route('pelanggaran_siswa.detail',['id' => $item->id])}}" class="btn btn-sm btn-success" title="Lihat Detail">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('pelanggaran_siswa.edit',['id' => $item->id])}}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('pelanggaran_siswa.delete',['id' => $item->id])}}" method="POST">
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
                        <th width="15%">Waktu</th>
                        <th width="20%">Siswa</th>
                        <th>Pelanggaran</th>
                        <th width="5%">Poin</th>
                        <th width="5%">Tindak Lanjut</th>
                        <th width="5%">Tanggapan Wali</th>
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
