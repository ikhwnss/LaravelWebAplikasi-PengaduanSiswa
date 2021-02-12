@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{$title ?? null}}</h5>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Tahun Pelajaran</label>
                        <select name="id_tahun_pelajaran" class="form-control">
                            <option value="">Semua</option>
                            @foreach ($tahun_pelajaran as $key => $value)
                                <option value="{{$key}}" @if($key == $submit->id_tahun_pelajaran) selected @endif>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>NIS - Nama</label>
                        <select name="id_siswa" class="form-control select2" required>
                            <option value="">Pilih</option>
                            @foreach ($siswa as $item)
                                <option value="{{$item->id}}" @if($item->id == $submit->id_siswa) selected @endif>{{$item->nis}} - {{$item->nama_depan}} {{$item->nama_belakang ?? null}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Filter</label>
                        <button type="submit" class="form-control btn btn-primary">Cari</button>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@if($rekap)
    <div class="card">
        <div class="card-header">
            <h5>Pelanggaran Yang Pernah Dilakukan Siswa: {{$siswa_submit->nama_depan}} {{$siswa_submit->nama_belakang ?? null }} </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="datatables">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Waktu</th>
                            <th>Pelanggaran</th>
                            <th width="5%">Poin</th>
                            <th width="5%">Tindak Lanjut</th>
                            <th width="5%">Tanggapan Wali</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($rekap) < 1)
                            <tr>
                                <th colspan="6" class="text-center">Tidak Ada Data</th>
                            </tr>
                        @endif
                        @php
                            $poin = 0;
                        @endphp
                        @foreach ($rekap as $item)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$item->tanggal_pelanggaran}}</td>
                            <td>
                                {{$item->pelanggaran->nama}}
                            </td>
                            <td>{{$item->pelanggaran->poin}}</td>
                            @php
                                $poin = $poin + $item->pelanggaran->poin;
                            @endphp
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
                                    <a href="{{route('pelanggaran_siswa.detail',['id' => $item->id])}}" class="btn btn-sm btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('pelanggaran_siswa.edit',['id' => $item->id])}}" class="btn btn-sm btn-warning">
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
        <div class="card-footer">
            <h5>Jumlah Poin : {{$poin}}</h5>
        </div>
    </div>
@endif
@endsection

@section('js_page')
    <script>
        $("#datatables").DataTable();
    </script>
@endsection
