<li class="menu-header">Pengguna</li>
<li class="dropdown @if(url()->current() == route('profil.index') || url()->current() == route('profil.edit')) active @endif">
    <a href="{{route('profil.index')}}" class="nav-link"><i class="fas fa-user"></i><span>Profil</span></a>
</li>
<li class="dropdown @if(url()->current() == route('pengguna.index')) active @endif">
    <a href="{{route('pengguna.index')}}" class="nav-link"><i class="fas fa-users"></i><span>Pengguna</span></a>
</li>
<li class="dropdown @if(url()->current() == route('guru.index')) active @endif">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-tie"></i><span>Guru</span></a>
    <ul class="dropdown-menu">
        <li class="@if(url()->current() == route('guru.index')) active @endif"><a class="nav-link" href="{{route('guru.index')}}">Data Guru</a></li>
    </ul>
</li>
<li class="dropdown @if(url()->current() == route('wali-murid.index')) active @endif">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Wali Murid</span></a>
    <ul class="dropdown-menu">
        <li class="@if(url()->current() == route('wali-murid.index')) active @endif"><a class="nav-link" href="{{route('wali-murid.index')}}">Data Wali Murid</a></li>
    </ul>
</li>
<li class="dropdown @if(url()->current() == route('siswa.index')) active @endif">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-graduate"></i><span>Siswa</span></a>
    <ul class="dropdown-menu">
        <li class="@if(url()->current() == route('siswa.index')) active @endif"><a class="nav-link" href="{{route('siswa.index')}}">Data Siswa</a></li>
    </ul>
</li>
<li class="menu-header">Master</li>
<li class="dropdown @if(url()->current() == route('tahun-pelajaran.index') || url()->current() == route('tahun-pelajaran.pilih')) active @endif">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar-alt"></i><span>Tahun Pelajaran</span></a>
    <ul class="dropdown-menu">
        <li class="@if(url()->current() == route('tahun-pelajaran.index')) active @endif"><a class="nav-link" href="{{route('tahun-pelajaran.index')}}">Data Tahun Pelajaran</a></li>
        <li class="@if(url()->current() == route('tahun-pelajaran.pilih')) active @endif"><a class="nav-link" href="{{route('tahun-pelajaran.pilih')}}">Pilih Tahun Pelajaran Aktif</a></li>
    </ul>
</li>
<li class="dropdown @if(url()->current() == route('jurusan.index')) active @endif">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-school"></i><span>Jurusan</span></a>
    <ul class="dropdown-menu">
        <li class="@if(url()->current() == route('jurusan.index')) active @endif"><a class="nav-link" href="{{route('jurusan.index')}}">Data Jurusan</a></li>
    </ul>
</li>
<li class="dropdown @if(url()->current() == route('kelas.index')) active @endif">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-chalkboard-teacher"></i><span>Kelas</span></a>
    <ul class="dropdown-menu">
        <li class="@if(url()->current() == route('kelas.index')) active @endif"><a class="nav-link" href="{{route('kelas.index')}}">Data Kelas</a></li>
    </ul>
</li>
<li class="menu-header">Poin</li>
<li class="dropdown @if(url()->current() == route('tata_tertib.index')) active @endif">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-balance-scale"></i><span>Tata Tertib</span></a>
    <ul class="dropdown-menu">
        <li class="@if(url()->current() == route('tata_tertib.index')) active @endif"><a class="nav-link" href="{{route('tata_tertib.index')}}">Tata Tertib</a></li>
    </ul>
</li>
<li class="dropdown @if(url()->current() == route('pelanggaran.index')) active @endif">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-book-dead"></i><span>Pelanggaran</span></a>
    <ul class="dropdown-menu">
        <li class="@if(url()->current() == route('pelanggaran.index')) active @endif"><a class="nav-link" href="{{route('pelanggaran.index')}}">Data Pelanggaran</a></li>
    </ul>
</li>
<li class="dropdown @if(url()->current() == route('pelanggaran_siswa.index') ||url()->current() == route('pelanggaran_siswa.tambah') || url()->current() == route('pelanggaran_siswa.kelas') || url()->current() == route('pelanggaran_siswa.siswa')) active @endif">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-book-reader"></i><span>Pelanggaran Siswa</span></a>
    <ul class="dropdown-menu">
        <li class="@if(url()->current() == route('pelanggaran_siswa.index') ) active @endif"><a class="nav-link" href="{{route('pelanggaran_siswa.index')}}">Terbaru</a></li>
        <li class="@if(url()->current() == route('pelanggaran_siswa.tambah') ) active @endif"><a class="nav-link" href="{{route('pelanggaran_siswa.tambah')}}">Tambah</a></li>
        <li class="@if(url()->current() == route('pelanggaran_siswa.kelas')) active @endif"><a class="nav-link" href="{{route('pelanggaran_siswa.kelas')}}">Rekap Per Kelas</a></li>
        <li class="@if(url()->current() == route('pelanggaran_siswa.siswa')) active @endif"><a class="nav-link" href="{{route('pelanggaran_siswa.siswa')}}">Rekap  Per Siswa</a></li>
    </ul>
</li>
