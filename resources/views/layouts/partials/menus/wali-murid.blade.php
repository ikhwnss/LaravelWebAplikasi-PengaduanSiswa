<li class="menu-header">Pengguna</li>
<li class="dropdown @if(url()->current() == route('profil.index') || url()->current() == route('profil.edit')) active @endif">
    <a href="{{route('profil.index')}}" class="nav-link"><i class="fas fa-user"></i><span>Profil</span></a>
</li>
<li class="dropdown @if(url()->current() == route('wali-murid.siswa.index') ) active @endif">
    <a href="{{route('wali-murid.siswa.index')}}" class="nav-link"><i class="fas fa-user-graduate"></i><span>Siswa</span></a>
</li>
<li class="menu-header">Pelanggaran</li>
<li class="dropdown @if(url()->current() == route('wali-murid.rekap.index')) active @endif">
    <a href="{{route('wali-murid.rekap.index')}}" class="nav-link"><i class="fas fa-book-reader"></i><span>Rekap</span></a>
</li>

