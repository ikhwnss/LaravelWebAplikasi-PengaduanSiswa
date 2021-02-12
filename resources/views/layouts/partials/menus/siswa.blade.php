<li class="menu-header">Pengguna</li>
<li class="dropdown @if(url()->current() == route('profil.index') || url()->current() == route('profil.edit')) active @endif">
    <a href="{{route('profil.index')}}" class="nav-link"><i class="fas fa-user"></i><span>Profil</span></a>
</li>
<li class="dropdown @if(url()->current() == route('siswa.wali-murid.index')) active @endif">
    <a href="{{route('siswa.wali-murid.index')}}" class="nav-link"><i class="fas fa-users"></i><span>Wali Murid</span></a>
</li>
<li class="menu-header">Pelanggaran</li>
<li class="dropdown @if(url()->current() == route('siswa.rekap.index')) active @endif">
    <a href="{{route('siswa.rekap.index')}}" class="nav-link"><i class="fas fa-book-reader"></i><span>Rekap</span></a>
</li>
