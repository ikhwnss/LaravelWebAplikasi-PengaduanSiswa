<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Daftar &mdash; {{env('APP_NAME')}}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ ('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ ('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ ('assets/modules/jquery-selectric/selectric.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ ('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ ('assets/css/components.css') }}">

</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="{{ ('assets/img/logo.jpg') }}" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>BK-Online</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('register')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="role">Hak Akses</label>
                                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                                <option value="">Pilih</option>
                                                <option value="siswa" @if(old('role') == 'siswa') selected @endif>Siswa</option>
                                                <option value="wali_murid" @if(old('role') == 'wali_murid') selected @endif>Wali Murid</option>
                                                <option value="guru" @if(old('role') == 'guru') selected @endif>Guru</option>
                                            </select>
                                            @error('role')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="nis_kode_guru">NIS / Kode Guru</label>
                                            <input id="nis_kode_guru" type="text"
                                                class="form-control @error('nis_kode_guru') is-invalid @enderror" name="nis_kode_guru"
                                                autofocus required value="{{ old('nis_kode_guru') ?? null }}" placeholder="Silahkan Isikan NIS atau Kode Guru">
                                            <small>NIS untuk Siswa, NIS anak untuk Wali Murid, Kode Guru untuk Guru</small>
                                            @error('nis_kode_guru')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="name">Nama Lengkap</label>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                autofocus required value="{{ old('name') ?? null }}" placeholder="Silahkan Isikan Nama Lengkap Anda">
                                            <small>Nama Lengkap hanya untuk Wali Murid, Siswa dan Guru akan Menggunakan Data yang telah ada</small>
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Nama Pengguna</label>
                                        <input id="username" type="username"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            required value="{{ old('username') ?? null }}">
                                        @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Kata Sandi</label>
                                            <input id="password" type="password"
                                                class="form-control pwstrength @error('password') is-invalid @enderror"
                                                data-indicator="pwindicator" name="password" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Konfirmasi Sandi</label>
                                            <input id="password2" type="password" class="form-control"
                                                name="password_confirmation" required>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Daftar
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                Apakah Anda sudah punya akun? <a href="{{route('login')}}">Masuk</a>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; IkhwanulMuslimin {{date('Y')}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ ('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ ('assets/modules/popper.js') }}"></script>
    <script src="{{ ('assets/modules/tooltip.js') }}"></script>
    <script src="{{ ('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ ('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ ('assets/modules/moment.min.js') }}"></script>
    <script src="{{ ('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ ('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ ('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ ('assets/js/page/auth-register.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ ('assets/js/scripts.js') }}"></script>
    <script src="{{ ('assets/js/custom.js') }}"></script>
</body>

</html>
