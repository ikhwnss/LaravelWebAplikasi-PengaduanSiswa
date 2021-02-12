@extends('layouts.app')
@section('content')
@if (auth()->user()->role === 'guru')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Pengguna</h4>
                    </div>
                    <div class="card-body">
                        {{\App\User::count()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Siswa</h4>
                    </div>
                    <div class="card-body">
                        {{\App\Siswa::count()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Pelanggaran</h4>
                    </div>
                    <div class="card-body">
                        {{\App\Pelanggaran::count()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Pelanggaran Siswa</h4>
                    </div>
                    <div class="card-body">
                        {{\App\PelanggaranSiswa::count()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <div class="empty-state" data-height="400" style="height: 400px;">
            <img src="{{ ('assets/img/logo.jpg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            <h2>Selamat Datang di Sistem Poin</h2>
            <h1>SMK Negeri 1 Sayung Demak</h1>

        </div>
    </div>
</div>
@endif
@endsection
