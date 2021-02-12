@extends('layouts.app')
@section('content')
<div class="card">
        <div class="card-header">
            <h5>Data {{$title ?? null}}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped  table-md" id="datatables">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Nama</th>
                            <th>Detail</th>
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
                            <td>{{  $loop->iteration }}</td>
                            <td>{{ $item->nama_depan ?? null }} {{$item->nama_belakang ?? null }}</td>
                            <td>
                                <strong>Nomor Telepon : </strong><br>
                                {{$item->nomor_telepon ?? '-' }} <br>
                                <strong>Email : </strong><br>
                                {{$item->email ?? '-' }} <br>
                                <strong>Alamat Rumah : </strong><br>
                                {{$item->alamat_rumah ?? '-' }} <br>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Nama</th>
                            <th>Detail</th>
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
