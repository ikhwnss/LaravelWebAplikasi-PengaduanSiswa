@extends('layouts.app')
@section('content')
@if($rekap)
    <div class="card">
        <div class="card-header">
            <h5>Pelanggaran Yang Pernah Dilakukan Anda </h5>
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
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($rekap) < 1)
                            <tr>
                                <th colspan="5" class="text-center">Tidak Ada Data</th>
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
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <h5>Jumlah Poin : {{$poin}}</h5>
        </div>
        <div class="card-footer">
            <h5>Penanganan Kasus Pelanggaran Siswa</h5>
            <table>
            <tr>
                <th>No</th>
                <th>Skor</th>
                <th>Kategori</th>
                <th width="20%">Tindak Lanjut</th>
            </tr>
            <tr>
                <td>1.</td>
                <td>1-10</td>
                <td>Ringan</td>
                <td>Peringatan dan pendataan nama siswa</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>11-25</td>
                <td>Sedang</td>
                <td>Pemanggilan orang tua dan surat pernyataan</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>26-50</td>
                <td>Berat</td>
                <td>Diskrosing</td>
            </tr>
            <tr>
                <td>4.</td>
                <td>>50</td>
                <td>Sangat Berat</td>
                <td>Dikembalikan kepada orang tua atau Dikeluarkan</td>
            </tr>

            </table>


        </div>
    </div>
@endif
@endsection

@section('js_page')
    <script>
        $("#datatables").DataTable();
    </script>
@endsection
